<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCouponRequest;
use App\Models\Coupon;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CouponController extends Controller
{
    protected $model = null;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        return view('admin.coupons.index', [
            'resources' => $resources,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Coupon::TYPE;
        return view('admin.coupons.form', [
            'resource' => $this->model,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        $data = $request->validated();
        $data['code'] = $this->generateCode();
        isset($data['status']) ? $data['status'] = 'active' : $data['status'] = 'inactive';
        $this->model->create($data);
        toast(__('lang.created'), 'success');
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $types = Coupon::TYPE;
        return view('admin.coupons.form', [
            'resource' => $coupon,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(StoreCouponRequest $request, Coupon $coupon)
    {
        $data = $request->validated();
        isset($data['status']) ? $data['status'] = 'active' : $data['status'] = 'inactive';
        $coupon->update($data);
        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $coupon)
    {
        $coupon->delete();
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.coupons.index');
    }

    public function changeStatus()
    {
        $data = request()->validate([
            'id' => 'required|exists:coupons,id',
            'status' => 'required|in:active,inactive',
        ]);

        $coupon = $this->model->find($data['id']);
        $coupon->update(['status' => $data['status']]);
        return response()->json(['success' => true, 'message' => __('lang.updated')]);
    }

    private function generateCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        do {
            $code = substr(str_shuffle($characters), 0, $length);
        } while ( DB::table('coupons')->where('code', $code)->exists());
        return $code;
    }
}
