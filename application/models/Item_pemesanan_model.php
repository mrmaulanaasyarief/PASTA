<?php
 
class Item_pemesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get item_pemesanan by id_item
     */
    function getItem($id_item)
    {
        return $this->db->get_where('item_pemesanan',array('id_item'=>$id_item))->row_array();
    }
    
    /*
     * Get all item_pemesanans count
     */
    function getAllItemCount()
    {
        $this->db->from('item_pemesanan');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all item_pemesanans
     */
    function getAllItem($params = array())
    {
        $this->db->order_by('id_item', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('item_pemesanan')->result_array();
    }

    function getAllItemByPesananId($id_pemesanan)
    {
        return $this->db->get_where('item_pemesanan',array('id_pemesanan'=>$id_pemesanan))->result_array();
    }

    function getSumItem($id_pemesanan)
    {
        $this->db->select_sum('kuantitas');
        return $this->db->get_where('item_pemesanan',array('id_pemesanan'=>$id_pemesanan))->row()->kuantitas;
    }

    function getSumHarga($id_pemesanan)
    {
        $this->db->select_sum('total_harga');
        return $this->db->get_where('item_pemesanan',array('id_pemesanan'=>$id_pemesanan))->row()->total_harga;
    }
        
    /*
     * function to add new item_pemesanan
     */
    function createItem($params)
    {
        $this->db->insert('item_pemesanan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update item_pemesanan
     */
    function updateItem($id_item,$params)
    {
        $this->db->where('id_item',$id_item);
        return $this->db->update('item_pemesanan',$params);
    }
    
    /*
     * function to delete item_pemesanan
     */
    function deleteItem($id_item)
    {
        return $this->db->delete('item_pemesanan',array('id_item'=>$id_item));
    }
}
