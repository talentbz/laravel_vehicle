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
            <!-- Back to top button -->
            <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
                <i class="fas fa-arrow-up"></i>
            </button>
            <div class="page-content">
                <!-- Start content -->
                @yield('content')
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

            //back to top
            var btn = $('#btn-back-to-top');
            $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
            });

            btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
            });

        
    </script>
</body>

</html>