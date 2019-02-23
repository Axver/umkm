<?php
if (!isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/project1/");
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

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/bootstrap/css/sb-admin-2.min.css'); ?>" rel="stylesheet">


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
    </style>

</head>

<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Left Navigation -->
        <?php echo $left_nav;
echo $modal_umkm;
echo $modal_insert;
// var_dump($laptop);
 ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button class='btn btn-danger' onclick="window.location='<?php echo site_url(" login/logout"); ?>'">Logout
                        </button> <!-- Sidebar Toggle (Topbar) -->
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


                            <div class='panel-head'>
                                <h3>Input Marker</h3>
                            </div>
                            <div style='margin-left:10px;' class='panel-body'>
                                <form style='margin-left:10px;margin-right:20px;' action='<?php echo base_url('index.php/insertumkm/inputumkm') ?>' method='POST'>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama UMKM</label>
                                        <input name='nama_umkm' type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nama UMKM">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pemilik</label>
                                        <input name='nama_pemilik' type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pemilik">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Jenis UMKM</label>
                                        </div>
                                        <select name='jenis_umkm' class="custom-select" id="inputGroupSelect01">
                                            <?php

                                         foreach ($jenis_umkm as $ju) {
                                           ?>
                                            <option value="<?php echo $ju['id_jenis']?>">
                                                <?php echo $ju['nama_jenis']; ?>
                                            </option>


                                            <?php }?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Input Foto</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <input type="text" name="lat" id="lat" placeholder='Latitude'>
                                    <input type="text" name="lon" id="lon" placeholder='Longitude'>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>


                        </div>
                    </div>

                

                    <div class='col-sm-6'>

                        <div class='panel panel-info'>


                            <div class='panel-head'>
                                <h3>Panel Head 1</h3>
                            </div>
                            <div class='panel-body'>
                                Test
                            </div>


                        </div>
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