<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    protected $model = null;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        $countries = Country::get()->pluck('name', 'id')->toArray();
        return view('admin.cities.index', [
            'resources' => $resources,
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get()->pluck('name', 'id')->toArray();
        return view('admin.cities.form', [
            'resource' => $this->model,
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $data = $request->validated();
        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::get()->pluck('name', 'id')->toArray();
        return view('admin.cities.form', [
            'resource' => $city,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreCityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.cities.index');
    }
}
