
<!DOCTYPE html>
<html lang="en">

@include("admin.headbar")

<body id="page-top">
    
    <!-- Page Wrapper -->
    
    <!-- end -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include("admin.sidebar")
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include("admin.topbar")
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- @yield('zakki') -->
                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">@yield('content-title')</h1>
                    @yield('content')           
                </div>
            </div>

            <!-- End of Main Content -->
            
            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    @include("admin.footer")

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">apakah anda ingin keluar dari aplikasi? klik logout jika ingin</div>
                <div class="modal-footer">
                    <form action="/logout" method="post">
                       @csrf
                       <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                       <input type="submit" class="btn btn-primary" value=Logout>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>