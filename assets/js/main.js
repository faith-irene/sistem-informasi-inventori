/*jshint esversion: 6 */

$(document).ready( function(){
var user_id , option;
option = 4;
var tabel_barang = $("#tabel_barang").DataTable({
    "ajax":{
        "url": base_url,
        "method": "post",
        "data": {option: option},
        "dataSrc": ""
    },
    "columns": [
        {
            "data": null,
            "defaultContent": ''
        },
        {"data": "kode_barang"},
        {"data": "nama_barang"},
        {"data": "merk_barang"},
        {"data": "satuan"},
        {"data": "harga"},
        {"data": "jumlah"},
        {"defaultContent":"<div class='text-center'><div class='btn-group' ><button class='btn btn-primary btn-sm btnEdit' ><i class='fa fa-edit'>Edit</i></button><button class='btn btn-danger btn-sm btnDelete'><i class='fa fa-trash'>Hapus</i></button></div></div>"}
    ],
    "select" : { 'style': 'multi'},
    "order" : [[1, 'asc']],
    "columnDefs" : [
        {
            'targets' : 0,
            'checkboxes' : { 'selectRow' : true}
        }
    ] 
});

var fila ;
$("#formUsable").submit( function(e){
    e.preventDefault();
    kode_barang = $.trim($("#kode_barang").val());
    nama_barang = $.trim($("#nama_barang").val());
    merk_barang = $.trim($("#merk_barang").val());
    satuan_barang = $.trim($("#satuan_barang").val());
    harga_barang = $.trim($("#harga_barang").val());
    jumlah_barang = $.trim($("#jumlah_barang").val());
    arai = [kode_barang,nama_barang,merk_barang,satuan_barang,harga_barang,option];
    console.log(arai);
    $.ajax({
        url: url+'pegawai/crud_barang',
        type: "POST",
        dataType: "JSON",
        data: {
            kode_barang : kode_barang, 
            nama_barang : nama_barang,
            merk_barang : merk_barang,
            satuan_barang : satuan_barang,
            harga_barang : harga_barang,
            option: option
        },
        success: function(data){
            
        }
    });
    $("#modalCrud").modal('hide');
    tabel_barang.ajax.reload(null,false);
    
    
});

$("#tombol_modal").click( function(){
    $("#formUsable").trigger("reset");
    option = 1;
    kode_barang = null;
    $("#kode_barang").prop('disabled',false);
    //jalankan ajax generate kode
    $.ajax({
        url : add_url,
        dataType: "text",
        success: function(data){
            $("#kode_barang").val(data);
        }
    });
    $(".modal-title").text("Tambah Data");
    $("#modalCrud").modal("show");
});


$(document).on("click",".btnEdit", function(){
    option = 2;
    fila = $(this).closest('tr');
    kode_barang = fila.find('td:eq(1)').text();
    nama_barang = fila.find('td:eq(2)').text();
    merk_barang = fila.find('td:eq(3)').text();
    satuan_barang = fila.find('td:eq(4)').text();
    harga_barang = fila.find('td:eq(5)').text();
    jumlah_barang = fila.find('td:eq(6)').text();
    $("#kode_barang").val(kode_barang);
    $("#nama_barang").val(nama_barang);
    $("#merk_barang").val(merk_barang);
    $("#satuan_barang").val(satuan_barang);
    $("#harga_barang").val(harga_barang);
    // $("#jumlah_barang").val(jumlah_barang);
    $(".modal-title").text("Edit data barang");
    $("#modalCrud").modal("show");
    $("#kode_barang").prop('disabled',true);
    // $('#modalCrud').on('shown.bs.modal', function (e) {
    //     $('#modalCrud input[type="text"]')[0].select();
    //   });
});

$(document).on("click",".btnDelete", function(){
fila = $(this);
kode_barang = $(this).closest('tr').find('td:eq(1)').text();
option = 3;
var request = confirm("Yakin hapus data "+kode_barang+" ini ?");
if (request) {
    $.ajax({
        url: base_url,
        type: "POST",
        dataType: "JSON",
        data: {option: option, kode_barang: kode_barang},
        success: function(){
            
        }
    });
    tabel_barang.row(fila.parents('tr')).remove().draw();
}

});

/////BATAS/////
$("#kd_brg").on("keyup", function(){
    var id = $(this).val();
    if ( this.value.length === 7 ) {
        $.ajax({
            data : { id : id  },
            method: 'POST',
            url: show_url,
            dataType: "JSON",
            success: function(data){
                console.log(data);
                $("#nm_brg").val(data.nama_barang);
                $("#mrk_brg").val(data.merk_barang);
            }
        });
    } else {

    }
});

//BATAS//
var pilihan = 1;
var id_user;
var doT;
tabel_masuk = $("#tabel_bm").DataTable({
    "ajax": {
        url: url+"pegawai/receiving_crud",
        method: "POST",
        data: {pilihan: pilihan},
        dataSrc: ""
    },
    "columns":[
        {"data": "id_tranc"},
        {"data": "tgl_masuk"},
        {"data": "supplier"},
        {"data": "jenis"},
        {"data": "kode_barang"},
        {"data": "nama_barang"},
        {"data": "merk_barang"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='tombol-edit btn btn-sm btn-primary'><i class='fa fa-edit'></i>Edit</button><button class='btn btn-sm btn-danger tombol-hapus'><i class='fa-trash fa'></i>Hapus</button></button></div></div>"}
    ],
    "order": [[0,'asc']],
    "scrollY": "300px",
    "scrollX": true,
    "scrollCollapse": true
}); 



$("#form_receiving").submit( function(e){
e.preventDefault();
nama_supp = $("#nm_supp").val();
no_kontak = $("#no_kontak").val();
no_inv = $("#no_inv").val();
jumlah = $("#jumlah_brg").val();
tanggal = $("#tgl_brM").val();
kode_barang = $("#kd_brg").val();
nama_barang = $("#nm_brg").val();
merk_barang = $("#mrk_brg").val();
jenis = $("#j_brg").val();
pilihan = 2;
$.ajax({
    url: url+'pegawai/receiving_crud',
    type: "POST",
    dataType: "JSON",
    data: {
        pilihan: pilihan,
        nama_supp: nama_supp,
        no_kontak: no_kontak,
        no_inv: no_inv,
        jumlah: jumlah,
        tanggal: tanggal,
        kode_barang: kode_barang,
        nama_barang: nama_barang,
        merk_barang: merk_barang,
        jenis: jenis
    },
    success: function(_data){
        tabel_masuk.ajax.reload(null,false);
    }
});
});

$(document).on('click','.tombol-hapus', function(){
    
doT = $(this);
no_inv = $(this).closest("tr").find("td:eq(0)").text();
pilihan = 3;
var request = confirm("Yakin?");
if (request) {
    $.ajax({
        url: url+'pegawai/receiving_crud',
        type: "POST",
        dataType: "JSON",
        data: { no_inv : no_inv , pilihan: pilihan},
        success:  function(){
            tabel_masuk.row(doT.parents('tr').remove().draw()).reload(null,false);
            
        }
    });
}

});

$(document).on('click','.tombol-edit', function(){
    doT = $(this);
    $("#modal-edit").modal('show');
    no_ins = $(this).closest("tr").find("td:eq(0)").text();
    $.ajax({
        url: url+"pegawai/show_transaksi",
        type: "POST",
        dataType: "JSON",
        data: { id : no_ins , table : 'tbl_receiving' },
        success: function(data){
            console.log(data);
            $("#kbm").val(data.id_tranc);
            $("#nbm").val(data.nama_barang);
            $("#jbm").val(data.jumlah); //harus join tabel tbl_receivng ke tbl_barang *pakai kode_barang
        }
    });
    
});

$("#form-edit").submit( function(e) {
e.preventDefault();
//lanjutkan disini
});



});