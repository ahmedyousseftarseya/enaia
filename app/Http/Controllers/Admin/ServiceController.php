<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    protected $model = null;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.services.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.form', [
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $request->image ? $data['image'] = uploadFile($data['image'], config('upload_pathes.services')) : null;
        isset($data['active']) ? $data['active'] = 1 : $data['active'] = 0;

        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.services.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.form', [
            'resource' => $service,
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($service->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.services'));
        }
        isset($data['active']) ? $data['active'] = 1 : $data['active'] = 0;

        $service->update($data);
        
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        DB::beginTransaction();
        File::delete($service->image);
        $service->delete();
        DB::commit();

        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.services.index');
    }

    public function changeStatus()
    {
        $data = request()->validate([
            'id' => 'required|exists:services,id',
        ]);
        $service = Service::find($data['id']);
        $service->active = !$service->active;
        $service->save();
        return response()->json(['success' => true, 'message' => __('lang.updated')]);
    }
}
