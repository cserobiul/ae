<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check authentication
        if (!Auth::user()->can('supplier.all')){
            abort(403,'Unauthorized Action');
        }

        $data['suppliers'] = Supplier::all();

        //dd($data);
        return view('backend.suppliers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check authentication
        if (!Auth::user()->can('supplier.create')){
            abort(403,'Unauthorized Action');
        }

        $data['roles'] = Role::all();
        return view('backend.suppliers.create',$data);
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
        if (!Auth::user()->can('supplier.create')){
            abort(403,'Unauthorized Action');
        }

        //Validation Data
        $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]+$/', 'min:3','max:40'],
            'email' => ['required', 'min:4','max:30','unique:suppliers'],
            'password' => ['required', 'min:6','max:20','confirmed'],
        ],[
            'name.required' => 'Please give a supplier name'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        // Process Data
        $supplier = Supplier::create($data);

        if ($request->roles){
            $supplier->assignRole($request->roles);
        }

        return back()->with('success','Successfully added new supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        // check authentication
        if (!Auth::user()->can('supplier.show')){
            abort(403,'Unauthorized Action');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        // check authentication
        if (!Auth::user()->can('supplier.update')){
            abort(403,'Unauthorized Action');
        }

        $data['supplier'] = Supplier::findOrFail($id);
        $data['roles'] = Role::all();

        $data['permissions'] = Permission::all();

        return view('backend.suppliers.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        // check authentication
        if (!Auth::user()->can('supplier.update')){
            abort(403,'Unauthorized Action');
        }

        //Validation Data

        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => ['required','regex:/^[a-zA-Z\s]+$/', 'min:3','max:40'],
            'email' => ['required', 'min:4','max:30','unique:suppliers,id',$request->id],
            'password' => ['nullable','min:6','max:20','confirmed'],
        ],[
            'name.required' => 'Please give a supplier name'
        ]);

        // Process Data
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        if ($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $supplier->save();

        $supplier->roles()->detach();
        if ($request->roles){
            $supplier->assignRole($request->roles);
        }

        return back()->with('success','Supplier updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        // check authentication
        if (!Auth::user()->can('supplier.delete')){
            abort(403,'Unauthorized Action');
        }

        $supplier = Supplier::findOrFail($id);

        if (!is_null($supplier)){
            $supplier->delete();
        }

        return redirect()->route('suppliers.index')->with('success','Supplier delete Successfully');
    }
}
