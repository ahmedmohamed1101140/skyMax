@include('admin.partials.header')

<div class="page-container">
@include('admin.partials.navigation')
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">@yield('home')</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>@yield('page_title')</span>
                    </li>
                </ul>



            </div>
            <!-- END PAGE BAR -->

            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> @yield('page_head')
                <small>@yield('page_description')</small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            @include('admin.partials.messages')
            @yield('content')

        </div>
    </div>
</div>

@include('admin.partials.quick-sidebar')
</div>

@include('admin.partials.footer')