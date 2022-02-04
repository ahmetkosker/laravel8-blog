<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $users = User::all();
        return view('admin.user', ['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $data = User::find($id);
        return view('admin.user_edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $data = User::find($id);
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        if ($request->file('image')) {
            $image = Storage::putfile('profile-photos', $request->file('image'));
        }
        $update = DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'profile_photo_path' => $image,
            ]);
        return redirect()->route('admin users')->with('success', 'User Information Updated');
    }

    public function user_roles(User $user, $id)
    {
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_roles', ['data' => $data, 'datalist' => $datalist]);
    }

    public function user_role_store(Request $request, User $user, $id)
    {
        $data = User::find($id);
        $role_id = $request->input('role_id');
        DB::table('role_user')->insert([
            'role_id' => $role_id,
            'user_id' => $data->id,
        ]);
        return redirect()->route('admin users')->with('success', 'Role added to user');
    }

    public function user_role_delete(User $user, $id, $role_id)
    {
        $data = User::find($id);
        $data->roles()->detach($role_id);
        return redirect()->route('admin users')->with('success', 'Role deleted from user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin users')->with('success', 'User Deleted');
    }
}
