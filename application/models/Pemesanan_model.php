<?php
 
class Pemesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pemesanan by id_pemesanan
     */
    function getPemesanan($id_pemesanan)
    {
        return $this->db->get_where('pemesanan',array('id_pemesanan'=>$id_pemesanan))->row_array();
    }
    
    /*
     * Get all pemesanans count
     */
    function getAllPemesananCount()
    {
        $this->db->from('pemesanan');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pemesanans
     */
    function getAllPemesanan($params = array())
    {
        $this->db->order_by('id_pemesanan', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pemesanan')->result_array();
    }

    function getAllPemesananByUser($id_user)
    {
        return $this->db->get_where('pemesanan',array('id_user'=>$id_user))->row_array();
    }

    function getPemesananByUser($id_user)
    {
        return $this->db->get_where('pemesanan',array('id_user'=>$id_user,'status_pemesanan'=>0))->row_array();
    }

    function getTotalItem($id_pemesanan)
    {
        return $this->db->get_where('pemesanan', array('id_pemesanan' => $id_pemesanan))->row()->total_item;
    }

    function getTotalHarga($id_pemesanan)
    {
        return $this->db->get_where('pemesanan', array('id_pemesanan' => $id_pemesanan))->row()->total_harga;
    }
        
    /*
     * function to add new pemesanan
     */
    function createPemesanan($params)
    {
        $this->db->insert('pemesanan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pemesanan
     */
    function updatePemesanan($id_pemesanan,$params)
    {
        $this->db->where('id_pemesanan',$id_pemesanan);
        return $this->db->update('pemesanan',$params);
    }
    
    /*
     * function to delete pemesanan
     */
    function deletePemesanan($id_pemesanan)
    {
        return $this->db->delete('pemesanan',array('id_pemesanan'=>$id_pemesanan));
    }
}