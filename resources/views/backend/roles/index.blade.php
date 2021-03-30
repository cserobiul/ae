@extends('backend.layouts.master')
@section('title','All Role')
@section('mainContent')
<div class="content">
    <!-- BEGIN: Top Bar -->
@include('backend.layouts._topbar')
<!-- END: Top Bar -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            All Roles
        </h2>
        @canany(['role.create'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('roles.create') }}">New Role</a>
        @endcanany

    </div>
    <!-- BEGIN: Datatable -->
    @if(!empty($roles))
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">#</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Role Name</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Permissions</th>
                <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
            </tr>
            </thead>
            <tbody>
                 @foreach($roles as $key => $role)
                 <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $key+1 }}</div>
                    </td>
                    <td class="text-center border-b">{{ ucwords($role->name) }}</td>
                    <td class="text-center border-b">
                        @foreach($role->permissions as $permission)
                            <span class="bg-theme-1 text-theme-9 rounded px-2 mt-1 mr-2">
                                {{ ucwords(str_replace('.',' ',$permission->name)) }}
                            </span>
                        @endforeach
                    </td>
                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            @canany(['role.update'])
                                <a href="{{ route('roles.edit',$role->id) }}" class="flex items-center mr-3">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit</a>
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
            No Roles Found !!
        </h2>
    @endif
</div>
@endsection
@section('pageJs')
    @include('backend.layouts.roles_pages_js')
@endsection
