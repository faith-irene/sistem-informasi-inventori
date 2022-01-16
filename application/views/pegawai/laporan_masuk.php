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
                                    .red {color:#FF0000;}
                            </style>
                            <div class="box d-flex align-content-center flex-wrap">
                                <form action="<?= base_url('report_in') ?>" method="get" class="form-inline " id="cari-report-in">
                                        <label class="small ml-2" for="">Tanggal masuk</label>

                                        <input type="date" value="<?= @$_GET['tgl_awal'] ?>" name="tgl_awal" id="tanggal1" class="ml-2 mr-2 form-control form-control-sm">

                                        <label class="small" for="">Tanggal keluar</label>

                                        <input type="date"  value="<?= @$_GET['tgl_akhir'] ?>" name="tgl_akhir" id="tanggal2" class="form-control ml-2 mr-2 form-control-sm">
                                        <input type="submit" id="cari-data-in" name="cari" class="mx-2 btn custom-btn-1 btn-sm right" value="Cari">
                                        <input type="button" value="Batal" class="btn btn-sm custom-btn-2">
                                        <?php 
                                    if (isset($_GET['cari'])) {
                                        echo "<a href='".base_url('report_in') ."' class='btn btn-sm custom-btn-2' name='batal' id='batal' value='batal' >HAPUS</a>";
                                    }
                                    ?>   
                                        <button type="button" class="btn btn-primary btn-sm ml-5" name="print" id="print"><span class="fa fa-print"></span> Print</button>
                                        <a href="<?= $url_cetak; ?>" target="_blank">KLIK</a>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="example-tebel" class="table">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Tanggal Masuk</th>
                <th>Supplier</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody id="example-bodi">
                
        </tbody>
    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!--  section tabel bekasan -->

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

    // $("#cari-data-in").on('click', function(){
    //     var awal_date_cari = $("#tanggal1").val();
    //     var akhir_date_cari = $("#tanggal2").val();
    //     if (awal_date_cari != '' && akhir_date_cari != '') {
    //         $("#bodi-tabel-in").DataTable().destroy();
    //         fetch_data('yes',awal_date_cari,akhir_date_cari);
    //     } else {
    //         alert("Tanggal Harus diisi");
    //     }
    // })
// });

$(document).ready( function(){
    
    
    //tombol print
    $("#print").on('click', function(){
     
    });

    //tombol batal
    $("#batal").click( function(){

    })

    var date1 = $("#tanggal1").val();
    var date2 = $("#tanggal2").val();
    var result = [];
    var tabel_laporan_masuk = $("#example-tebel").DataTable({
        "ajax": {
            "url": "<?= base_url('pegawai/view_ri') ?>",
            "method": "post",
            "dataType": "JSON",
            "data": { date1 : date1 , date2 : date2},
            "dataSrc": ""
        },
        "initComplete": function(settings,json){
            // console.dir(json);
            // console.log(json);
            var html = '';
            var newOb = {};
            var ora = [];
            for (i =0; i < json.length; i++){
                var nama_barang = json[i].nm_brg.split(','); //jadi array
                var kode_barang = json[i].kd_brg.split(','); //jadi array
                var jumlah_barang = json[i].jml.split(','); //jadi array
                var id = json[i].id_tranc;
                const arr = ['kode_barang', 'nama_barang', 'jumlah'];
               
                // map
                const maap = new Map([
                    ['id',id],
                    ['kode_barang',kode_barang],
                    ['nama_barang',nama_barang],
                    ['jumlah',jumlah_barang]
                ]);
                // array
                const arai = Array.from(maap, function(item){
                    return {
                        key : item[0] , value : item[1]
                    }
                })

                const arei = Array.from(maap);
                // Object.entries(arei).forEach(([key, value]) => console.log(nama_barang));
                
                let result = [];
                kode_barang.forEach( (a,b,c) => {
                   let kode = a;
                   let nama = nama_barang[b];
                   let jml = jumlah_barang[b];
                   let entry = { kode_barang : kode , nama_barang : nama , jumlah_barang: jml }
                   result.push(entry);
                })
                
                
                if (json[i].id_tranc == maap.get('id') ){
                    //kasih perulangan disini
                    
                    html += '<tr>'+
                    '<td>'+json[i].id_tranc+'</td>'+
                    '<td>'+json[i].tgl_masuk+'</td>'+
                    '<td>'+json[i].supplier+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'
                    +'</tr>';
                    
                    //kasih perulangan arai
                    result.forEach( (a,i,c) => {
                        html +='<tr>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+kode_barang[i]+'</td>'+
                    '<td>'+nama_barang[i]+'</td>'+
                    '<td>'+jumlah_barang[i]+'</td>'+
                    '<td>'+''+'</td>'+
                    '<td>'+''+'</td>'
                    +'</tr>';
                })
                }
                $("#example-bodi").html(html);
               }
            //    for ( j =0; j < result.length; j++){
            //        console.dir(result[0]);
            //    }
               
        },
        "columns": [
            {"data": "id_tranc"} ,
            {"data": "tgl_masuk" },
            {"data": "supplier" },
            {"data": "kd_brg" },
            {"data": "nm_brg" },
            {"data": "mr_brg" },
            {"data": "j_brg" },
            {"data": "jml" }
        ],
        'columnDefs': [
            {
                'targets': 0,
                'visible': true
            }
        ],
        'displayLength': 100,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            // api.column(0, {page:'current'} ).data().each( function ( group, i ) {
            //     if ( last !== group ) {
            //         $(rows).eq( i ).before(
            //             '<tr class="group"><td colspan="5">'+'Kode Transaksi : '+group+'</td></tr>'
            //         );
 
            //         last = group;
            //     }
            // } );
            // var datas = api.rows( {page:'current'} ).data();   
            
        }
    });

    ////////////////AJAX LOAD///////////////////////////////////

    tampil_tabel_tes();
    function tampil_tabel_tes(){
        var date1 = $("#tanggal1").val();
        var date2 = $("#tanggal2").val();
        $.ajax({
            type: "post",
            dataType: "JSON",
            url: "<?= base_url('pegawai/view_ri') ?>",
            data: { date1 : date1, date2 : date2},
            success: function(data){
                var html = '';
                var i;
                for (i=0; i < data.length; i++){
                    var arr = data[i].kd_brg.split(',');
                    var ar2 = data[i].nm_brg.split(',');
                    
                    html += '<tr>'+
                        '<td>'+data[i].id_tranc+'</td>'+
                        '<td>'+data[i].tgl_masuk+'</td>'+
                        '<td>'+data[i].supplier+'</td>'+
                        '<td>'+' '+'</td>'+
                        '<td>'+' '+'</td>'+
                    '</tr>';
                   
                    html += '<tr>'+
                    '<td>'+'oooo'+'</td>'+
                    '<td>'+'oooo'+'</td>'+
                    '<td>'+'oooo'+'</td>'+
                    '<td>'+arr+'</td>'+
                    '<td>'+ar2+'</td>'+
                    '</tr>'
                }
                
                $("#tabel-tes").html(html);
            }
        })
    }
    
})
</script>