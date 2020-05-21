<?php

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        if($this->session->userdata('user_id')){
            if($this->session->userdata('user_type') == 0){
                $data['_view'] = 'dashboard';
                $this->load->view('layouts/main',$data);
            }else{
                redirect('home');
            }
        }else{
            redirect('user/aksiLoginUser');
        }
    }
}
