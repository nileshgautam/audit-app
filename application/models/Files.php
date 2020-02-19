<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Files extends CI_Model
{
    function __construct()
    {
        $this->tableName = 'files';
    }

    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows($id = '')
    {
        $this->db->select('*');
        $this->db->from('files');
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('uploaded_on', 'desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result) ? $result : false;
    }

    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array())
    {
        $insert = $this->db->insert_batch('files', $data);
        $insert_id = $this->db->insert_id();
        return $this->db->affected_rows() ? $insert_id : FALSE;
    }


    public function get_subprocess_uploads_file($subprocessid, $client_id)
    {
        $query = "SELECT * FROM `tbl_work_steps` LEFT JOIN (SELECT DISTINCT sub_process_id as file_sp , work_steps_id as file_ws,client_id FROM `files`) as t1 on 
        tbl_work_steps.work_seteps_id=t1.file_ws and 
        tbl_work_steps.sub_process_id=t1.file_sp WHERE sub_process_id=$subprocessid and client_id=$client_id";
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }
    public function get_data_required_uploads_file($subprocessid, $client_id)
    {
        $query = "SELECT * FROM tbl_data_required LEFT JOIN (SELECT DISTINCT sub_process_id as file_sp , 
        mandatory_file_id as file_mf,client_id FROM `files`) as t1 on 
        tbl_data_required.sub_process_id=t1.file_sp and tbl_data_required.id=t1.file_mf 
        WHERE sub_process_id= $subprocessid and client_id=$client_id"
        ;
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }
}
