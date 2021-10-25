<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-1">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="card-title mt-2">Tabel Barang</h3>
                            </div>
                        </div>
                        <div class="card-body" style="width: 100%;">
                        <button id="tombol_modal" data-toggle="modal" class="btn btn-sm btn-primary mb-1"><i class="fa fa-plus-circle"></i> TAMBAH DATA</button>
            <table id="tabel_barang"   class="table compact table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>/</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Merk Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formUsable">
       <div class="form-group">
            <label for="">Kode Barang</label>
            <input type="hidden" class="form-control" name="id_brg" id="id_brg">
            <input type="text" class="form-control" id="kode_barang" name="kode_barang">
        </div>
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
        </div>
        <div class="form-group">
            <label for="">Merk Barang</label>
            <select class="form-control overflow-auto" id="merk_barang" name="merk_barang">
            <option value="" selected> -- PILIH BRAND -- </option>
            <?php foreach ($merk as $m) : ?>
            <option value="<?= $m['merk']; ?>"><?= $m['merk']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Satuan</label>
            <select class="form-control" id="satuan_barang" name="satuan_barang">
            <option value="" selected> -- Tentukan satuan barang -- </option>
            <?php foreach ($jenis as $j) : ?>
            <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control" id="harga_barang" name="harga_barang">
        </div>
        <!-- <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" disabled class="form-control" id="jumlah_barang" name="jumlah_barang">
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button> 
      </div>
      </form>
    </div>
  </div>
</div>