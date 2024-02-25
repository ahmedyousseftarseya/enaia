<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    protected $model = null;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.admins.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $roles = Role::where('slug', '=', 'admin')->pluck('name', 'id')->toArray();
        return view('admin.admins.form', [
            'resource' => $this->model,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.admins')) : null;
        $data['password'] = bcrypt($data['password']);
        
        DB::beginTransaction();
        $admin = $this->model->create($data);
        $admin->attachRole($request->role);
        DB::commit();

        toast(__('lang.created'), 'success');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $roles = Role::where('slug', '=', 'admin')->pluck('name', 'id')->toArray();
        return view('admin.profile.show', [
            'admin' => $admin,
            'roles' => $roles
        ]);
    }

    /**HeadNurse
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('slug', '=', 'admin')->pluck('name', 'id')->toArray();
        return view('admin.admins.form', [
            'resource' => $admin,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($admin->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.admins'));
        }
        $data['password'] ? $data['password'] = bcrypt($request->password) : $data['password'] = $admin->password;

        DB::beginTransaction();
        $admin->update($data);
        $admin->syncRoles([$request->role]);
        DB::commit();

        toast(__('lang.updated'), 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        DB::beginTransaction();
        File::delete($admin->image);
        $admin->delete();
        DB::commit();
        
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.admins.index');
    }
}
