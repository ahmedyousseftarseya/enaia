<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $model = null;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resources = $this->model->latest()->filter(request())->paginate(self::$pagination);
        $genders = User::GENDER;
        $status = User::STATUS;
        return view('admin.users.index', [
            'resources' => $resources,
            'genders' => $genders,
            'status' => $status
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }

    /**HeadNurse
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $genders = User::GENDER;
        $status = User::STATUS;
        return view('admin.users.form', [
            'resource' => $user,
            'genders' => $genders,
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storageheadN
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if($request->hasFile('image')) {
            File::delete($user->image);
            $data['image'] = uploadFile($data['image'], config('upload_pathes.users'));
        }
        $data['password'] ? $data['password'] = bcrypt($request->password) : $data['password'] = $user->password;

        $user->update($data);

        toast(__('lang.updated'), 'success');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        File::delete($user->image);
        $user->delete();
        DB::commit();
        
        toast(__('lang.deleted'), 'success');
        return redirect()->route('admin.users.index');
    }

    public function changeStatus()
    {
        $data = request()->validate([
            'id' => 'required|exists:users,id',
            'status' => ['required', Rule::in(User::STATUS)],
        ]);

        $user = User::find($data['id']);
        $user->status = $data['status'];
        $user->save();
        return response()->json(['success' => true, 'message' => __('lang.updated')]);
    }
}
