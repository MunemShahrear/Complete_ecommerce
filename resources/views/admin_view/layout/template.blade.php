<!DOCTYPE html>
<html lang="en">
    @include('backend.includes.header')


    <body>
        <!-- Loader  -->
        @include('backend.includes.preloader')
        <!-- page-wrapper Start       -->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @include('backend.includes.topbar')
            <!-- Page Header Ends   -->
                <!-- Page Body Start-->
                <div class="page-body-wrapper sidebar-icon">
                    <!-- Page Sidebar Start-->
                    @include('backend.includes.leftsidebar')
                    <!-- Page Sidebar End-->
                    <div class="page-body">
                        @yield('body-content')
                    </div>
                    <!-- Page footer Start-->
                    @include('backend.includes.footer')
                    <!-- Page footer End-->

                    @yield('modal')
                </div>
                <!-- Page Body End-->
        </div>


        <!-- jQuery  -->
        @include('backend.includes.scripts')


    </body>
</html>
