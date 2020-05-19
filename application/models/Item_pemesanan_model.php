<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Item_pemesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get item_pemesanan by id_item
     */
    function get_item_pemesanan($id_item)
    {
        return $this->db->get_where('item_pemesanan',array('id_item'=>$id_item))->row_array();
    }
    
    /*
     * Get all item_pemesanans count
     */
    function get_all_item_pemesanans_count()
    {
        $this->db->from('item_pemesanan');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all item_pemesanans
     */
    function get_all_item_pemesanans($params = array())
    {
        $this->db->order_by('id_item', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('item_pemesanan')->result_array();
    }
        
    /*
     * function to add new item_pemesanan
     */
    function add_item_pemesanan($params)
    {
        $this->db->insert('item_pemesanan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update item_pemesanan
     */
    function update_item_pemesanan($id_item,$params)
    {
        $this->db->where('id_item',$id_item);
        return $this->db->update('item_pemesanan',$params);
    }
    
    /*
     * function to delete item_pemesanan
     */
    function delete_item_pemesanan($id_item)
    {
        return $this->db->delete('item_pemesanan',array('id_item'=>$id_item));
    }
}
