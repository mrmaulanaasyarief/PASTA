<?php
 
class Pemesanan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
    } 

    /*
     * Listing of pemesanans
     */
    function index()
    {
        if($this->session->userdata('user_id'))
        {
            $data['pemesanans'] = $this->Pemesanan_model->getAllPemesanan();

            $this->load->model('User_model');
            $data['all_users'] = $this->User_model->getAllUser();
            
            $data['_view'] = 'pemesanan/index';
            $this->load->view('layouts/main',$data);
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    function detail($id_user, $id_pemesanan)
    {

        $data['pemesanan'] = $this->ambilPemesananBerdasarkanId($id_pemesanan);

        $this->load->model('Barang_model');
        $data['barang'] = $this->Barang_model->getAllBarang();

        $this->load->model('Item_pemesanan_model');
        $data['items'] = $this->Item_pemesanan_model->getAllItemByPesananId($id_pemesanan);
        
        $this->load->model('User_model');
        $data['customer'] = $this->User_model->getUser($id_user);

        $this->load->model('Pembayaran_model');
        $data['pembayaran'] = $this->Pembayaran_model->getPembayaranByIdPemesanan($id_pemesanan);

        $data['_view'] = 'pemesanan/detail';
        $this->load->view('layouts/main',$data);
    }

    /*
     * ambil semua pemesanan
     */
    function ambilSemuaPemesanan()
    {
        return $this->Pemesanan_model->getAllPemesanan();
    }

    function ambilPemesananBerdasarkanId($id_pemesanan)
    {
        return $this->Pemesanan_model->getPemesanan($id_pemesanan);
    }

    /*
     * Adding a new pemesanan
     */
    function aksiTambahPemesanan()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_user','Id User','required');
		$this->form_validation->set_rules('status_pemesanan','Status Pemesanan','required');
		$this->form_validation->set_rules('durasi','Durasi','integer|greater_than[0]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'id_user' => $this->input->post('id_user'),
				'status_pemesanan' => $this->input->post('status_pemesanan'),
				'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan'),
				'durasi' => $this->input->post('durasi'),
            );
            
            $pemesanan_id = $this->Pemesanan_model->createPemesanan($params);
            redirect('pemesanan/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->getAllUser();
            
            $data['_view'] = 'pemesanan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pemesanan
     */
    function aksiEditPemesanan($id_pemesanan)
    {   
        // check if the pemesanan exists before trying to edit it
        $data['pemesanan'] = $this->Pemesanan_model->getPemesanan($id_pemesanan);
        
        if(isset($data['pemesanan']['id_pemesanan']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_user','Id User','required');
			$this->form_validation->set_rules('status_pemesanan','Status Pemesanan','required');
			$this->form_validation->set_rules('durasi','Durasi','integer|greater_than[0]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_user' => $this->input->post('id_user'),
					'status_pemesanan' => $this->input->post('status_pemesanan'),
					'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan'),
					'durasi' => $this->input->post('durasi'),
                );

                $this->Pemesanan_model->updatePemesanan($id_pemesanan,$params);            
                redirect('pemesanan/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->getAllUser();

                $data['_view'] = 'pemesanan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pemesanan you are trying to edit does not exist.');
    } 

    /*
     * Deleting pemesanan
     */
    function aksiHapusPemesanan($id_pemesanan)
    {
        $pemesanan = $this->Pemesanan_model->getPemesanan($id_pemesanan);

        // check if the pemesanan exists before trying to delete it
        if(isset($pemesanan['id_pemesanan']))
        {
            $this->Pemesanan_model->deletePemesanan($id_pemesanan);
            redirect('pemesanan/index');
        }
        else
            show_error('The pemesanan you are trying to delete does not exist.');
    }

    function place_order($id_user, $id_pemesanan)
    {
        $params = array(
            'status_pemesanan' => 1,
        );

        $this->Pemesanan_model->updatePemesanan($id_pemesanan,$params);            
        redirect('home/pesan/'.$id_user);
    }

    function aksiCetakStruk($id_user)
    {
        if($this->session->userdata('user_id')){
            
            $this->load->model('Pemesanan_model');
            $data['pemesanan'] = $this->Pemesanan_model->getAllPemesananByUser($id_user);

            $this->load->model('Item_pemesanan_model');
            $data['items'] = $this->Item_pemesanan_model->getAllItemByPesananId($data['pemesanan']['id_pemesanan']);

            $this->load->model('Barang_model');
            $data['all_barangs'] = $this->Barang_model->getAllBarang();

            $this->load->model('Pembayaran_model');
            $data['pembayaran'] = $this->Pembayaran_model->getPembayaranByIdPemesanan($data['pemesanan']['id_pemesanan']);
            
            $data['_view'] = 'pesan';
            $this->load->view('layouts/print',$data);
            
        }else{
            redirect('user/aksiLoginUser');
        }
    }
    
}