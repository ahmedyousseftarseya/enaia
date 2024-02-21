<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\StoreHeadNurseRequest;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    protected $model = null;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.countries.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.form', [
            'resource' => $this->model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = uploadFile($data['image'], config('upload_pathes.countries')) ;

        $this->model->create($data);

        toast(__('lang.created'), 'success');
        return redirect()->route('admin.countries.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.countries.form', [
            'resource' => $country,
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreCountryRequest $request, Country $country)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($country->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.countries'));
        }

        $country->update($data);
        
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        DB::beginTransaction();
        File::delete($country->image);
        $country->delete();
        DB::commit();
        
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.countries.index');
    }
}
