<?php 

    class model_sistem extends CI_model{

        public function simpan_db(){
            $data = array (
                'id_user' => "",
                'username' => $this->input->post('username'),
                'password'  => $this->input->post('password'),
                'nama_user'  => $this->input->post('nama'),
                'level'  => $this->input->post('user'),

            );
            $this->db->insert('user', $data);
            header("Location:".base_url().'Dashboard/login');
            
        }
        public function get_user()
        {
           $data = $this->db->get('user');
           return $data->result();
        }

        public function count_user()
        {
           $data =  $this->db->get('user');
           return $data->nums_rows();
        }

        public function login_database($account)
        {
            $petugas = $this->db->get_where('user',$account);
            $masyarakat = $this->db->get_where('user',$account);
            if ($petugas->result() == null) {
                return $masyarakat;
            }else{
                return $petugas;
            }
            
        }

    

    

        public function get_orderan()
        {
            $data = $this->db->get('order');
            return $data->result();
        }
    
        public function get_makanan()
        {
            $data = $this->db->get('masakan');
            return $data->result();
        }

        public function updatemakanan()
        {
            $data = array(
                'id_masakan' => $this->input->post('id_masak'),
                'gambar' => $this->input->post('gambar_product'),
                'nama_masakan' => $this->input->post('name_product'),
                'harga' => $this->input->post('harga_product'),
                'status_masakan' => $this->input->post('status_product'),
            );
    
            $where = array('id_masakan' => $this->input->post('id_masak'),);
    
            $this->db->update('masakan', $data, $where);
            header("Location:".base_url().'dashboard/daftarmakanan');
        }

        public function deletemakanan()
        {
            $data = array(
                'id_masakan' => $this->input->post('id_masak')
            );
    
            $this->db->delete('masakan', $data);
            header("Location:".base_url().'dashboard/daftarmakanan');
        }

        public function save_makanan()
        {
            $data = array(
                'gambar' => $this->input->post('gambar_product'),
                'nama_masakan' => $this->input->post('name_product'),
                'harga' => $this->input->post('harga_product'),
                'status_masakan' => $this->input->post('status_product'),
               
            );
    
            $this->db->insert('masakan', $data);
            header("Location:".base_url().'dashboard/daftarmakanan');
        }

        public function readJoinTable($table, $join)
        {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->join('order', $join);
            return $this->db->get()->result();
        }

        public function readTable($table)
        {
            $data = $this->db->get($table);
            return $data->result();
        }

        public function readColumnTable($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function insertBatchTable($table, $data)
    {
        $this->db->insert_batch($table, $data);
    }

    public function updateTable($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function deleteTable($table, $data)
    {
        $this->db->delete($table, $data);
    }

    public function readWhereTable($table, $where)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function insertTable($table, $data)
    {
        $this->db->insert($table, $data);
    }

   


    




     
      
    
        
    }
       
    

?>