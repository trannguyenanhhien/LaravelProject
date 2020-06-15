<!DOCTYPE html>
<html lang="en">

@include('admin.layout.header')

<body class="theme-blush">
    <!-- Page Loader -->
    @include('admin.layout.loader')
    @yield('head')
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Main Search -->
    @include('admin.layout.searchmain')
    @include('admin.layout.iconsidebar')
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        @include('admin.layout.leftsidebar')
    </aside>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
    @include('admin.layout.rightsidebar')
    </aside>
    <!-- Main Content -->
    <section class="content">
        @yield('content')
    </section>
    <!--End wrapper-->
    @include('admin.layout.bot')
    @yield('bot')
</body>

</html>