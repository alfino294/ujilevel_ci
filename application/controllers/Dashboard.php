<?php 




class Dashboard extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('model_sistem');
    }

    public function index(){
        $this->load->view('base'); 
    }



    public function login(){
        $this->load->view('masuk');

    }

    public function register(){
        $this->load->view('daftar');
    }

    public function tmplhome(){
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'user') {
            $data['masakan'] = $this->model_sistem->get_makanan();
            $this->load->view('user/home', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function tmplkeranjang()
    {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'user') {
            $data['order'] = $this->model_sistem->get_orderan();
            $this->load->view('user/keranjang', $data);
        } else {
            header("Location:".base_url().'');
        }
    }


    public function simpan_data(){
        $this->model_sistem->simpan_db();
    }

    public function homeadmin(){
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $data['order'] = $this->model_sistem->get_orderan();
            $this->load->view('admin/home_admin', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

  

 


  
    

    public function logout(){
        $this->session->sess_destroy();
        redirect('');
    }


    function check_login(){
        $username = $this->input->post('Username');
        $password = $this->input->post('Password');

        $account = array(
            'Username' => $username,
            'Password' => $password
        );

        $check = $this->model_sistem->login_database($account)->num_rows();
        if ($check > 0) {
            $role = $this->model_sistem->login_database($account)->row(0)->level;
            if ($role == 'admin') {
                $current_role = $this->model_sistem->login_database($account)->row(0)->level;
                $current_id = $this->model_sistem->login_database($account)->row(0)->id_petugas;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => $current_role,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'dashboard/homeadmin');
                } else {
                    header("Location:".base_url().'Welcome/index');
                }
            } else {
                $current_id = $this->model_sistem->login_database($account)->row(0)->nik;
                $data_session = array(
                    'id' => $current_id,
                    'username' => $username,
                    'role' => 'user',
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:".base_url().'dashboard/tmplhome');
                } else {
                    header("Location:".base_url().'');
                }
            }
        } else {
            echo 'login gagal';
        }
    }


    public function daftarmakanan() {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $table = 'masakan';
            $data['masakan'] = $this->model_sistem->readTable($table);
            $this->load->view('admin/daftar_masakan', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function datatransaksi() {
        if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
            $table = 'transaksi';
            $join = 'order.id_order = transaksi.id_order    ';
            $data['transaksi'] = $this->model_sistem->readJoinTable($table, $join);
            $this->load->view('admin/data_transaksi', $data);
        } else {
            header("Location:".base_url().'');
        }
    }

    public function inputmakanan(){
       
            if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 'admin') {
                $this->load->view('admin/input_makanan');
            } else {
                header("Location:".base_url().'');
            }
      
    }

    public function insert_makanan()
    {
        $this->model_sistem->save_makanan();
    }

    public function update_makanan()
    {
        $this->model_sistem->updatemakanan();
    }

    public function delete_makanan()
    {
        $this->model_sistem->deletemakanan();
    }

    public function inputOrder()
    {
       
        $tableorder = 'order';
        $tabledetailorder = 'detail_order';

        $idproduct = $_POST['product_id'];
        $totalprice = $_POST['total_price'];
        $qtyproduct = $_POST['product_qty'];


       
        $dataorder = array(
            'id_user' => '1',
            'keterangan' => 'tidak ada keterangan',
            'status_order' => 'menunggu',
            'total_bayar' => $totalprice,
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_sistem->insertTable($tableorder, $dataorder);

        $whereorder = array(
            'id_user' => '1', 
            'status_order' => 'menunggu',
        );

        $idorder = $this->model_sistem->readColumnTable($tableorder, $whereorder)->id_order;

        $datadetailorder = array();
        $index = 0;
        foreach ($idproduct as $productid) {
            array_push($datadetailorder, array(
                'id_order' => $idorder,
                'id_masakan' => $productid,
                'keterangan' => 'tidak ada keterangan',
                'status_order' => 'menunggu',
            ));
            $index++;
        }

        $this->model_sistem->insertBatchTable($tabledetailorder, $datadetailorder);

        header("Location:".base_url().'dashboard/tmplhome');
    }

    public function insertTransact()
    {
        $tabletransact = 'transaksi';
        $tableorder = 'order';
        $orderid = $this->input->post('order_id');

        $whereorder = array('id_order' => $orderid, );
        $dataorder = array('status_order' => 'dibayar', );

        $this->model_sistem->updateTable($tableorder, $dataorder, $whereorder);

        $datatransact = array(
            'id_user' => '1',
            'id_order' => $orderid,
            'total_bayar' => $this->input->post('total_price'),
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_sistem->insertTable($tabletransact, $datatransact);
        header("Location:".base_url().'dashboard/tmplkeranjang');
    }

    public function detailTransaction()
    {
        $id = $this->input->post('id');
        if(isset($id) and !empty($id)){

            $tabletransact = 'transaksi';
            $wheretransact = array('id_transaksi' => $id,);

            $iduser = $this->model_sistem->readColumnTable($tabletransact, $wheretransact)->id_user;
            $idorder = $this->model_sistem->readColumnTable($tabletransact, $wheretransact)->id_order;
            $date = $this->model_sistem->readColumnTable($tabletransact, $wheretransact)->tanggal;
            $totalprice = $this->model_sistem->readColumnTable($tabletransact, $wheretransact)->total_bayar;

            $tablecustomer = 'user';
            $wherecustomer = array('id_user' => $iduser,);

            $namauser = $this->model_sistem->readColumnTable($tablecustomer, $wherecustomer)->nama_user;

            $tableorder = 'order';
            $whereorder = array('id_order' => $idorder,);

            $code = $this->model_sistem->readColumnTable($tableorder, $whereorder)->id_order;

            $output = '
                    <p class="font-weight-bold">Nama Customer :</p>
                    <div class="text-justify">'.$namauser.'</div>
                    <br>
                    <p class="font-weight-bold">Kode Order :</p>
                    <div class="text-justify">'.$code.'</div>
                    <br>
                    <p class="font-weight-bold">Tanggal Order :</p>
                    <div class="text-justify">'.$date.'</div>
                    <br>
                    <p class="font-weight-bold">Total Pembayaran :</p>
                    <div class="text-justify">'.$totalprice.'</div>
                    ';  
            echo $output;
        }
        else {
         echo 'Tidak ada transaksi';
        }
    }

    public function exportPdfOrder()
    {
        $data['order'] = $this->model_sistem->readTable('order');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-order.pdf";
		$this->pdf->load_view('preview/preview_order', $data);
    }

    public function exportPdfTransaksi()
    {
        $data['transaksi'] = $this->model_sistem->readTable('transaksi');
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-order.pdf";
		$this->pdf->load_view('preview/preview_transaksi', $data);
    }


    

}




?>