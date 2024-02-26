<?php

namespace Modules\Accountant\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAccountantRequest;
use App\Models\Accountant;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        $accountant = auth('accountant')->user();
        return view('accountant::profile.show', [
            'accountant' => $accountant,
        ]);
    }

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
        return redirect()->back();
    }
}