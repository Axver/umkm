<div class="modal fade" id="modalsiup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input SIUP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style='overflow-y:scroll;'>
      <form action='<?php echo base_url('index.php/insertumkm/inputsiup') ?>' method='POST'>
  <div class="form-group">
    <label for="exampleInputEmail1">Nomor SIUP</label>
    <input type="text" name="nomor_siup" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Siup">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nama Perusahaan</label>
    <input name='nama_perusahaan' type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Perusahaan">
  </div>


    <div class="form-group">
    <label for="exampleInputPassword1">Alamat Perusahaan</label>
    <input name='alamat_perusahaan' type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat Perusahaan">
    <label for="exampleInputPassword1">Jenis Usaha Perdagangan</label>
    <select class='form-control' name="jenis_siup" id="">
    <?php
foreach ($jenis_siup as $jsi) {
  ?>
  <option value='<?php echo $jsi['id_jenis_up']; ?>'><?php echo $jsi['nama_jenis_up']; ?></option>
  <?php
}
    ?>
    </select>

        <?php
foreach ($jenis_siup as $jsi) {
 echo $jsi['id_jenis_up'];
}
    ?>
    
    <input name='fax' type="text" class="form-control" id="exampleInputPassword1" placeholder="Fax">
    <label for="exampleInputPassword1">No Telepon</label>
    <input name='no_telepon' type="text" class="form-control" id="exampleInputPassword1" placeholder="No Telepon">
    <label for="exampleInputPassword1">Nama Pemilik</label>
    <input name='nama_pemilik' type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pemilik">
    <label for="exampleInputPassword1">Alamat Pemilik</label>
    <input name='alamat_pemilik' type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat Pemilik">
    <label for="exampleInputPassword1">NPWP</label>
    <input name='npwp' type="text" class="form-control" id="exampleInputPassword1" placeholder="NPWP">
    <label for="exampleInputPassword1">Modal Kekayaan</label>
    <input name='modal_kekayaan' type="text" class="form-control" id="exampleInputPassword1" placeholder="Modal Kekayaan">
    <label for="exampleInputPassword1">Kegiatan Usaha</label>
    <input name='kegiatan_usaha' type="text" class="form-control" id="exampleInputPassword1" placeholder="Kegiatan Usaha">
    <label for="exampleInputPassword1">Kelembagaan</label>
    <input name='kelembagaan' type="text" class="form-control" id="exampleInputPassword1" placeholder="Kelembagaan">
    <label for="exampleInputPassword1">Bidang Usaha</label>
    <input name='bidang_usaha'type="text" class="form-control" id="exampleInputPassword1" placeholder="Bidang Usaha">
    <label for="exampleInputPassword1">Barang/Jasa Dagangan</label>
    <input name='dagangan' type="text" class="form-control" id="exampleInputPassword1" placeholder="Barang/Jasa Dagangan">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>