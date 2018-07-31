<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                {{--<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->--}}
                {{--<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->--}}
                {{--<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->--}}
                {{--<form class="sidebar-search  " action="page_general_search_3.html" method="POST">--}}
                    {{--<a href="javascript:;" class="remove">--}}
                        {{--<i class="icon-close"></i>--}}
                    {{--</a>--}}
                    {{--<div class="input-group">--}}
                        {{--<input type="text" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                                            {{--<a href="javascript:;" class="btn submit">--}}
                                                {{--<i class="icon-magnifier"></i>--}}
                                            {{--</a>--}}
                                        {{--</span>--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--<!-- END RESPONSIVE QUICK SEARCH FORM -->--}}
            </li>
            <li class="nav-item start active open">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    @if(str_contains(auth()->user()->role->permissions,'dashboard'))
                    <li class="nav-item start ">
                        <a href="{{url('/dashboard')}}" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'main_data'))
                    <li class="nav-item start ">
                        <a href="{{route('dashboard.create')}}" class="nav-link ">
                            <i class="icon-settings"></i>
                            <span class="title">Site Main Date</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'tree'))
                    <li class="nav-item start ">
                        <a href="{{route('tree.index')}}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Trees</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'bank_account'))
                    <li class="nav-item start ">
                        <a href="{{route('baccounts.index')}}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Bank Account</span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'transfer'))
                    <li class="nav-item start ">
                        <a href="{{route('banks.create')}}" class="nav-link ">
                            <i class="icon-wallet"></i>
                            <span class="title">Make Transfer</span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'admin'))
                    <li class="nav-item  ">
                        <a href="{{route('admins.index')}}" class="nav-link nav-toggle">
                            <i class="icon-user"></i>
                            <span class="title">Admin</span>
                        </a>
                    </li>
                    @endif
                    @if(str_contains(auth()->user()->role->permissions,'admin_roles'))
                    <li class="nav-item  ">
                        <a href="{{route('roles.index')}}" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title">Admin Roles</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Site Date</h3>
            </li>
            @if(str_contains(auth()->user()->role->permissions,'clients'))
            <li class="nav-item">
                <a href="{{route('clients.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Clients</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'negative_accounts'))
            <li class="nav-item  ">
                <a href="{{route('clients.negative')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Negative Accounts</span>
                    <span class="badge badge-danger">{{$negative_accounts}}</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'e-money'))
            <li class="nav-item start ">
                <a href="{{route('banks.index')}}" class="nav-link ">
                    <i class="icon-diamond"></i>
                    <span class="title">E-Money Transfers</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'e-pin'))
            <li class="nav-item start">
                <a href="{{route('epins.index')}}" class="nav-link ">
                    <i class="icon-diamond"></i>
                    <span class="title">E-Pin Transfers</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'products'))
            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Products</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'e_learning'))
            <li class="nav-item">
                <a href="{{route('videos.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">E-Learning Videos</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'limited_products'))
            <li class="nav-item  ">
                <a href="{{route('products.limits')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Limited Products</span>
                    <span class="badge badge-danger">{{count($limited_products)}}</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'orders'))
            <li class="nav-item  ">
                <a href="{{route('baskets.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Orders</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'messages'))
            <li class="nav-item  ">
                <a href="{{route('messages.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Users Messages</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'categories'))
            <li class="nav-item  ">
                <a href="{{route('categories.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Categories</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'sub_categories'))
            <li class="nav-item  ">
                <a href="{{route('subcategories.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Sub-Categories</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'countries'))
            <li class="nav-item  ">
                <a href="{{route('countries.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Countries</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'cities'))
            <li class="nav-item  ">
                <a href="{{route('cities.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Cites</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'states'))
            <li class="nav-item  ">
                <a href="{{route('states.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">States</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'slider'))
            <li class="nav-item">
                <a href="{{route('sliders.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Slider</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'infinity'))
            <li class="nav-item">
                <a href="{{route('infinity.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Infinity</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'process'))
            <li class="nav-item">
                <a href="{{route('process.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Processes & Procedures</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'founder'))
            <li class="nav-item">
                <a href="{{route('founders.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Infinity Founders</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'events'))
            <li class="nav-item  ">
                <a href="{{route('events.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Events</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'events_requests'))
            <li class="nav-item  ">
                <a href="{{route('requests.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Events Requests</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'about_us'))
            <li class="nav-item  ">
                <a href="{{route('about.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">About Us</span>
                </a>
            </li>
            @endif
            @if(str_contains(auth()->user()->role->permissions,'contact_us'))
            <li class="nav-item  ">
                <a href="{{route('contacts.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Contact US</span>
                </a>
            </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->