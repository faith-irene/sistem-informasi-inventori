<?php

use Mpdf\Mpdf;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pegawai','pegawai');
        
        
    }
    

    public function index()
    {
        $data['title'] = "Halaman | Pegawai";
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function data_jenis()
    {
        $data['title'] = " Halaman | Tabel Jenis";
        $data['jenis'] = $this->db->get('tbl_jenis')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/categori', $data);
        $this->load->view('templates/footer', $data);
    }

    public function data_merk()
    {
        $data['title'] = " Halaman | Tabel Jenis";
        $data['merk'] = $this->db->get('tbl_merk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/merk', $data);
        $this->load->view('templates/footer', $data);
    }

    public function data_satuan()
    {
        $data['title'] = " Halaman | Tabel Jenis";
        $data['satuan'] = $this->db->get('tbl_satuan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/satuan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_jenis(){
        $jenis = $this->input->post('jenis');
        $data = ['jenis' => $jenis];
        $table = "tbl_jenis";
        $this->pegawai->add($table,$data);
        redirect('data_jenis','refresh');
        
    }

    public function add_merk()
    {
        $jenis = $this->input->post('merk');
        $data = ['merk' => $jenis];
        $table = "tbl_merk";
        $this->pegawai->add($table,$data);
        redirect('data_merk');
    }

    public function add_satuan()
    {
        # code...
    }

    public function edit_jenis()
    {
        // $jenis = $this->input->post('Ejenis');
        // $id = $this->input->post('id_jenis');
        $jenis = $_POST['jenis'];
        $id = $_POST['id'];
        $this->db->set('jenis',$jenis);
        $this->db->where('id', $id);
        $this->db->update('tbl_jenis');
        redirect('data_jenis');
    }

    public function edit_merk()
    {
        $merk = $this->input->post('eMerk');
        $id = $this->input->post('id_merk');
        $this->db->set('merk',$merk);
        $this->db->where('id', $id);
        $this->db->update('tbl_merk');
        redirect('data_merk','refresh');
    }

    public function edit_satuan()
    {
        
    }

    public function show()
    {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $queryData = $this->db->get_where($table,['id' => $id])->row();
        echo json_encode($queryData);

    }

    public function show_transaksi()
    {
        $id = $this->input->post('id');
        $table = $this->input->post('table');
        $queryData = $this->db->get_where($table,['id_tranc' => $id])->row();
        echo json_encode($queryData);
    }

    public function show_barang()
    {
        $id = $this->input->post('id');
        $queryData = $this->db->get_where('tbl_barang',['kode_barang' => $id])->row();
        echo json_encode($queryData);

    }

    public function delete_jenis($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_jenis');
        redirect('data_jenis','refresh');
    }

    public function delete_merk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_merk');
        redirect('data_merk');
    }

    public function delete_satuan($id)
    {
        
    }

    public function data_barang()
    {
        $data['title'] = " Halaman | Tabel Barang";
        $data['barang'] = $this->db->get('tbl_barang')->result_array();
        $data['jenis'] = $this->db->get('tbl_jenis')->result_array();
        $data['merk'] = $this->db->get('tbl_merk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/barang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function crud_barang()
    {
        $kode_barang = $this->input->post("kode_barang");
        $nama_barang = $this->input->post("nama_barang");
        $merk_barang = $this->input->post("merk_barang");
        $satuan_barang = $this->input->post("satuan_barang");
        $harga_barang = $this->input->post("harga_barang");
        // $jumlah_barang = $this->input->post("jumlah_barang");
        $option = $this->input->post("option");

        switch ($option) {
            case 1 :
                $data = [
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'merk_barang' => $merk_barang,
                    'satuan' => $satuan_barang,
                    'harga' => $harga_barang,
                    'jumlah' => 0
                ];
                print_r($data);
                $this->db->insert('tbl_barang', $data);
                break;
            case 2 :
                $query = "UPDATE tbl_barang set nama_barang='$nama_barang', merk_barang='$merk_barang', satuan='$satuan_barang', harga='$harga_barang' where kode_barang='$kode_barang' ";
                $this->db->query($query);
                break;
            case 3 :
                $this->db->where('kode_barang', $kode_barang);
                $this->db->delete('tbl_barang');
                break;
            case 4 :
               $query =  $this->db->get('tbl_barang');
               $data = $query->result_array();
                break;
            default:
                # code...
                break;
        }
        print json_encode($data);
    }

    public function get_kodeBarang()
    {
        $queryKb = $this->db->query("SELECT max(kode_barang) as code_max from tbl_barang ")->result_array();
        foreach ($queryKb as $kodex) {
            $kode_barang = $kodex['code_max'];
            $urut = (int) substr($kode_barang,3,4);
            $urut++;
        }
        $huruf = "BRG";
        $newkode = $huruf.sprintf("%03s",$urut);
        echo $newkode;
    }

    

   public function fetch()
   {
       $data = $this->uri->segment(3);
       echo $this->pegawai->fetch_data($data);
   }

    public function receiving()
    {
        $data['title'] = " Halaman | Barang Masuk";
        $data['barang'] = $this->db->get('tbl_barang')->result_array();
        $data['jenis'] = $this->db->get('tbl_jenis')->result_array();
        $data['merk'] = $this->db->get('tbl_merk')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/receiving', $data);
        $this->load->view('templates/footer', $data);
    }

    public function receiving_crud()
    {
        $nm_supp = $this->input->post('nama_supp');
        $no_kontak = $this->input->post('no_kontak');
        $no_inv = $this->input->post('no_inv');
        $jumlah = $this->input->post('jumlah');
        $kode_barang = $this->input->post('kode_barang');
        $tanggal = $this->input->post('tanggal');
        $tanggal = date('Y-m-d H:i:s');
        $nama_barang = $this->input->post('nama_barang');
        $merk_barang = $this->input->post('merk_barang');
        $jenis = $this->input->post('jenis');
        $pilihan = $this->input->post('pilihan');

        switch ($pilihan) {
            case 1:
                $query = $this->db->get('tbl_receiving');
                $data = $query->result_array();
            break;
            case 2:
                $data = [
                    'id_tranc' => $no_inv,
                    'tgl_masuk' => $tanggal,
                    'supplier' => $nm_supp,
                    'jenis' => $jenis,
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'merk_barang' => $merk_barang,
                    'jumlah' => $jumlah
                ];
                $this->db->insert('tbl_receiving', $data);
            break;
            case 3:
                $this->db->where('id_tranc', $no_inv);
                $this->db->delete('tbl_receiving');
            break;
            
            default:
            break;
        }
        echo json_encode($data);
    }

    public function issue()
    {
        $data['title'] = " Halaman | Barang Keluar";
        $data['barang'] = $this->db->get('tbl_barang')->result_array();
        $data['jenis'] = $this->db->get('tbl_jenis')->result_array();
        $data['merk'] = $this->db->get('tbl_merk')->result_array();
        // $query = "SELECT * from tbl_issuing";
        // $data['brg_k'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/issue', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function gen_kode(){
        echo $this->pegawai->gen_kode(10);
    }

    public function add_cart()
    {
        $id = $this->input->post('kode_issue');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $data = [
            'id' => $id,
            'tanggal' => $tanggal,
            'jumlah' => $jumlah
        ];

        $this->session->set_userdata($data);
        
        
        $cart = array(
            'id'      => $this->input->post('kode_barang'),
            'qty'     => $this->input->post('jumlah'),
            'price'   => '19.56',
            'name'    => $this->input->post('nama_barang')
        );
        
        $this->cart->insert($cart);    
        // redirect('pegawai/issue','refresh');
        echo $this->show_cart();
        
    }

    function show_cart(){
        $output = '';
        $no = 0;
        
        foreach ($this->cart->contents() as $item) :
            $no++;
            $output .='<tr>
                <td>'.$item['id'].'</td>
                <td>'.$item['name'].'</td>
                <td>'.$item['qty'].'</td>
                <td>
                    <a data-id="'.$item['rowid'].'" class="remove-item btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                </td>
            </tr>';
        endforeach;
        if (!empty($this->cart->contents())) {
            $output .= "<script>$('#simpan-cart').removeAttr('disabled'); </script>";
        } else {
          $output .= "<script>$('#simpan-cart').prop('disabled',true);</script>";
        }
        return $output;
    }

    function load_cart(){
        echo $this->show_cart();
    }

    public function remove_cart(){
        $data = [
            'rowid' => $this->input->post('rowid'),
            'qty' => 0
        ];
        $this->cart->update($data);
        echo $this->show_cart();
    }

    public function proses()
    {
        //lanjutkan disini prosesnya. 
        $code = $this->input->post('code');
        $date = $this->input->post('date'); 
        $cart = $this->cart->contents();

        if ($cart) {
            foreach ( $cart as $item) :
                $data = [
                    'id_tranc' => $code,
                    'tgl_keluar' => $date,
                    'kode_barang' => $item['id'],
                    'nama_barang' => $item['name'],
                    'jumlah' => $item['qty']
            ];
            $this->db->insert('tbl_issuing',$data);
            endforeach;
        }
        $this->cart->destroy();
        redirect('pegawai/issue');
    }

    public function laporan_barang_in()
    {
        $data['title'] = "Halaman | Laporan";
        $query = "SELECT id_tranc, tgl_masuk, supplier , 
                    GROUP_CONCAT(jenis) as j_brg, GROUP_CONCAT(kode_barang) as kd_brg,
                    GROUP_CONCAT(nama_barang) as nm_brg, GROUP_CONCAT(merk_barang) as mr_brg, 
                    GROUP_CONCAT(jumlah) as jml FROM tbl_receiving GROUP BY id_tranc order by id_tranc";
        $data['result'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/laporan_masuk', $data);
        $this->load->view('templates/footer', $data);

    }

    public function laporan_barang_out()
    {
        
    }

    public function tabel_fetch()
    {
        $tabel = $this->input->post('tabel_name');
        $cari = $this->input->post('cari');
        $tanggal_awal = $this->input->post('awal_date_cari');
        $tanggal_akhir = $this->input->post('akhir_date_cari');
        $query = "SELECT * from $tabel ";

        
        if ($cari == 'yes') {
            $query .= "WHERE tgl_masuk BETWEEN $tanggal_awal AND $tanggal_akhir ";
        } else {
            $query .="ORDER BY id ASC";
        }
        //lanjutakan ini
        $result = $this->db->query($query)->result_array();
        $output = "";
        foreach ($result as $row) {
            
        }
    }

    public function proses_laporan()
    {
        
        $mpdf = new \Mpdf\Mpdf(['tempDir' => 'vendor']);
        $data = $this->load->view('report/v_report_in',[],true);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

// public function test()
// {
//     $kode_barang = $this->input->post("kode_barang");
//         $nama_barang = $this->input->post("nama_barang");
//         $merk_barang = $this->input->post("merk_barang");
//         $satuan_barang = $this->input->post("satuan_barang");
//         $harga_barang = $this->input->post("harga_barang");
//         $jumlah_barang = $this->input->post("jumlah_barang");
//         $option = $this->input->post("option");

//         $data = [ $kode_barang,$nama_barang ];
//         var_dump($data);
//         die;
// }
    

}

/* End of file Controllername.php */
