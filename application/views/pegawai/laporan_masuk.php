<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
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
                                       background-color: #58D68D  ; 
                                    }
                                    .custom-btn-1:hover {
                                        background-color:#16A085 ;
                                    }

                                    .custom-btn-2 {
                                        width: 50px;
                                        background-color: #EC7063 ;
                                    }

                                    .custom-btn-2:hover {
                                        background-color: #CB4335  ;
                                    }
                            </style>
                            <div class="box d-flex align-content-center flex-wrap">
                                <form action="<?= base_url('pegawai/laporan_barang_in') ?>" method="get" class="form-inline " id="cari-report-in">
                                        <label class="small ml-2" for="">Tanggal masuk</label>

                                        <input type="date" value="<?= @$_GET['tgl_awal'] ?>" name="tgl_awal" id="tanggal1" class="ml-2 mr-2 form-control form-control-sm">

                                        <label class="small" for="">Tanggal keluar</label>

                                        <input type="date"  value="<?= @$_GET['tgl_akhir'] ?>" name="tgl_akhir" id="tanggal2" class="form-control ml-2 mr-2 form-control-sm">
                                        <input type="submit" id="cari-data-in" name="cari" class="mx-2 btn custom-btn-1 btn-sm right" value="Cari">
                                        <input type="button" value="Batal" class="btn btn-sm custom-btn-2">
                                        <?php 
                                    if (isset($_GET['cari'])) {
                                        echo "<a href='".base_url('report_in') ."' class='btn btn-sm custom-btn-2' name='batal' id='batal' value='batal' ></a>";
                                    }
                                    ?>   
                                        <button type="button" class="btn btn-primary btn-sm ml-5" name="print" id="print"><span class="fa fa-print"></span> Print</button>
                                        <a href="<?= $url_cetak; ?>" target="_blank">KLIK</a>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="tabel-report-in" class="table">
                                    <thead>
                                    <tr>
                                        <td>Kode Transaksi</td>
                                        <td>Tanggal Masuk</td>
                                        <td>Supplier</td>
                                        <td>Kode Barang</td>
                                        <td>Nama Barang</td>
                                        <td>Jenis</td>
                                        <td>Merk</td>
                                        <td>Jumlah</td>
                                    </tr>
                                    </thead>
                                    <tbody id="bodi-tabel-in">
                                    <?php    
                                                // $jenis = explode(',',$row['j_brg']);
                                                // $kode = explode(',',$row['kd_brg']);
                                                // $nama = explode(',',$row['nm_brg']);
                                                // $merk = explode(',',$row['mr_brg']);
                                                // $jumlah = explode(',',$row['jml']);
                                                // $hasil = array_map(function($a,$b,$c,$d,$e){
                                                //     return array_combine(['jenis','kode_barang','nama_barang','merk_barang','jumlah'],[$a,$b,$c,$d,$e]);
                                                // },$jenis,$kode,$nama,$merk,$jumlah);
                                        //         $query = "SELECT id_tranc, tgl_masuk, supplier , 
                                        // GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
                                        // GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving WHERE tgl_masuk BETWEEN  '$start_date'  AND '$end_date' GROUP BY id_tranc order by tgl_masuk";
                                    ?>
                                    <!-- batas -->
                                     <?php
                                     if (empty($kueri)) {
                                        echo "<tr><td>Tidak ada Data</td></tr>";
                                     } else {
                                         foreach ($kueri as $row) :
                                             $tgl = date('d F Y', strtotime($row['tgl_masuk']));
                                             ?>
                                             <tr>
                                                <td><?= $row['id_tranc']; ?></td>
                                                <td><?= $tgl; ?></td>
                                                <td><?= $row['supplier']; ?></td>
                                                <td colspan="5"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                                <td style="display: none;"></td>
                                             </tr>
                                             <?php
                                              $jenis = explode(',',$row['j_brg']);
                                                $kode = explode(',',$row['kd_brg']);
                                                $nama = explode(',',$row['nm_brg']);
                                                $merk = explode(',',$row['mr_brg']);
                                                $jumlah = explode(',',$row['jml']);
                                                $hasil = array_map(function($a,$b,$c,$d,$e){
                                                    return array_combine(['jenis','kode_barang','nama_barang','merk_barang','jumlah'],[$a,$b,$c,$d,$e]);
                                                },$jenis,$kode,$nama,$merk,$jumlah);
                                            foreach ($hasil as $key) {
                                                ?>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                    <td><?= $key['kode_barang'] ?></td>
                                                    <td><?= $key['nama_barang'] ?></td>
                                                    <td><?= $key['jenis'] ?></td>
                                                    <td><?= $key['merk_barang'] ?></td>
                                                    <td><?= $key['jumlah'] ?></td>
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
// $(document).ready( function(){
    
//     fetch_data('no');
    
//    function fetch_data(is_date_cari, awal_date_cari='', akhir_date_cari=''){
//     var tabel_name = "tbl_receiving"; 
//     var Tabel_in =  $("#bodi-tabel-in").DataTable({
//         'processing' : true,
//         'serverSide' : true,
//         'order' : [],
//         "ajax" : {
//             url : '<?= base_url('pegawai/tabel_fetch') ?>',
//             type: "POST",
//             data : { tabel_name : tabel_name , cari : cari , awal_date_cari : awal_date_cari , akhir_date_cari : akhir_date_cari}
//         }
//         // ,
//         // "columns": [ 
//         //     {"data": "id_tranc"},
//         //     {"data" : "tgl_masuk"},
//         //     {"data" : "supplier"},
//         //     {"data" : "kode_barang"},
//         //     {"data" : "nama_barang"},
//         //     {"data" : "nama_barang"},
//         //     {"data" : "nama_barang"},
//         //     {"data" : "nama_barang"},
//         // ]
//     });
//    }

//     $("#cari-data-in").on('click', function(){
//         var awal_date_cari = $("#tanggal1").val();
//         var akhir_date_cari = $("#tanggal2").val();
//         if (awal_date_cari != '' && akhir_date_cari != '') {
//             $("#bodi-tabel-in").DataTable().destroy();
//             fetch_data('yes',awal_date_cari,akhir_date_cari);
//         } else {
//             alert("Tanggal Harus diisi");
//         }
//     })
// });

$(document).ready( function(){
    
    //tombol print
    $("#print").on('click', function(){
     
    });

    //tombol batal
    $("#batal").click( function(){

    })

    $("#tabel-report-in").DataTable({});
})
</script>