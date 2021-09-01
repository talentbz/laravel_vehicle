@include('frontend.layouts.header')

@section('body')
    <body data-topbar="dark" data-layout="horizontal">
@show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('frontend.layouts.menu')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <!-- loading spinner -->
            <div class="spinner-wrapper">
                <div class="spinner-border text-primary m-1" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="page-content">
                <!-- Start content -->
                @yield('content')
                <div class="container-fluid">
                    
                </div> <!-- content -->
            </div>
            @include('frontend.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <script>
        var datatable_json = "{{URL::asset('/assets/js/pages/japanese.json')}}"
    </script>
    <!-- END wrapper -->
    <!-- Right Sidebar -->
    <!-- END Right Sidebar -->
    @include('layouts.vendor-scripts')
    <script>
        $(document).ready(function(){
        //ajax loading spinner
        var loading = $('.spinner-wrapper').hide();
        $(document)
            .ajaxStart(function () {
                loading.show();
            })
            .ajaxStop(function () {
                setTimeout(function(){
                    loading.hide();
                }, 500)
            });
        })
    </script>
</body>

</html>