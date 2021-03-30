<style>
    .custom-active { color: #f9e808 !important; }
</style>
<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Apol" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dashboard.index') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['dashboard*']) ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Menu Layout <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-dashboard.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="side-menu-inbox.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Inbox </div>
            </a>
        </li>
        <li>
            <a href="side-menu-file-manager.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="side-menu-point-of-sale.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="side-menu__title"> Point of Sale </div>
            </a>
        </li>
        <li>
            <a href="side-menu-chat.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li>
        <li>
            <a href="side-menu-post.html" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Post </div>
            </a>
        </li>

        <li class="side-nav__devider my-6"></li>
        {{-- supplier --}}
        @canany(['supplier.all','supplier.create','supplier.show','supplier.update'])
            <li>
                <a href="javascript:;" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['suppliers*']) ? 'side-menu--active':'' }}">
                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                    <div class="side-menu__title"> Suppliers <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{ \Illuminate\Support\Facades\Route::is(['suppliers*']) ? 'side-menu__sub-open':'' }}">
                    <li>
                        <a href="{{ route('suppliers.create') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['suppliers.create']) ? 'side-menu--active custom-active':'' }}">
                            <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                            <div class="side-menu__title"> New Supplier </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('suppliers.index') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['suppliers.index','suppliers.edit','suppliers.show']) ? 'side-menu--active custom-active':'' }}">
                            <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                            <div class="side-menu__title"> All Suppliers </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany

        {{-- customer --}}
        @canany(['customer.all','customer.create','customer.show','customer.update'])
            <li>
                <a href="javascript:;" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['customers*']) ? 'side-menu--active':'' }}">
                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                    <div class="side-menu__title"> Customers <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="{{ \Illuminate\Support\Facades\Route::is(['customers*']) ? 'side-menu__sub-open':'' }}">
                    <li>
                        <a href="{{ route('customers.create') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['customers.create']) ? 'side-menu--active custom-active':'' }}">
                            <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                            <div class="side-menu__title"> New Customer </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['customers.index','customers.edit','customers.show']) ? 'side-menu--active custom-active':'' }}">
                            <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                            <div class="side-menu__title"> All Customers </div>
                        </a>
                    </li>
                </ul>
            </li>
        @endcanany


        <li class="side-nav__devider my-6"></li>

        {{-- roles --}}
        @canany(['role.all','role.create','role.show','role.update'])
        <li>
            <a href="javascript:;" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['role*']) ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="unlock"></i> </div>
                <div class="side-menu__title"> Roles <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ \Illuminate\Support\Facades\Route::is(['role*']) ? 'side-menu__sub-open':'' }}">
                <li>
                    <a href="{{ route('roles.create') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['roles.create']) ? 'side-menu--active custom-active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                        <div class="side-menu__title"> New Role </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['roles.index','roles.edit','roles.show']) ? 'side-menu--active custom-active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="lock"></i> </div>
                        <div class="side-menu__title"> All Role </div>
                    </a>
                </li>
            </ul>
        </li>
        @endcanany

        {{--  user --}}
        @canany(['user.all','user.create','user.show','user.update'])
        <li>
            <a href="javascript:;" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['user*']) ? 'side-menu--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                <div class="side-menu__title"> Users <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ \Illuminate\Support\Facades\Route::is(['user*']) ? 'side-menu__sub-open':'' }}">
                @can('user.create')
                <li>
                    <a href="{{ route('users.create') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['users.create']) ? 'side-menu--active custom-active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                        <div class="side-menu__title"> New User </div>
                    </a>
                </li>
                @endcan
                @canany(['user.all','user.show','user.update'])
                <li>
                    <a href="{{ route('users.index') }}" class="side-menu {{ \Illuminate\Support\Facades\Route::is(['users.index','users.edit','users.show']) ? 'side-menu--active custom-active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> All User </div>
                    </a>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany
        <li class="side-nav__devider my-6"></li>

        <li>
            <a href="{{ route('logout') }}" class="side-menu" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                <div class="side-menu__title"> {{ __('Logout') }} </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>


    </ul>
</nav>
