<?php
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

    /*
     * Listing of users
     */
    function index()
    {
        if($this->session->userdata('user_id'))
        {

            $data['users'] = $this->ambilSemuaUser();
            
            $data['_view'] = 'user/index';
            $this->load->view('layouts/main',$data);
        }else{
            redirect('user/aksiLoginUser');
        }
    }

    function detail($id_user)
    {

        $data['user'] = $this->ambilUserBerdasarkanId($id_user);

        $data['_view'] = 'user/detail';
        $this->load->view('layouts/main',$data);
    }

    /*
     * ambil semua user
     */
    function ambilSemuaUser()
    {
        return $this->User_model->getAllUser();
    }

    function ambilUserBerdasarkanId($id_user)
    {
        return $this->User_model->getUser($id_user);
    }

    /*
     * Adding a new user
     */
    function aksiTambahUser()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jk','Jk','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('telp','Telp','required|numeric');
		$this->form_validation->set_rules('jenis_user','Jenis User','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'jk' => $this->input->post('jk'),
				'jenis_user' => $this->input->post('jenis_user'),
				'password' => MD5($this->input->post('password')),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'telp' => $this->input->post('telp'),
            );
            
            $user_id = $this->User_model->createUser($params);
            redirect('user/index');
        }
        else
        {            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user
     */
    function aksiEditUser($id_user)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->getUser($id_user);
        
        if(isset($data['user']['id_user']))
        {
            $this->load->library('form_validation');

			// $this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('jk','Jk','required');
			// $this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('telp','Telp','required|numeric');
			$this->form_validation->set_rules('jenis_user','Jenis User','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'jk' => $this->input->post('jk'),
					'jenis_user' => $this->input->post('jenis_user'),
					// 'password' => MD5($this->input->post('password')),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					// 'email' => $this->input->post('email'),
					'telp' => $this->input->post('telp'),
                );

                $this->User_model->updateUser($id_user,$params);            
                redirect('user/index');
            }
            else
            {
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function aksiHapusUser($id_user)
    {
        $user = $this->User_model->getUser($id_user);

        // check if the user exists before trying to delete it
        if(isset($user['id_user']))
        {
            $this->User_model->deleteUser($id_user);
            redirect('user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

    public function aksiLoginUser()
    {
        if($this->session->userdata('user_id')){
            //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
            redirect('dashboard');

        }else{
            //jika session belum terdaftar

            //set form validation
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');
            
            $this->form_validation->set_message('valid_email', '<div class="alert alert-danger" style="margin-top: 3px">
                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus valid</div></div>');
            
            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $email = $this->input->post("email", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->User_model->login('user', array('email' => $email), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_email' => $apps->email,
                            'user_pass' => $apps->password,
                            'user_name' => $apps->nama,
                            'user_type' => $apps->jenis_user,
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('dashboard');

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> email atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }
            }else{
                $this->load->view('login');
            }
        }
    }

    public function aksiLogoutUser()
    {
        $this->User_model->logout();
        redirect('user/aksiLoginUser');
    }
    
}
