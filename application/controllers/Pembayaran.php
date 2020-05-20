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
        $data['pembayarans'] = $this->Pembayaran_model->getAllPembayaran();
        
        $data['_view'] = 'pembayaran/index';
        $this->load->view('layouts/main',$data);
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
			$this->load->model('Pemesanan_model');
			$data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();
            
            $data['_view'] = 'pembayaran/add';
            $this->load->view('layouts/main',$data);
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
				$this->load->model('Pemesanan_model');
				$data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();

                $data['_view'] = 'pembayaran/edit';
                $this->load->view('layouts/main',$data);
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
        $pembayaran = $this->Pembayaran_model->getPembayaran($id_pembayaran);

        // check if the pembayaran exists before trying to delete it
        if(isset($pembayaran['id_pembayaran']))
        {
            $this->Pembayaran_model->deletePembayaran($id_pembayaran);
            redirect('pembayaran/index');
        }
        else
            show_error('The pembayaran you are trying to delete does not exist.');
    }

    function aksiKonfirmasiPembayaran($id_pembayaran)
    {
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
    }
    
}
