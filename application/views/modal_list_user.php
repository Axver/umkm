<div class="modal fade" id="listuser" tabindex="-1" role="dialog" aria-labelledby="listuser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listuser">List User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        
        foreach ($listuser as $lu) {
            echo $lu['username']." " .$lu['password'];?>

            <button class='btn btn-info' onclick='alertkan("<?php echo $lu['username'];?>")'>Info</button>
        <?php 
        }
        
        ?>
        
      </div>
      <script>
      function alertkan(nama)
      {
        alert(nama);
      }
      </script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>