{{-- <style>
   .navbar-brand-box{
    background-color: green; 
   }
</style> --}}
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link menu-link @if (Route::currentRouteName() == 'dashboard') active @endif"
                        href="{{ route('dashboard', ['guard' => guardCheck()]) }}">
                        <i class="fas fa-tachometer-alt"></i> <span data-key="t-dashboards">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                @if (request()->header('role') == 'superadmin')
                    @foreach (\App\Models\UserModule\Module::orderBy('sequence', 'asc')->get() as $module)
                        @if ($module->route == null)
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarSubMenu_{{ $module->id }}"
                                    data-bs-toggle="collapse" role="button"
                                    @foreach ($module->sub_module->sortBy('sequence', true) as $sub_module)
                                       @if (Route::currentRouteName() == $sub_module->route) aria-expanded="true" @else aria-expanded="false" @endif @endforeach
                                    {{ $module->name }} aria-controls="sidebarSubMenu">
                                    <i class="{{ $module->icon }}"></i> <span>{{ $module->name }}</span>
                                </a>
                                <div class="collapse menu-dropdown
                                @foreach ($module->sub_module->sortBy('sequence', true) as $sub_module)
                                    @if (Route::currentRouteName() == $sub_module->route) show @endif @endforeach
                                "
                                    id="sidebarSubMenu_{{ $module->id }}">
                                    <ul class="nav nav-sm flex-column">
                                        @foreach ($module->sub_module->sortBy('sequence', true) as $sub_module)
                                            <li class="nav-item">
                                                <a href="{{ route($sub_module->route, ['guard' => guardCheck()]) }}"
                                                    class="nav-link @if (Route::currentRouteName() == $sub_module->route) active @endif">{{ $sub_module->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link menu-link @if (Route::currentRouteName() == $module->route) active @endif"
                                    href="{{ route($module->route, ['guard' => guardCheck()]) }}">
                                    <i class="{{ $module->icon }}"></i> <span
                                        data-key="t-dashboards">{{ $module->name }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach

                @endif



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
