<?php 
class Audit_model extends CI_Model{
    public function find_process_id($table,$field,$id){
        $this->db->where($field,$id);
        $q=$this->db->get($table);
        return $q->result_array();
    }
    public function find_match_data($table,$condition){
        $this->db->where($condition);
        $q=$this->db->get($table);
        return $q->result_array();
    }
    public function Insertuser($table,$data)
    {    $q=$this->db->insert($table, $data);
        return $this->db->affected_rows()?true:false;
    }
    function insertData($table,$data){
        $this->db->trans_start();
        $this->db->insert($table,$data);
        $this->db->trans_complete();
        return $this->db->insert_id();
    }
    
    public function getNewIDorNo($prefix, $tableName, $pad_length = 3)
    {
        $id = 0;
        $row = $this->db->query("SELECT max(id) as maxid  FROM " . $tableName)->row();

        if ($row) {
            $id = $row->maxid;
        }
        $id++;

        $Id = strtoupper($prefix . date('y') . date('m') . date('d') . str_pad($id, $pad_length, '0', STR_PAD_LEFT));

        return $Id; // $maxid==NULL?1:$maxid+1;
    }
    public function select_table_Where_data($tableName,$condition){
        $this->db->where($condition);
        $q=$this->db->get($tableName)->result_array();
        return $q;

    }
}

?>