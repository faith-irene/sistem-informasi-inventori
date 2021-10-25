<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mt-2">
                    <div class="card-header bg-primary">
                    <div class="row">
                    <h3 class="card-title">Data Barang Keluar</h3>
                    </div>
                    </div>
                    <div class="card-body">
                    <form id="add-cart">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="">Kode barang keluar</label>
                            <div class="input-group">                     
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" id="tombol-gen" type="button">Generate</button>
                                </div>
  <!-- sambung dari sini -->
                                <input type="text" class="form-control" id="kode_issue" name="kode_issue" placeholder="masukan kode" readonly aria-label="" aria-describedby="basic-addon1">
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputCity">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" >
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-secondary">
                    <button type="submit" class="btn btn-success btn-sm">Masukan</button>
                    <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </form>
                    </div>
                </div>
            </div>
        </div> <!-- row 1 -->
        <div class="row justify-content-center">
        <!-- khusus laporan saja -->

            <!-- <div class="col-6"> 
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel_barang_keluar" class="table">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kode</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                             $query = "SELECT id_tranc, tgl_keluar, 
                             GROUP_CONCAT(nama_barang) as item, 
                             GROUP_CONCAT(jumlah) as jml,
                             GROUP_CONCAT(kode_barang) as kode
                             FROM tbl_issuing GROUP BY id_tranc ORDER BY id_tranc ";
                             $result = $this->db->query($query)->result_array();
                            //  echo "<pre>";
                            //  var_dump($result);
                            //  echo "</pre>";
                            foreach ($result as $row ) :
                             ?>
                             <tr>
                                <td><?= $row['id_tranc']; ?></td>
                                <td><?= $row['tgl_keluar']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                             </tr>
                             <?php
                             $barang = explode(',',$row['item']);
                             $as = explode(',',$row['jml']);
                             $code = explode(',',$row['kode']);
                            //   echo "<pre>";
                            //  var_dump($barang);
                            //  echo "</pre>";
                            //  echo "==============";
                            //  echo "<pre>";
                            //  var_dump($code);
                            //  echo "</pre>";
                                $result = array_map(function($item,$jumlah,$kode){
                                    return array_combine(
                                        ['nama','jumlah','kode'],[$item,$jumlah,$kode]
                                    );
                                },$barang,$as,$code);

                                // echo json_encode($result, JSON_PRETTY_PRINT);

                                // echo "<pre>";
                                // var_dump($result);
                                // echo "</pre>";
                                
                            //  foreach (array_combine($barang,$as) as $item => $jumlah) {
                                foreach ($result as $key ) {
                             ?>
                             <tr>
                              <td></td>
                              <td></td>
                              <td><?= $key['nama']; ?></td>
                              <td><?= $key['jumlah']; ?></td>  
                              <td><?= $key['kode']; ?></td>
                             </tr>
                             <?php
                                }
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div> 
            </div> -->

            <div class="col-10">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-5">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="cart-barang">
                                
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <td><button class="btn btn-sm btn-primary" disabled="disabled">Simpan</button></td>
                                </tr>
                            </tfoot> -->
                    </table> 
                    <div class="save mt-5">
                        <button class="btn btn-primary" id="simpan-cart">Simpan</button>  
                    </div>                         
                </div>
            </div>
            </div>
            </div>
        </div> <!-- row 2 -->
    </div>
</section>
</div>
<script>
    $("#simpan-cart").prop('disabled',true);
</script>
<?php 
//    $keranjang = $this->cart->contents();
//    $tanda = TRUE;

//    foreach ($keranjang as $benda) {
//        var_dump($benda);
      
//    }
//    if (!empty($keranjang)) {
//     echo "<script>
//       $(document).ready( function(){
//           $('#simpan-cart').removeAttr('disabled');
//       });
//     </script>";
// } else {
//   echo "<script>
//   $(document).ready( function(){
//       $('#simpan-cart').prop('disabled',true);
//   });
// </script>";
// }
?>
<!-- bikin cart nya lah -->
<script>
    $("#kode_barang").on('keyup',function(){
        var id = $(this).val();
        if (this.value.length == 7) {
            $.ajax({
                data: {id : id},
                url: '<?= base_url('pegawai/show_barang') ?>',
                dataType: "JSON",
                method: "post",
                success: function(data){
                    console.log(data);
                    $("#nama_barang").val(data.nama_barang);
                }
            });
            
        } else if (this.value.length == 0) {
            $("#nama_barang").val("");
            $("#kode_issue").val("");
            $("#tombol-gen").prop('disabled',false);
        }
    });

    $('#tombol-gen').on('click', function(){
        $.ajax({
                        dataType: 'text',
                        url: "<?= base_url('pegawai/gen_kode'); ?>",
                        success: function(html){
                            console.log(html);
                            $("#kode_issue").val(html);
                        }
                    });
                    $("#tombol-gen").prop('disabled',true);
    });
    
    $("#add-cart").submit( function(e){
        e.preventDefault();
        kode_barang = $("#kode_barang").val();
        jumlah = $("#jumlah").val();
        nama_barang = $("#nama_barang").val();
        $.ajax({
            url: "<?= base_url('pegawai/add_cart') ?>",
            data: { nama_barang : nama_barang , kode_barang : kode_barang, jumlah : jumlah},
            method: 'POST',
            success: function(result){
                // location.reload();
                $('#cart-barang').html(result);
                console.log(result);
            }
        })
    });

    $(document).on('click','.remove-item',function(e){
        var id = $(this).data('id');
        $.ajax({
            url: "<?= base_url('pegawai/remove_cart') ?>",
            data: { rowid : id },
            method: "POST",
            success: (result) => {
                $("#cart-barang").html(result);
            }
        });
    });

    $("#cart-barang").load("<?= base_url('pegawai/load_cart'); ?>");
    
    $("#simpan-cart").on('click', function(){
        code = $("#kode_issue").val();
        date = $("#tanggal").val();

        $.ajax({
            data: { code : code , date : date},
            url: "<?= base_url('pegawai/proses'); ?>",
            method: "POST",
            success: function(result) {
                //bila sukses kosongkan field isian, OK
                $("#cart-barang").html(result);
            }
        });
    });
</script>