<?php
 
class Item_pemesanan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Item_pemesanan_model');
    } 

    /*
     * Listing of item_pemesanans
     */
    function index()
    {
        if($this->session->userdata('user_id')){
            $data['item_pemesanans'] = $this->Item_pemesanan_model->getAllItem();
            
            $data['_view'] = 'item_pemesanan/index';
            $this->load->view('layouts/main',$data);
        }else{
            redirect('user/aksiLogin');
        }
    }

    /*
     * Adding a new item_pemesanan
     */
    function aksiTambahItem()
    {   
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
            if($this->session->userdata('user_id')==0){
                redirect('item_pemesanan/index');
            }else{
                redirect('home/pesan/'.$this->session->userdata('user_id'));
            }
        }
        else
        {
			$this->load->model('Pemesanan_model');
			$data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();

			$this->load->model('Barang_model');
			$data['all_barangs'] = $this->Barang_model->getAllBarang();
            
            $data['_view'] = 'item_pemesanan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a item_pemesanan
     */
    function aksiEditItem($id_item)
    {   
        // check if the item_pemesanan exists before trying to edit it
        $data['item_pemesanan'] = $this->Item_pemesanan_model->getItem($id_item);
        
        if(isset($data['item_pemesanan']['id_item']))
        {
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

                $this->Item_pemesanan_model->updateItem($id_item,$params);  
                
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
				$data['all_pemesanans'] = $this->Pemesanan_model->getAllPemesanan();

				$this->load->model('Barang_model');
				$data['all_barangs'] = $this->Barang_model->getAllBarang();

                $data['_view'] = 'item_pemesanan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The item_pemesanan you are trying to edit does not exist.');
    } 

    /*
     * Deleting item_pemesanan
     */
    function aksiHapusItem($id_pemesanan, $id_item)
    {
        $item_pemesanan = $this->Item_pemesanan_model->getItem($id_item);

        // check if the item_pemesanan exists before trying to delete it
        if(isset($item_pemesanan['id_item']))
        {
            $this->Item_pemesanan_model->deleteItem($id_item);
            
            $this->load->model('Pemesanan_model');
            $params2 = array(
                'total_item' => $this->Item_pemesanan_model->getSumItem($id_pemesanan),
                'total_harga' => $this->Item_pemesanan_model->getSumHarga($id_pemesanan),
            );

            $this->Pemesanan_model->updatePemesanan($id_pemesanan,$params2);
            if($this->session->userdata('user_id')==0){
                redirect('item_pemesanan/index');
            }else{
                redirect('home/pesan/'.$this->session->userdata('user_id'));
            }
        }
        else
            show_error('The item_pemesanan you are trying to delete does not exist.');
    }
    
}
