<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pembayaran_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pembayaran by id_pembayaran
     */
    function get_pembayaran($id_pembayaran)
    {
        return $this->db->get_where('pembayaran',array('id_pembayaran'=>$id_pembayaran))->row_array();
    }
    
    /*
     * Get all pembayarans count
     */
    function get_all_pembayarans_count()
    {
        $this->db->from('pembayaran');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pembayarans
     */
    function get_all_pembayarans($params = array())
    {
        $this->db->order_by('id_pembayaran', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pembayaran')->result_array();
    }
        
    /*
     * function to add new pembayaran
     */
    function add_pembayaran($params)
    {
        $this->db->insert('pembayaran',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pembayaran
     */
    function update_pembayaran($id_pembayaran,$params)
    {
        $this->db->where('id_pembayaran',$id_pembayaran);
        return $this->db->update('pembayaran',$params);
    }
    
    /*
     * function to delete pembayaran
     */
    function delete_pembayaran($id_pembayaran)
    {
        return $this->db->delete('pembayaran',array('id_pembayaran'=>$id_pembayaran));
    }
}
