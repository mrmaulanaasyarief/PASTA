<?php

class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        $data['_view'] = 'home';
        $this->load->view('layouts/customer',$data);
            
    }

    function info_harga()
    {
        $this->load->model('Barang_model');
        $data['barangs'] = $this->Barang_model->getAllBarang(); 

        $data['_view'] = 'info-harga';
        $this->load->view('layouts/customer',$data);
    }

    function galeri()
    {
        $data['_view'] = 'galeri';
        $this->load->view('layouts/customer',$data);
    }

    function pesan($id_user)
    {
        if($this->session->userdata('user_id')){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('id_pemesanan','Id Pemesanan','required');
            $this->form_validation->set_rules('id_barang','Id Barang','required');
            $this->form_validation->set_rules('kuantitas','Kuantitas','required|numeric|greater_than[0]');
            
            if($this->form_validation->run())     
            {      
                $this->load->model('Barang_model');
                $params = array(
                    'id_pemesanan' => $this->input->post('id_pemesanan'),
                    'id_barang' => $this->input->post('id_barang'),
                    'kuantitas' => $this->input->post('kuantitas'),
                    'harga' => $this->Barang_model->getHargaBarang($this->input->post('id_barang')),
                    'total_harga' => $this->Barang_model->getHargaBarang($this->input->post('id_barang')) * $this->input->post('kuantitas'),
                );
                $item_pemesanan_id = $this->Item_pemesanan_model->createItem($params);
                
                $this->load->model('Pemesanan_model');
                $params2 = array(
                    'total_item' => $this->Item_pemesanan_model->getSumItem($this->input->post('id_pemesanan')),
                    'total_harga' => $this->Item_pemesanan_model->getSumHarga($this->input->post('id_pemesanan')),
                );

                $this->Pemesanan_model->updatePemesanan($this->input->post('id_pemesanan'),$params2);
                redirect('item_pemesanan/index');
            }
            else
            {
                $this->load->model('Pemesanan_model');
                $data['pemesanan'] = $this->Pemesanan_model->getAllPemesananByUser($id_user);
                if(isset($data['pemesanan']['id_pemesanan'])){
                    $this->load->model('Item_pemesanan_model');
                    $data['items'] = $this->Item_pemesanan_model->getAllItemByPesananId($data['pemesanan']['id_pemesanan']);
    
                    $this->load->model('Barang_model');
                    $data['all_barangs'] = $this->Barang_model->getAllBarang();
    
                    $this->load->model('Pembayaran_model');
                    $data['pembayaran'] = $this->Pembayaran_model->getPembayaranByIdPemesanan($data['pemesanan']['id_pemesanan']);
                    
                    $data['_view'] = 'pesan';
                    $this->load->view('layouts/customer',$data);
                }else{
                    $params = array(
                        'id_user' => $id_user,
                        'status_pemesanan' => 0,
                    );
                    
                    $pemesanan_id = $this->Pemesanan_model->createPemesanan($params);
                    redirect('home/pesan/'.$id_user);
                }
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }
}
