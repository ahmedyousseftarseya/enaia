<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAccountantRequest;
use App\Models\Accountant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AccountantController extends Controller
{
    protected $model = null;

    public function __construct(Accountant $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.accountant.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('admin.accountant.form', [
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountantRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.accountants')) : null;
        $data['password'] = bcrypt($data['password']);

        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.accountants.index');
    }

    /**HeadNurse
     * Show the form for editing the specified resource.
     */
    public function edit(Accountant $accountant)
    {
        return view('admin.accountant.form', [
            'resource' => $accountant,
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreAccountantRequest $request, Accountant $accountant)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($accountant->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.accountants'));
        }
        $data['password'] ? $data['password'] = bcrypt($request->password) : $data['password'] = $accountant->password;
        $accountant->update($data);
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.accountants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accountant $accountant)
    {
        DB::beginTransaction();
        File::delete($accountant->image);
        $accountant->delete();
        DB::commit();
        
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.accountants.index');
    }
}
