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


}

/* End of file Model_pegawai.php */
