<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by id_user
     */
    function getUser($id_user)
    {
        return $this->db->get_where('user',array('id_user'=>$id_user))->row_array();
    }
    
    /*
     * Get all users count
     */
    function getAllUserCount()
    {
        $this->db->from('user');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all users
     */
    function getAllUser($params = array())
    {
        $this->db->order_by('id_user', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('user')->result_array();
    }
        
    /*
     * function to add new user
     */
    function createUser($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function updateUser($id_user,$params)
    {
        $this->db->where('id_user',$id_user);
        return $this->db->update('user',$params);
    }
    
    /*
     * function to delete user
     */
    function deleteUser($id_user)
    {
        return $this->db->delete('user',array('id_user'=>$id_user));
    }

    //fungsi login
    function login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    
    //fungsi logout
    function logout(){
        return $this->session->sess_destroy();
	}
}
