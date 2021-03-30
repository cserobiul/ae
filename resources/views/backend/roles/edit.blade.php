@extends('backend.layouts.master')
@section('title','Update Role')
@section('mainContent')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('backend.layouts._topbar')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Role
        </h2>
        @canany(['role.create'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('roles.create') }}">New Role</a>
        @endcanany
        @canany(['role.all'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('roles.index') }}">All Roles</a>
        @endcanany
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Form Validation -->
            <div class="intro-y box">
{{--                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">--}}
{{--                    <h2 class="font-medium text-base mr-auto"> </h2>--}}
{{--                </div>--}}
                <div class="p-5" id="basic-datepicker">
                    <div class="preview">
                        <form action="{{ route('roles.update',$role->id) }}" method="post" class="validate-form">
                                @csrf
                                @method('PUT')
                            <div>
                                <label class="flex flex-col sm:flex-row">Role Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label>
                                <input type="text" name="name" value="{{ $role->name }}" class="input w-full border mt-2" placeholder="e.g: editor" minlength="2" required>
                                @error('name')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(!empty($permissions))
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> Permission <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label>
                                    <div class="flex items-center text-gray-700 mt-2">
                                        <input type="checkbox" class="input border mr-2" id="permissionsAll">
                                        <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans">All</label>
                                    </div>
                                </div>
                                <br>
                                <hr>

                                @php  $i = 1; @endphp
                                @foreach($permission_groups as $groups)
                                    <div class="grid grid-cols-12 gap-6 mt-5">
                                        <div class="intro-y col-span-6 lg:col-span-6">
                                            <div class="flex items-center text-gray-700 mt-2">
                                                <input type="checkbox" class="input border mr-2" id="{{ $i }}-Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox',this)">
                                                <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans"> {{ ucwords(str_replace('.',' ',$groups->name)) }}</label>
                                            </div>
                                        </div>
                                        <div class="intro-y col-span-6 lg:col-span-6 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = \App\Models\User::getPermissionGroupName($groups->name);
                                                $j = 1;
                                            @endphp
                                            @foreach($permissions as $permission)
                                                <div class="flex items-center text-gray-700 mt-2">
                                                    <input type="checkbox" name="permissions[]" {{ $role->hasPermissionTo($permission->name)?'checked':'' }} value="{{ $permission->name }}" class="input border mr-2">
                                                    <label class="cursor-pointer select-none" for=""> {{ ucwords(str_replace('.',' ',$permission->name)) }}</label>
                                                </div>
                                                @php  $j++; @endphp
                                            @endforeach
                                        </div>
                                    </div>


                                    @php  $i++; @endphp
                                    <hr>
                                @endforeach

                                @else
                                No Permission Found!!
                                @endif
                             <br><br><br>

                            <button type="submit" class="button bg-theme-1 text-white mt-5">Update Role</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Form Validation -->
        </div>
    </div>
</div>
@endsection
@section('pageJs')
    @include('backend.layouts.roles_pages_js')
@endsection
