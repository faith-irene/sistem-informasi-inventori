<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <style>
                             .box {
                                        width: 100%;
                                        height: 10vh;
                                        border: 0px solid ;
                                        border-radius: 5px;
                                        padding: 5px;
                                        margin: 2px;
                                        background-color: #A9CCE3 ;
                                        }
                                    .custom-btn-1 {
                                       width: 100px;
                                       background-color: #82E0AA; 
                                    }
                                    .custom-btn-1:hover {
                                        background-color: #58D68D;
                                    }

                                    .custom-btn-2 {
                                        width: 50px;
                                        background-color: #EC7063 ;
                                    }

                                    .custom-btn-2:hover {
                                        background-color: #F5B7B1 ;
                                    }
                            </style>
                            <div class="box d-flex align-content-center flex-wrap">
                                <form action="" class="form-inline">
                                <label class="small ml-2" for="">Tanggal masuk</label>
                                <input type="date" value="<?= @$_GET['tgl_awal'] ?>" name="tgl_awal" id="tanggal1" class="ml-2 mr-2 form-control form-control-sm">
                                <label class="small" for="">Tanggal keluar</label>
                                <input type="date"  value="<?= @$_GET['tgl_akhir'] ?>" name="tgl_akhir" id="tanggal2" class="form-control ml-2 mr-2 form-control-sm">
                                <button type="submit" class="btn btn-success btn-sm">CARI</button>
                                <a href="" class="btn btn-sm btn-danger">BATAL</a>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel-keluar" class="table">
                                <thead>
                                        <tr>
                                            <td>ID Transaksi</td>
                                            <td>Tanggal Keluar</td>
                                            <td>Kode Barang</td>
                                            <td>Nama Barang</td>
                                            <td>Jumlah</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                       if (empty($query)) {
                                           echo "<tr><td>Data Not Found</td></tr>";
                                       } else {
                                           foreach ($query as $item) :
                                            $date = date('d F Y',strtotime($item['tgl_keluar']));
                                               ?>
                                            <tr>
                                                <td><?= $item['id_tranc']; ?></td>
                                                <td><?= $date; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                              <?php
                                              $kode_barang = explode(',',$item['kd_brg']);
                                              $nama_barang = explode(',',$item['nm_brg']);
                                              $jumlah = explode(',',$item['jml']);
                                              $hasil = array_map(function($a,$b,$c){
                                                  return array_combine(['kode_barang','nama_barang','jumlah_barang'],[$a,$b,$c]);
                                              },$kode_barang,$nama_barang,$jumlah) ;

                                              foreach ($hasil as $new_item ) {
                                                 ?>
                                                 <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $new_item['kode_barang']; ?></td>
                                                    <td><?= $new_item['nama_barang']; ?></td>
                                                    <td><?= $new_item['jumlah_barang']; ?></td>
                                                 </tr>
                                                 <?php
                                              }

                                           endforeach;
                                       }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready( function(){
   
    tampil_data();
    function tampil_data(){
        $.ajax({
        url: "<?= base_url('pegawai/laporan_barang_out') ?>",
        dataType: "JSON",
        success: function(data){
            console.log(data);
        }
    });
    }
});
</script>