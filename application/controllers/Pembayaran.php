<?php
 
class Pembayaran extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
    } 

    /*
     * Listing of pembayarans
     */
    function index()
    {
        if($this->session->userdata('user_id'))
        {
            if($this->session->userdata('user_type') == 0){
                $data['pembayarans'] = $this->Pembayaran_model->getAllPembayaran();
                
                $data['_view'] = 'pembayaran/index';
                $this->load->view('layouts/main',$data);
            }else{
                redirect('home');
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    /*
     * Adding a new pembayaran
     */
    function aksiTambahPembayaran()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('id_pemesanan','Id Pemesanan','required');
		$this->form_validation->set_rules('jenis_pembayaran','Jenis Pembayaran','required');
		$this->form_validation->set_rules('status_pembayaran','Status Pembayaran','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
				'status_pembayaran' => $this->input->post('status_pembayaran'),
				'id_pemesanan' => $this->input->post('id_pemesanan'),
				'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
				'bukti_pembayaran' => $this->input->post('bukti_pembayaran'),
				'keterangan' => $this->input->post('keterangan'),
            );
            
            $pembayaran_id = $this->Pembayaran_model->createPembayaran($params);
            redirect('pembayaran/index');
        }
        else
        {
            if($this->session->userdata('user_id'))
            {
                if($this->session->userdata('user_type') == 0){
                    $this->load->model('Pemesanan_model');
                    $data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();
                    
                    $data['_view'] = 'pembayaran/add';
                    $this->load->view('layouts/main',$data);
                }else{
                    redirect('home');
                }
            }else{
                redirect('user/aksiLoginUser');
            }
        }
    }  

    /*
     * Editing a pembayaran
     */
    function aksiEditPembayaran($id_pembayaran)
    {   
        // check if the pembayaran exists before trying to edit it
        $data['pembayaran'] = $this->Pembayaran_model->getPembayaran($id_pembayaran);
        
        if(isset($data['pembayaran']['id_pembayaran']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('id_pemesanan','Id Pemesanan','required');
			$this->form_validation->set_rules('jenis_pembayaran','Jenis Pembayaran','required');
			$this->form_validation->set_rules('status_pembayaran','Status Pembayaran','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
					'status_pembayaran' => $this->input->post('status_pembayaran'),
					'id_pemesanan' => $this->input->post('id_pemesanan'),
					'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
					'bukti_pembayaran' => $this->input->post('bukti_pembayaran'),
					'keterangan' => $this->input->post('keterangan'),
                );

                $this->Pembayaran_model->updatePembayaran($id_pembayaran,$params);            
                redirect('pembayaran/index');
            }
            else
            {
                if($this->session->userdata('user_id'))
                {
                    if($this->session->userdata('user_type') == 0){
                        $this->load->model('Pemesanan_model');
                        $data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();
        
                        $data['_view'] = 'pembayaran/edit';
                        $this->load->view('layouts/main',$data);
                    }else{
                        redirect('home');
                    }
                }else{
                    redirect('user/aksiLoginUser');
                }
            }
        }
        else
            show_error('The pembayaran you are trying to edit does not exist.');
    } 

    /*
     * Deleting pembayaran
     */
    function aksiHapusPembayaran($id_pembayaran)
    {
        if($this->session->userdata('user_id'))
        {
            if($this->session->userdata('user_type') == 0){
                $pembayaran = $this->Pembayaran_model->getPembayaran($id_pembayaran);
        
                // check if the pembayaran exists before trying to delete it
                if(isset($pembayaran['id_pembayaran']))
                {
                    $this->Pembayaran_model->deletePembayaran($id_pembayaran);
                    redirect('pembayaran/index');
                }
                else
                    show_error('The pembayaran you are trying to delete does not exist.');
            }else{
                redirect('home');
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    function aksiKonfirmasiPembayaran($id_pembayaran)
    {
        if($this->session->userdata('user_id'))
        {
            if($this->session->userdata('user_type') == 0){
                $pembayaran = $this->Pembayaran_model->getPembayaran($id_pembayaran);
        
                // check if the pembayaran exists before trying to delete it
                if(isset($pembayaran['id_pembayaran']))
                {
                    $params = array(
                        'status_pembayaran' => 2,
                    );
                    $this->Pembayaran_model->updatePembayaran($id_pembayaran,$params);  
                    redirect('pembayaran/index');
                }
                else
                    show_error('The pembayaran you are trying to confirm does not exist.');
            }else{
                redirect('home');
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    function bayar($id_pemesanan)
    {
        if($this->session->userdata('user_id')){
            $pembayaran = $this->Pembayaran_model->getPembayaranByIdPemesanan($id_pemesanan);
            if(isset($pembayaran['id_pembayaran']))
            {
                // check if the pemesanan exists before trying to edit it
                $this->load->model('Pemesanan_model');
                $data['pemesanan'] = $this->Pemesanan_model->getPemesanan($id_pemesanan);
                
                if(isset($data['pemesanan']['id_pemesanan']))
                {
                    if($data['pemesanan']['tanggal_pemesanan']==NULL||$data['pemesanan']['durasi']==0){
                        $this->load->library('form_validation');

                        $this->form_validation->set_rules('tanggal_pemesanan','Tanggal Pemesanan','required');
                        $this->form_validation->set_rules('durasi','Durasi','required|integer|greater_than[0]');
                    
                        if($this->form_validation->run())     
                        {   
                            $params = array(
                                'tanggal_pemesanan' => $this->input->post('tanggal_pemesanan'),
                                'durasi' => $this->input->post('durasi'),
                                'total_harga' => $this->input->post('durasi') * $data['pemesanan']['total_harga']
                            );

                            $this->Pemesanan_model->updatePemesanan($id_pemesanan,$params); 
                            redirect('home/pesan/'.$this->session->userdata('user_id'));
                        }
                        else
                        {
                            $this->load->model('User_model');
                            $data['all_users'] = $this->User_model->getAllUser();

                            $data['_view'] = 'bayar';
                            $this->load->view('layouts/customer',$data);
                        }
                    }else{      
                        $params2 = array(
                            'status_pembayaran' => '1',
                            'tanggal_pembayaran' => date('m/d/Y H:i A'),
                        );
                        $this->Pembayaran_model->updatePembayaran($pembayaran['id_pembayaran'],$params2);
                        redirect('home/pesan/'.$this->session->userdata('user_id'));
                    } 
                }
                else
                    show_error('The pemesanan you are trying to edit does not exist.');
            }else{
                $params = array(
                    'jenis_pembayaran' => 1,
                    'id_pemesanan' => $id_pemesanan,
                    'status_pembayaran' => 0,
                );
                
                $pembayaran_id = $this->Pembayaran_model->createPembayaran($params);
                redirect('pembayaran/bayar/'.$id_pemesanan);
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }
    
}
