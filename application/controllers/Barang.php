<?php
 
class Barang extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
    } 

    /*
     * Listing of barangs
     */
    function index()
    {
        if($this->session->userdata('user_id'))
        {

            $data['barangs'] = $this->ambilSemuaBarang();
            
            $data['_view'] = 'barang/index';
            $this->load->view('layouts/main',$data);
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    function detail($id_barang)
    {

        $data['barang'] = $this->ambilBarangBerdasarkanId($id_barang);

        $data['_view'] = 'barang/detail';
        $this->load->view('layouts/main',$data);
    }

    /*
     * ambil semua barang
     */
    function ambilSemuaBarang()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        return $this->Barang_model->getAllBarang($params);
    }

    function ambilBarangBerdasarkanId($id_barang)
    {
        return $this->Barang_model->getBarang($id_barang);
    }

    /*
     * Adding a new barang
     */
    function aksiTambahBarang()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('stok','Stok','required|integer|greater_than[0]');
		$this->form_validation->set_rules('harga','Harga','required|integer|greater_than[0]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'deskripsi' => $this->input->post('deskripsi'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
            );
            
            $barang_id = $this->Barang_model->createBarang($params);
            redirect('barang/index');
        }
        else
        {            
            $data['_view'] = 'barang/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a barang
     */
    function aksiEditBarang($id_barang)
    {   
        // check if the barang exists before trying to edit it
        $data['barang'] = $this->Barang_model->getBarang($id_barang);
        
        if(isset($data['barang']['id_barang']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama_barang','Nama Barang','required');
			$this->form_validation->set_rules('deskripsi','Deskripsi','required');
			$this->form_validation->set_rules('stok','Stok','required|integer|greater_than[0]');
			$this->form_validation->set_rules('harga','Harga','required|integer|greater_than[0]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'deskripsi' => $this->input->post('deskripsi'),
					'stok' => $this->input->post('stok'),
					'harga' => $this->input->post('harga'),
                );

                $this->Barang_model->updateBarang($id_barang,$params);            
                redirect('barang/index');
            }
            else
            {
                $data['_view'] = 'barang/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The barang you are trying to edit does not exist.');
    } 

    /*
     * Deleting barang
     */
    function aksiHapusBarang($id_barang)
    {
        $barang = $this->Barang_model->getBarang($id_barang);

        // check if the barang exists before trying to delete it
        if(isset($barang['id_barang']))
        {
            $this->Barang_model->deleteBarang($id_barang);
            redirect('barang/index');
        }
        else
            show_error('The barang you are trying to delete does not exist.');
    }
    
}
