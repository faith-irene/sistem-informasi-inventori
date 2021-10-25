<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card mt-1">
                    <div class="card-header bg-primary">
                        Data Supplier
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                    <form id="form_receiving">
                        <label for="" class="mt-2">Nama Supplier</label>
                        <input type="text" class="form-control" name="nm_supp" id="nm_supp">
                        <label for="" class="mt-2">No Kontak</label>
                        <input type="text" class="form-control" name="no_kontak" id="no_kontak" >
                        <label for="" class="mt-2"></label>
                        <input type="button" name="next" id="next" class="btn btn-primary form-control" value="Lanjut">
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-8">
                <div class="card  mt-1">
                    <div class="card-header bg-primary">
                        Data barang masuk
                    </div>
                    <div class="card-body">
                    
            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="inputPassword4">No. Invoice</label>
                <input type="text" name="no_inv" readonly class="form-control" id="no_inv">
                </div>
                <div class="form-group col-md-2">
                <label for="inputState">Jumlah</label>
                <input type="number" class="form-control" name="jumlah_brg" id="jumlah_brg">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Kode Barang</label>
                <input type="text" name="kd_brg" class="form-control" id="kd_brg" placeholder="Masukan kode barang">
                </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Tanggal</label>
                <input type="date" name="tanggal" id="tgl_brM" class="form-control" id="inputCity">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputCity">Nama Barang</label>
                <input type="text" name="nm_brg" disabled class="form-control" id="nm_brg">
                </div>
                <div class="form-group col-md-4">
                <label for="inputCity">Merk</label>
                <input type="text" name="mrk_brg" disabled class="form-control" id="mrk_brg">
                </div>
                <div class="form-group col-md-4">
                <label for="inputCity">Jenis</label>
                <input type="text" name="j_brg"  class="form-control typeahead" id="j_brg">
                </div>
            </div>
            <!-- <input type="submit" class="btn btn-primary" id="simpan" value="simpan"></input> -->
            <button type="submit" class="btn btn-primary" id="simpan">simpan</button>
        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            Tabel Barang Masuk
                        </div>
                        <div class="card-body">
                        <!-- <div class="table-responsive"> -->
                        <table cellspacing="0" width="100%" id="tabel_bm" class="table display nowrap">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th style="width: 120px;">no tranc</th>
                                    <th>tanggal</th>
                                    <th>supplier</th>
                                    <th>jenis</th>
                                    <th>kode barang</th>
                                    <th>nama barang</th>
                                    <th>merk</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
  <div id="dialog" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-edit" action="">
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Id </label>
            <input type="text" value="" class="form-control" name="kbm" id="kbm">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang </label>
            <input type="text" value="" class="form-control" name="nbm" id="nbm">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jumlah </label>
            <input type="text" value="" class="form-control" name="jbm" id="jbm">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/bootstrap4/js/') ?>bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets') ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Typehead -->
<script src="<?= base_url('assets/js/typeahead.bundle.js') ?>"></script>
<!-- Handlebars js -->
<script src="<?= base_url('assets/js/handlebars.js') ?>"></script>
<!-- Jquery Validation -->
<script src="<?= base_url('assets/js/jquery.validate.js') ?>"></script>
<script>
// autocomplete menggunakan typeahead
$(document).ready( function(){
    var sample_data = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: "<?= base_url('pegawai/fetch') ?>",
        remote: {
            url: "<?= base_url('pegawai/fetch') ?>/%QUERY",
            wildcard: '%QUERY'
        }
    });
    $("#j_brg").typeahead(null,{
        jenis: 'sample_data',
        display: 'jenis',
        source: sample_data,
        limit: 5,
        templates: {
            suggestion: Handlebars.compile('<div><strong>{{jenis}}</strong></div>')
        }
    });
//random kode fungsi
// function randomString(len, charSet) {
//     charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
//     var randomString = '';
//     for (var i = 0; i < len; i++) {
//         var randomPoz = Math.floor(Math.random() * charSet.length);
//         randomString += charSet.substring(randomPoz,randomPoz+1);
//     }
//     return randomString;
// }
function random_kode() {
    var a = Math.floor(Math.random() * 1000) ;
    var b = Math.random().toString(36).substring(2, 5) ;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = mm+dd+yyyy;
    var z = b.toUpperCase();
    return z+a+'-'+today ;
}

//jquery validate
// First, set up validator
$('#form_receiving').validate({
  debug: true,
  rules: {
    nm_supp: "required"
  },
  messages: {
    nm_supp: "Please give your project a name",
  }
});

// load 
    $("#kd_brg").prop('disabled',true);
    var kode = random_kode();
    $("#next").on('click',function(e){
        $("#kd_brg").removeAttr('disabled');
        var input_supplier = $("#nm_supp");
        var teks = $("#next").val();
        if (teks == "Lanjut" && input_supplier.valid() ) {
            $("#kd_brg").focus();
            $("#next").removeClass('btn-primary');
            $("#next").addClass('btn-danger');
            $("#next").val("Batal");
            $("#no_inv").val(kode);
            document.getElementById('tgl_brM').valueAsDate = new Date();
            
        } else {
            $("#next").addClass('btn-primary');
            $("#next").removeClass('btn-danger');
            $("#next").val("Lanjut");
            $("#no_inv").val("");
            $("#kd_brg").prop("disabled",true);
            $("#tgl_brM").val('');
        }
        
    })

    
});
</script>