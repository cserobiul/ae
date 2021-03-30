@extends('backend.layouts.master')
@section('title','All Supplier')
@section('mainContent')
<div class="content">
    <!-- BEGIN: Top Bar -->
@include('backend.layouts._topbar')
<!-- END: Top Bar -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Suppliers
        </h2>
        @canany(['supplier.create'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('suppliers.create') }}">New Supplier</a>
        @endcanany

    </div>
    <!-- BEGIN: Datatable -->
    @if(!empty($suppliers))
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Name</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Phone</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Roles</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Actions</th>
            </tr>
            </thead>
            <tbody>
                 @foreach($suppliers as $key => $supplier)
                 <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $key+1 }}</div>
                    </td>
                    <td class="text-center border-b">{{ ucwords($supplier->name) }}</td>
                    <td class="text-center border-b">{{ $supplier->email }}</td>
                    <td class="text-center border-b">{{ ucwords($supplier->phone) }}</td>
                    <td class="text-center border-b">
                        @foreach($supplier->permissions as $permission)
                            <span class="bg-theme-1 text-theme-9 rounded px-2 mt-1 mr-2">
                                {{ ucwords(str_replace('.',' ',$permission->name)) }}
                            </span>
                        @endforeach
                        @foreach($supplier->roles as $role)
                                {{--  to hide super admin role name from others--}}
                                @cannot(['role.show'])
                                    @if($role->name == \App\Models\Supplier::ROLE_SUPER_ADMIN)
                                        <span class="bg-theme-1 text-theme-9 rounded px-2 mt-1 mr-2">
                                            Admin
                                        </span>
                                    @else
                                        <span class="bg-theme-1 text-theme-9 rounded px-2 mt-1 mr-2">
                                            {{ ucwords($role->name) }}
                                        </span>
                                    @endif
                                @endcannot
                                {{--  generally sow for super admin --}}
                                @canany(['role.show'])
                                    <span class="bg-theme-1 text-theme-9 rounded px-2 mt-1 mr-2">
                                        {{ ucwords($role->name) }}
                                    </span>
                                @endcanany

                            @endforeach
                    </td>
                     <td class="w-40 border-b">
                         <div class="flex items-center sm:justify-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                     </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            @canany(['supplier.update'])
                                <a href="{{ route('suppliers.edit',$supplier->id) }}" class="flex items-center mr-3">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit</a>
                            @endcanany
                            @canany(['supplier.delete'])
                                    <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            @endcanany

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
    @else
        <h2 class="text-lg font-medium mr-auto">
            No Supplier Found !!
        </h2>
    @endif
</div>
@endsection

