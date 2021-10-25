<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-1">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="card-title mt-2">Tabel Data Jenis</h3>
                            </div>
                        </div>
                        <div class="card-body" style="width: 50%;">
                        <button data-toggle="modal" data-target="#modal_add" class="btn btn-sm btn-primary mb-1"><i class="fa fa-plus-circle"></i> TAMBAH DATA</button>
                        <table id="tbl_merk"   class="table compact table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>/</th>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $c = null;
                    foreach ($merk as $m) :
                        
                  ?>
                  <tr>
                    <td>/</td>
                    <td><?= $c = $c + 1; ?>
                    </td>
                    <td style="white-space: nowrap;" ><?= $m['merk']; ?></td>
                    <td style="white-space: nowrap;" > 
                        <a href="<?= base_url('pegawai/delete_merk/'); echo $m['id']; ?>" class="btn btn-xs btn-danger" ><span class="fa fa-trash mr-1"></span>hapus</a>
                        <a href="" data-toggle="modal" data-target="#modal-edit-merk" data-id="<?= $m['id']; ?>" class="btn btn-xs btn-success edit-merk" ><span class="fa fa-edit mr-1"></span>edit</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th> ### </th>
                    <th>Number</th>
                    <th>Kind of item</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal ADD -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Merk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="<?= base_url('pegawai/add_merk') ?>">
                <div class="form-group">
                <input type="text" name="merk" class="form-control" id="merk">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal EDIT -->
<div class="modal fade" id="modal-edit-merk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand / Merk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="<?= base_url('pegawai/edit_merk') ?>">
       <input type="hidden" name="id_merk" id="id_merk" >
                <div class="form-group">
                <input type="text" name="eMerk" class="form-control" id="eMerk">
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
/* table.pretty {
    width: 100%;
    clear: both;
}
 
table.pretty td,
table.pretty th {
    padding: 5px;
    border: 1px solid #fff;
}
table.pretty tbody th {
    text-align: left;
    background: #91c5d4;
}
 
table.pretty tbody td {
    text-align: center;
    background: #d5eaf0;
}
 
table.pretty tbody tr.odd td {
    background: #bcd9e1;
} */

.dataTables tbody tr {
min-height: 10px; 
 } 

 #example tbody > tr > td {
white-space: nowrap;
}


</style>
<!-- jQuery -->
<script src="<?= base_url('assets/js/') ?>jquery.js"></script>
<script>
$(document).ready( function(){
    $(".edit-merk").on('click', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    // console.log(id);
    $.ajax({
        url:"<?= base_url('pegawai/show') ?>",
        data: { id : id , table : "tbl_merk"},
        dataType: "JSON",
        method: "post",
        success: function(response) {
            $("#id_merk").val(response.id);
            $("#eMerk").val(response.merk);
        }
    });
});
});
</script>