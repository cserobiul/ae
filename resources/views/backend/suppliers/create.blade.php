@extends('backend.layouts.master')
@section('title','New Supplier')
@section('mainContent')
<div class="content">
    <!-- BEGIN: Top Bar -->
    @include('backend.layouts._topbar')
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            New Supplier Create
        </h2>
        @canany(['supplier.all'])
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{ route('suppliers.index') }}">All Suppliers</a>
        @endcanany
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Form Validation -->
            <div class="intro-y box">
                <div class="px-5 sm:px-5 mt-5 pt-5 border-t border-gray-200">
                    <form action="{{ route('suppliers.store') }}" method="post" class="validate-form">
                        @csrf
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Name</div>
                                <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2" placeholder="Miraul Hoque" minlength="3" required>
                                @error('name')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Email</div>
                                <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2" placeholder="Miraul Hoque" minlength="3" required>
                                @error('name')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Phone</div>
                                <input type="email" name="name" value="{{ old('name') }}" class="input w-full border mt-2" placeholder="Miraul Hoque" minlength="3" required>
                                @error('name')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                         <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Password</div>
                                <input type="password" name="password" class="input w-full border mt-2" placeholder="******" minlength="6" required>
                                @error('password')
                                <div class="text-danger mb-3">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Confirm Password</div>
                                <input type="password" name="password_confirmation" class="input w-full border mt-2" placeholder="******" minlength="6" required>
                            </div>
                        </div>

                        <button type="submit" class="button bg-theme-1 text-white mt-5">Create</button>
                        <br> <br><br>

                    </form>
                </div>

            </div>
            <!-- END: Form Validation -->
        </div>
    </div>
</div>
@endsection
