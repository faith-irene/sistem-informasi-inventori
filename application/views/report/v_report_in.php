<h3>TES PRsINT</h3>
<div class="container-fluid">
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
                                        $query = "SELECT id_tranc, tgl_masuk, supplier , 
                                        GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
                                        GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving GROUP BY id_tranc order by id_tranc";
                                        $result = $this->db->query($query)->result_array();
                                        // echo "<pre>";
                                        // var_dump($this->db->query($query)->result());
                                        // echo "</pre>";
                                        foreach ($result as $row) :
                                            $tanggal = date('d F Y',strtotime($row['tgl_masuk']));
                                     ?>
                                        <tr>
                                            <td><?= $row['id_tranc']; ?></td>
                                            <td><?= $tanggal; ?></td>
                                            <td><?= $row['supplier'] ?></td>
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

                                        // echo "<pre>";
                                        // var_dump($nama);
                                        // print_r($kode);
                                        // echo "</pre>";
                                    $hasil = array_map(function($a,$b,$c,$d,$e){
                                        return array_combine(['jenis','kode_barang','nama_barang','merk_barang','jumlah'],[$a,$b,$c,$d,$e]);
                                    },$jenis,$kode,$nama,$merk,$jumlah);

                                    foreach ($hasil as $key ) { ?>
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
                                     ?>
                                    </tbody>
                                    </table>
</div>