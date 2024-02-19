<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RoleController extends Controller
{
    protected $model = null;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.roles.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = DB::table('permissions')->where('slug', 'admin')->get()->groupBy('path');
        return view('admin.roles.form', [
            'resource' => $this->model,
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        $resource = Role::create([
            'name'          =>  $data['name'],
            'display_name'  => $data['display_name'],
            'description'   => $data['description'],
            'slug'          => 'admin',
        ]);
        $resource->syncPermissions($data['permissions']);
        DB::commit();

        toast(__('lang.created'), 'success');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = DB::table('permissions')->where('slug', 'admin')->get()->groupBy('path');
        return view('admin.roles.form', [
            'resource' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreRoleRequest $request, Role $role)
    {
        $data = $request->validated();

        DB::beginTransaction();
        $role->update([
            'name'          =>  $data['name'],
            'display_name'  => $data['display_name'],
            'description'   => $data['description'],
            'slug'          => 'admin',
        ]);
        $role->syncPermissions($data['permissions']);
        DB::commit();

        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        File::delete($role->image);
        $role->delete();
        DB::commit();

        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.roles.index');
    }
}
