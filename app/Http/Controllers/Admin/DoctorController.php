<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    protected $model = null;

    public function __construct(Doctor $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = $this->model->latest()->filter(request())->paginate(self::$pagination);
        $specializations = Specialization::get()->pluck('name', 'id')->toArray();
        $title = __('lang.confirm_delete');
        $text = __('lang.confirm_delete_message');
        confirmDelete($title, $text);
        return view('admin.doctors.index', [
            'doctors' => $doctors,
            'specializations' => $specializations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::get()->pluck('name', 'id')->toArray();
        $nurses = Nurse::pluck('name', 'id')->toArray();
        return view('admin.doctors.form', [
            'doctor' => $this->model,
            'specializations' => $specializations,
            'nurses' => $nurses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.doctors')) : null;
        $data['password'] ? bcrypt($data['password']) : null;

        DB::beginTransaction();
        $doctor = $this->model->create($data);
        $doctor->nurses()->sync($request->nurses);
        DB::commit();

        toast(__('lang.created'), 'success');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::get()->pluck('name', 'id')->toArray();
        $nurses = Nurse::pluck('name', 'id')->toArray();
        return view('admin.doctors.form', [
            'doctor' => $doctor,
            'specializations' => $specializations,
            'nurses' => $nurses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDoctorRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($doctor->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.doctors'));
        }
        $request->password ? bcrypt($request->password) : $doctor->password;

        DB::beginTransaction();
        $doctor->update($data);
        $doctor->nurses()->sync($request->nurses);
        Db::commit();

        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        DB::beginTransaction();
        File::delete($doctor->image);
        $doctor->delete();
        DB::commit();
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.doctors.index');
    }
}
