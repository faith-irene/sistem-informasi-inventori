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
                                        background-color: #D5F5E3 ;
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
                                <form action="" method="post" class="form-inline " id="cari-report-in">
                                        <label class="small ml-2" for="">Tanggal masuk</label>

                                        <input type="date" value="" name="tanggal1" id="tanggal1" class="ml-2 mr-2 form-control form-control-sm">

                                        <label class="small" for="">Tanggal keluar</label>

                                        <input type="date" value="" name="tanggal2" id="tanggal2" class="form-control ml-2 mr-2 form-control-sm">
                                        <input type="submit" id="cari-data-in" name="cari" class="mx-2 btn custom-btn-1 btn-sm right" value="Cari">
                                        <input type="reset" class="btn custom-btn-2 btn-sm" name="batal" id="batal" value="Batal">
                                        <button type="button" class="btn btn-primary btn-sm ml-5" name="print" id="print"><span class="fa fa-print"></span> Print</button>
                                        <a href="<?= base_url('pegawai/laporan_masuk'); ?>">KLIK</a>
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
                                    ?>
                                    <!-- batas -->
                                    <?php 
                        if (isset($_POST['cari'])) {
                                $start_date = $_POST['tanggal1'];
                                $end_date = $_POST['tanggal2'];
                                // var_dump($start_date);
                                // var_dump($end_date);
                                
                            if ( !empty($start_date) && !empty($end_date) ) {
                                $query = "SELECT id_tranc, tgl_masuk, supplier , 
                                        GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
                                        GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving WHERE tgl_masuk BETWEEN  '$start_date'  AND '$end_date' GROUP BY id_tranc order by tgl_masuk";
                                $result = $this->db->query($query);
                                if ($result->num_rows() == 0) {
                                   echo "<tr>
                                   <td> DATA NOT FOUND</td>
                                   </tr>";
                                }   else {
                                    foreach ($result->result_array() as $row) :
                                        $tanggal = date('d F Y', strtotime($row['tgl_masuk']));
                                        ?>
                                            <tr>
                                                <td><?= $row['id_tranc']; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $row['supplier']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                                                foreach ($hasil as $key ) {
                                                    ?> 
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $key['kode_barang']; ?></td>
                                                    <td><?= $key['nama_barang']; ?></td>
                                                    <td><?= $key['jenis']; ?></td>
                                                    <td><?= $key['merk_barang']; ?></td>
                                                    <td><?= $key['jumlah']; ?></td>
                                                </tr>
                                                    <?php
                                                }
                                    endforeach;
                                }  
                            } else {
                                ?>
                                <script>
                                    alert("masukan tanggal dengan benar");
                                </script>
                                <?php 
                            }
                        } else {
                            
                            $query = "SELECT id_tranc, tgl_masuk, supplier , 
                                        GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
                                        GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving GROUP BY id_tranc order by id_tranc";
$result = $this->db->query($query);
foreach ($result->result_array() as $row) :
    $tanggal = date('d F Y', strtotime($row['tgl_masuk']));
    ?>
        <tr>
            <td><?= $row['id_tranc']; ?></td>
            <td><?= $tanggal; ?></td>
            <td><?= $row['supplier']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
            foreach ($hasil as $key ) {
                ?> 
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?= $key['kode_barang']; ?></td>
                <td><?= $key['nama_barang']; ?></td>
                <td><?= $key['jenis']; ?></td>
                <td><?= $key['merk_barang']; ?></td>
                <td><?= $key['jumlah']; ?></td>
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
})
</script>