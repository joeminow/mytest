<?php

class UserModelTest extends CIUnit_Framework_TestCase
{
        public function get_all()
    {
        $query = $this->db->get('tbl_seller');
        return $query->result();

    }
    public function get_seller_id($id)
    {
        $query = $this->db->where('sel_id', $id);
        $query = $this->db->get('tbl_seller');
        return $query->result();

    }
    public  function insert_seller($data){

        $this->db->insert('tbl_seller', $data); 
    }
    public function get_seller($id)
    {
        $this->db->where('sel_id',$id);
        $query = $this->db->get('tbl_seller');
        return $query->result();
    }
    
    public function delete_seller($id)
    {
        $this->db->where('sel_id',$id);
        $this->db->delete('tbl_seller');
    }
    
    public function update_seller($id, $data)
    {

        $this->db->where('sel_id',$id);
        $this->db->update('tbl_seller',$data);

    }
}

?>