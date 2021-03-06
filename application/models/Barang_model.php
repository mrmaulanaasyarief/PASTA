<?php
 
class Barang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get barang by id_barang
     */
    function getBarang($id_barang)
    {
        return $this->db->get_where('barang',array('id_barang'=>$id_barang))->row_array();
    }
    
    /*
     * Get all barangs count
     */
    function getAllBarangCount()
    {
        $this->db->from('barang');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all barangs
     */
    function getAllBarang($params = array())
    {
        $this->db->order_by('id_barang', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('barang')->result_array();
    }

    function getHargaBarang($id_barang)
    {
        return $this->db->get_where('barang', array('id_barang' => $id_barang))->row()->harga;
    }
        
    /*
     * function to add new barang
     */
    function createBarang($params)
    {
        $this->db->insert('barang',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update barang
     */
    function updateBarang($id_barang,$params)
    {
        $this->db->where('id_barang',$id_barang);
        return $this->db->update('barang',$params);
    }
    
    /*
     * function to delete barang
     */
    function deleteBarang($id_barang)
    {
        return $this->db->delete('barang',array('id_barang'=>$id_barang));
    }
}
