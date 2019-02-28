<?php
if (!isset($this->session->userdata['logged_in'])) {
    
    $role=$this->session->userdata('role');
    if($role=='admin')
    {
    header("location: http://localhost/project1/");
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HelioMetris</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/bootstrap/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/bootstrap/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    table,th,tr,td{
        border:1px solid black;
    }
 
    </style>

</head>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Left Navigation -->
        <?php echo $left_nav;
echo $modal_umkm;
echo $modal_insert;
echo $modal_list_user;
echo $modal_maps;
// var_dump($laptop);
 ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button class='btn btn-danger' onclick="window.location='<?php echo site_url("login/logout"); ?>'">Logout
                    </button> <!-- Sidebar Toggle (Topbar) -->
                    <!-- <div class='panel panel-info'>
                        <div class='panel-body'>
                        <button class='btn btn-info' onclick='pantau_koordinat()'>Koordinat</button>
                        <input style='width:50px;' type="text" name="" id="latlive">
                        <input style='width:50px;' type="text" name="" id="lonlive">
                        </div>
                        </div> -->

                    <div style='margin-left:20px;'>
                        <b>Maps</b><br/>
                        <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                        <a href="#"><i class="fas fa-route"></i></a>
                        <a href="#"><i class="fas fa-draw-polygon"></i></a>
                     
                        
                    </div>

                    <div style='margin-left:20px;'>
                        <b>User</b><br/>
                        <a href="#" data-toggle="modal" data-target="#listuser"><i class="fas fa-user"></i></a>
                        <a href="#"><i class="fas fa-table"></i></a>
                        <a href="#"><i class="fas fa-chart-area"></i></a>
                        <a href="#"><i class="fas fa-plus-circle"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                        
                    </div>

                    <div style='margin-left:20px;'>
                        <b>UMKM</b><br/>
                        
                        <a href="#"><i class="fas fa-table"></i></a>
                        <a href="#"><i class="fas fa-chart-area"></i></a>
                        <a href="#"><i class="fas fa-chart-pie"></i></a> 
                        <a href="#"><i class="fas fa-dollar-sign"></i></a>
                        <a href="#"><i class="fas fa-print"></i></a>
                        <a href="#"><i class="far fa-edit"></i></a>
                        <a href="#"><i class="fas fa-plus-circle" data-toggle="modal" data-target="#modalinsert"></i></a>
                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                        
                    </div>

                  
                  

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?php echo $map; ?>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div style='background-color:#4E73DF;color:white;' class='panel panel-info'>


                           


                        </div>
                    </div>



                    <div class='col-sm-6'>

                       
                    </div>
                </div>
                <!-- /.container-fluid -->


            </div>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeTitle() {
            $("button").click(function () {
                var text = $(this).text();
                console.log(text);
                $("input").val(text);
            });
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/bootstrap/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/bootstrap/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/bootstrap/js/sb-admin-2.min.js') ?>"></script>


</body>

</html>