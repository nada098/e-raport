<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 tekt-gray-800">
		<span class="fas fa-tachometer-alt"></span>&nbspMapel
	</h1>
</div>
 
<!-- container -->
   <div class='container-fuild'>
 	<!--card-->
 	<div class='card shadow mb-4'>
 		<!-- card header -->
 		<div class='card-header py-3'>
 			<h6 class= "m-0 font-weight-bold text-primary">Data Mapel
      <a href="#" type="button" class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target=".bd-example-modal-xl">
                <span class=" icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
      </h6>
 		</div>
 		<div class="card-body">
 			<table class="table">
  <thead>
    <tr>
      <th scope="col">id_mapel</th>
      <th scope="col">nama_mapel</th>
      <th scope="col">guru</th>
      <th scope="col">aktif</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  foreach ($data->result_array()as $row){
  	  ?>
    <tr>
      <td><?= $row['id_mapel']; ?></td>
       <td><?= $row['nama_mapel']; ?></td>
       <td><?= $row['guru']; ?></td>
       <td><?= $row['aktif']; ?></td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" onclick="edit('<?php echo $row['id_mapel']; ?>')">Edit</button>
  	<a href="<?php echo base_url(); ?>Mapel/hapus/<?php echo $row['id_mapel']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus?');" onclick="return confirm('Yakin Mau di Hapus?');" >Hapus</a></td>
  <?php } ?>
    </tr>
  </tbody>
</table>

      </div>
 </div>
 <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-fw fa-box"></span>&nbsp&nbspTambahkan Mapel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

<div class="modal-body">
              <form action="<?php echo base_url() .'mapel/simpan';?> "enctype="multipart/from-data" method="post">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Id_mapel</label>
    <input type="text" class="form-control" name="id_mapel" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nama_mapel</label>
    <input type="text" class="form-control" name="nama_mapel" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Guru</label>
    <input type="text" class="form-control" name="guru" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Aktif</label>
    <select class="form-control" aria-label="Default select example" name="aktif">
      <option selected>Open This Select Menu</option>
    <option value="1">Aktif</option>
    <option value="1">Tidak aktif</option>         
    </select>
  </div>
   <div class="modal-footer">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span>&nbspSimpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span>&nbspBatal</button>
            </div>
</form>
 </div>
 	</div>
 </div>
 </div>
  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

       <div class="modal-body" id="edit_mapel">
</div>
         </div>
     </div>
   </div>

<script type="text/javascript">
            function edit(id_mapel){
              var id = id_mapel;
              $.ajax({
                type: 'POST',
                data: 'id_mapel=' + id,
                url: '<?php echo base_url(); ?>mapel/edit',
                success: function(data){
                   $('#edit_mapel').html(data);
                }
              });
            }
          </script>
<!-- End Modal -->