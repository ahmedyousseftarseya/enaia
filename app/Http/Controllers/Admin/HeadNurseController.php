<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHeadNurseRequest;
use App\Models\HeadNurse;
use Illuminate\Support\Facades\File;

class HeadNurseController extends Controller
{
    protected $model = null;

    public function __construct(HeadNurse $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('admin.head_nurses.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.head_nurses.form', [
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeadNurseRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.head_nurses')) : null;
        $data['password'] ? bcrypt($data['password']) : null;
        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.head-nurses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeadNurse $headNurse)
    {
    }

    /**HeadNurse
     * Show the form for editing the specified resource.
     */
    public function edit(HeadNurse $headNurse)
    {
        return view('admin.head_nurses.form', [
            'resource' => $headNurse,
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreHeadNurseRequest $request, HeadNurse $headNurse)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($headNurse->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.head_nurses'));
        }
        $data['password'] ? bcrypt($request->password) : $headNurse->password;
        $headNurse->update($data);
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.head-nurses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeadNurse $headNurse)
    {
        File::delete($headNurse->image);
        $headNurse->delete();
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.head-nurses.index');
    }
}
