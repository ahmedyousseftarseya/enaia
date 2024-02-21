<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    protected $model = null;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd('hello');
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.services.index', [
            'resources' => $resources,
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

}
