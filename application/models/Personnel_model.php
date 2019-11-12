<?php


class Personnel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table_name='personnels';
    }

    public function get_all($data=null)
    {
        if($data){
            return $this->db->get_where($this->table_name, $data)->result_array();
        }
        return $this->db->get($this->table_name)->result_array();
    }

    public function get($data)
    {
        return $this->db->get_where($this->table_name, $data)->row_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }

    public function supprimer($data){
        $this->db->delete($this->table_name, $data);
    }

    public function modifier($id, $data)
    {
        $this->db->where('id_personnel', $id);
        $this->db->update($this->table_name, $data);
    }

    
}