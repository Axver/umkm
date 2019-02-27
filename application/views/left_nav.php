
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Helio <sup>Metris</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Jenis UMKM</span>
        </a>
  

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tampil berdasarkan List:</h6>
            <!-- <a class="collapse-item" href="buttons.html" data-toggle="modal" data-target="#exampleModal">Kuliner</a> -->
            <?php foreach ($jenis_umkm as $jenis) {?>
              <a class="collapse-item" href="#" onclick='tampil_umkm(<?php echo $jenis['id_jenis']; ?>)'><?php echo $jenis['nama_jenis'] ?></a>
            <?php } ?>
            
            <script>
             function tampil_umkm(id)
             {
               var marker= new Array();
              //  alert(id);
                        $.ajax({
                            type: 'GET',
                            url: 'http://localhost/project1/index.php/geomkab/umkmgeom/' + id,
                            success: function (html) {
                                  // alert(html);
                                  arrdata=JSON.parse(html);
                                  sumdata=arrdata.length;
                                  for(i=0;i<sumdata;i++)
                                  {
                                    marker[i] = L.marker([arrdata[i]['latutude'], arrdata[i]['longitude']]).addTo(mymap);
                                    marker[i].bindPopup("<b>"+"NO SIUP:"+arrdata[i]['nomor_siup']+"</b>"
                                    +"<br/>"
                                    +"<table><th>Detil</th><th>Info</th> <tr> <td>Nama Perusahaan</td><td>"+arrdata[i]['nama_perusahaan']+"</td></tr>"
                                    +"<tr><td>Alamat Perusahaan:</td>"
                                    +"<td>"
                                    +arrdata[i]['alamat_perusahaan']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>No Telepon:</td>"
                                    +"<td>"
                                    +arrdata[i]['no_telepon']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>Nama Pemilik:</td>"
                                    +"<td>"
                                    +arrdata[i]['nama_pemilik']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>Bidang Usaha:</td>"
                                    +"<td>"
                                    +arrdata[i]['bidang_usaha']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>Kegiatan Usaha:</td>"
                                    +"<td>"
                                    +arrdata[i]['kegiatan_usaha']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>Modal Kekayaan:</td>"
                                    +"<td>"
                                    +arrdata[i]['modal_kekayaan']
                                    +"</td>"
                                    +"</tr>"
                                    +"<tr><td>Barang/Jasa:</td>"
                                    +"<td>"
                                    +arrdata[i]['barang_jasa_dagangan']
                                    +"</td>"
                                    +"</tr>"
                                    +"</table>"
                                    +"<button class='btn btn-info'>Polygon</button>"
                                    +"<button class='btn btn-info'>Info</button>"
                                    +"<button class='btn btn-info'>Delete</button>"
                                    
                                    );
                                  }
                            }
                        });
                   
             }
            </script>
           
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#modalinsert">Input Data</a>
           
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->