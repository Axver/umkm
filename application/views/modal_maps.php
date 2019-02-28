<div class="modal fade" id="modalmaps" tabindex="-1" role="dialog" aria-labelledby="listuser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listuser">Polygon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method='POST' action="<?php echo base_url("index.php/insertumkm/inputpoli")?>">
      <input type="text" class='form-control' name="id_umkm" id="id_umkm" placeholder='Masukkan ID'>
      <small>Klik Marker untuk melihat ID</small>
      <b>Data Koordinat</b>
      
      <input type="text" class='form-control' name="poli" id="poli">
      <script>
      function savepolygon()
      {
       var koordinat=document.getElementById("poli").value;
       var id_umkm=document.getElementById('id_umkm').value;
    //    alert(koordinat);
    //    alert(id_umkm);
       var lokasi= '<?php echo base_url("index.php/insertumkm/inputpoli")?>';
       
      }
       
      </script>
      
       <input type="submit" class="btn btn-primary" value='Save Polygon' onclick='savepolygon()'>
       </form>
      </div>
      

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>