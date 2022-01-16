<style type="text/css">
        table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
        table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
        h1 {color: #000033}
        h2 {color: #000055}
        h3 {color: #000077}
</style>
<div class="container-fluid">
<table class="tabel-header" id="tabel-header">
<tr>
<th rowspan="3"><img src="" style="width:120px;height:100px" /></th>
<td align="center" style="width: 800px;"><font style="font-size: 18px"><br><b>SAHIL AUTO CAR WASH</b></font>
<br><br>Supply & Service Auto Equipment | Cuci Steam - Salon Mobil - Spare Part - Accessories
<br><br>Jalan Demang Lebar Daun No. 69, Palembang | Telp: (0711) 367769</td>
</tr>
</table>
<hr><br><br>
<style type="text/css">
        .table-report {
        border-collapse: collapse;
        }
        .table-report th, .table-report td {
        padding: 5px 5px;
        border: 1px solid #000;
        }
</style>
<table id="tabel-report-in" width="100%" style="margin-top: 5px; text-align:center; " class="table table-report">
                                    <thead>
                                    <tr>
                                        <td colspan="3">Kode Transaksi</td>
                                        <td>Kode Barang</td>
                                        <td>Nama Barang</td>
                                        <td>Jenis</td>
                                        <td>Merk</td>
                                        <td>Jumlah</td>
                                    </tr>
                                    </thead>
                                    <tbody id="bodi-tabel-in">
                                    <?php
                                     if (empty($kueri)) {
                                        echo "<tr><td>Tidak ada Data</td></tr>";
                                     } else {
                                         foreach ($kueri as $row) :
                                             $tgl = date('d F Y', strtotime($row['tgl_masuk']));
                                             ?>
                                             <tr>
                                                <td colspan="3" ><?= $row['id_tranc']; ?></td>
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
                                            foreach ($hasil as $key) {
                                                ?>
                                                <tr>
                                                    <td colspan="3"></td>
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