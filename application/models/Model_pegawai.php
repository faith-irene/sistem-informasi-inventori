<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pegawai extends CI_Model {

    public function add($table,$data)
    {
        $this->db->insert($table, $data);
        
    }

 function fetch_data($data)
    {
        $this->db->like('jenis',$data);
        $query = $this->db->get('tbl_jenis');
        if ($query->num_rows() > 0 ) {
            foreach ($query->result_array() as $row) {
                $output[] = array('jenis' => $row['jenis'] ); ;
            }
            echo json_encode($output);
        }
    }


function gen_kode($panjang){
    $code = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ".time();
    $str = '';
    for($i = 0; $i < $panjang; $i++){
        $pos = rand(0,strlen($code)-1);
        $str .= $code[$pos];
    }
    return 'WOW'.'-'.date('Y').'/'.date('m').'/'.$str;
}

public function get_all()
{
    $query = "SELECT id_tranc, tgl_masuk, supplier , 
    GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
    GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving GROUP BY id_tranc order by tgl_masuk";
    $result = $this->db->query($query)->result_array();
    return $result;
}

public function get_by_date($tgl1,$tgl2)
{
    // $tgl_awal = $tgl1;
    // $tgl_akhir = $tgl2;
    $query = "SELECT id_tranc, tgl_masuk, supplier , 
    GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
    GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, GROUP_CONCAT(jumlah) as jml FROM tbl_receiving WHERE tgl_masuk BETWEEN  '$tgl1'  AND '$tgl2' GROUP BY id_tranc order by tgl_masuk";
    $result = $this->db->query($query)->result_array();
    return $result;
}


}

/* End of file Model_pegawai.php */
