<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNurseRequest;
use App\Models\Nurse;
use Illuminate\Support\Facades\File;

class NurseController extends Controller
{
    protected $model = null;

    public function __construct(Nurse $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nurses = $this->model->latest()->filter(request())->paginate(self::$pagination);
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('admin.nurses.index', [
            'nurses' => $nurses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nurses.form', [
            'nurse' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNurseRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.nurses')) : null;
        $data['password'] ? $data['password'] = bcrypt($data['password']) : $data['password'] = null;
        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.nurses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nurse $nurse)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nurse $nurse)
    {
        return view('admin.nurses.form', [
            'nurse' => $nurse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNurseRequest $request, Nurse $nurse)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($nurse->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.nurses'));
        }
        $data['password'] ? $data['password'] = bcrypt($request->password) : $data['password'] = $nurse->password;
        
        $nurse->update($data);
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.nurses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nurse $nurse)
    {
        File::delete($nurse->image);
        $nurse->delete();
        toast(__('lang.deleted'), 'success');
        return redirect()->back();
    }
}
