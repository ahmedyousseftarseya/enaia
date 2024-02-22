<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    protected $model = null;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the global settings resource.
     */
    public function globalSettings()
    {
        $settings = $this->model->get();
        return view('admin.settings.global-settings', [
            'settings' => $settings,
        ]);
    }

    /**
     * Display a listing of the contact settings resource.
     */
    public function contactSettings()
    {
        $settings = $this->model->get();
        return view('admin.settings.contact-settings', [
            'settings' => $settings,
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(Request $request)
    {
        $data = $request->except('_token');
        if($request->file('logo')) {
            $setting = $this->model->where('key', 'logo')->first();
            File::delete($setting->value ?? null);
            $data['logo'] = uploadFile($request->file('logo'), config('upload_pathes.settings'));
        }

        foreach ($data as $key => $value) {
            $this->model->updateOrCreate(['key' => $key], ['value' => $value]);
        }
        
        toast(__('lang.updated'), 'success');
        return redirect()->back();
    }

}

