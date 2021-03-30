<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check authentication
        if (!Auth::user()->can('user.all')){
            abort(403,'Unauthorized Action');
        }

        $data['users'] = User::all();

        //dd($data);
        return view('backend.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check authentication
        if (!Auth::user()->can('user.create')){
            abort(403,'Unauthorized Action');
        }

        $data['roles'] = Role::all();
        return view('backend.users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // check authentication
        if (!Auth::user()->can('user.create')){
            abort(403,'Unauthorized Action');
        }

        //Validation Data
        $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]+$/', 'min:3','max:40'],
            'email' => ['required', 'min:4','max:30','unique:users'],
            'password' => ['required', 'min:6','max:20','confirmed'],
        ],[
            'name.required' => 'Please give a user name'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        // Process Data
        $user = User::create($data);

        if ($request->roles){
            $user->assignRole($request->roles);
        }

        return back()->with('success','Successfully added new user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check authentication
        if (!Auth::user()->can('user.show')){
            abort(403,'Unauthorized Action');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check authentication
        if (!Auth::user()->can('user.update')){
            abort(403,'Unauthorized Action');
        }

        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::all();

        $data['permissions'] = Permission::all();

        return view('backend.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // check authentication
        if (!Auth::user()->can('user.update')){
            abort(403,'Unauthorized Action');
        }

        //Validation Data

        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]+$/', 'min:3','max:40'],
            'email' => ['required', 'min:4','max:30','unique:users,id',$request->id],
            'password' => ['nullable','min:6','max:20','confirmed'],
        ],[
            'name.required' => 'Please give a user name'
        ]);

        // Process Data
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->save();

        $user->roles()->detach();
        if ($request->roles){
            $user->assignRole($request->roles);
        }

        return back()->with('success','User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check authentication
        if (!Auth::user()->can('user.delete')){
            abort(403,'Unauthorized Action');
        }

        $user = User::findOrFail($id);

        if (!is_null($user)){
            $user->delete();
        }

        return redirect()->route('users.index')->with('success','User delete Successfully');
    }
}
