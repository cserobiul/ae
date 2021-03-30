@extends('backend.layouts.master')
@section('title','Update User')
@section('mainContent')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('backend.layouts._topbar')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update User
        </h2>
        @canany(['user.create'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('users.create') }}">New User</a>
        @endcanany
        @canany(['user.all'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('users.index') }}">All Users</a>
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
                         <form action="{{ route('users.update',$user->id) }}" method="post" class="validate-form">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 3 characters</span> </label>
                                <input type="text" name="name" value="{{ old('name',isset($user->name)?$user->name:null) }}" class="input w-full border mt-2" placeholder="Miraul Hoque" minlength="3" required>
                                @error('name')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="flex flex-col sm:flex-row"> Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, email address format</span> </label>
                                <input type="email" name="email" value="{{ old('email',isset($user->email)?$user->email:null) }}" class="input w-full border mt-2" placeholder="miraz@gmail.com" required>
                                @error('email')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="flex flex-col sm:flex-row"> Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 6 characters</span> </label>
                                <input type="password" name="password" class="input w-full border mt-2" placeholder="******" minlength="6" >
                                @error('password')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label class="flex flex-col sm:flex-row">Confirm Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 6 characters</span> </label>
                                <input type="password" name="password_confirmation" class="input w-full border mt-2" placeholder="******" minlength="6" >
                            </div>


                             <div class="mt-3">
                                <label class="flex flex-col sm:flex-row"> Role <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label>
                                 <select name="roles[]" data-placeholder="Select Role" class="select2 w-full" multiple>
                                     @foreach($roles as $role)
                                         <option value="{{ $role->name }}" {{ $user->hasRole($role->name)? 'selected':'' }}>{{ ucwords($role->name) }}</option>
                                     @endforeach
                                 </select>
                            </div>

                            <button type="submit" class="button bg-theme-1 text-white mt-5">Update</button>
                        </form>
                    </div>

                </div>
            </div>
            <!-- END: Form Validation -->
        </div>
    </div>
</div>
@endsection
