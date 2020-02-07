<?php

class MainModel extends ci_model
{
    public function insertInto($tableName = null, $data = null)
    {
        $this->db->insert($tableName, $data);
        $insert_id = $this->db->insert_id();
        return $this->db->affected_rows() ? $insert_id : FALSE;
    }
    public function Update($column_name = null, $tableName = null, $data = null, $id = null)
    {
        $this->db->set($column_name, $data);  //Set the column name and which value to set..

        $this->db->where('item_id', $id); //set column_name and value in which row need to update

        $this->db->update($tableName); //Set your table name
    }

    public function selectId($tableName = null, $columnName = null)
    {
        $this->db->select($columnName); // ('a,b,c')
        $result = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function selectAll($tableName = null, $order_col = null)
    {
        $this->db->order_by($order_col, "asc");
        $result = $this->db->get($tableName)->result_array();

        return $this->db->affected_rows() ? $result : FALSE;
    }
    public function selectDistict($tableName = null, $selection_value = null)
    {
        $this->db->distinct();
        $this->db->select($selection_value);
        $result = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function selectDetails($tableName = null, $selectColumn = null, $columnName = null)
    {
        $this->db->select($selectColumn); // ('a,b,c')
        $this->db->where('type', $columnName);
        $result = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function selectSelectedShirtDetails($tableName = null, $selectColumn = null, $id = null, $columnName = null)
    {
        $this->db->select($selectColumn); // ('a,b,c')
        $this->db->where($columnName, $id);
        $result = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $result : FALSE;
    }

    public function selectAllForDuplicate($tableName = null, $condition = null)
    {
        $query = $this->db->get_where($tableName, $condition)->result_array();

        if ($query != null) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function selectAllFromWhere($tableName = null, $condition = null, $order_col = null)
    {
        $this->db->order_by($order_col, "asc");
        $query = $this->db->get_where($tableName, $condition)->result_array();
        if ($query != null) {
            return $this->db->affected_rows() ? $query : FALSE;
        } else {
            return FALSE; //$this->db->affected_rows()?$query[0][$query]:FALSE;
        }
    }

    public function get_field($tableName = null)
    {
        $result = $this->db->list_fields($tableName);
        // foreach($result as $field)
        // {
        // $data[] = $field;
        return $result;
        // }
    }
    public function update_field($id = null,  $table = null, $data = null)
    {
        $this->db->where('id', $id);
        $query = $this->db->update($table, $data);
        if ($query != null) {
            return "FALSE";
        } else {
            return TRUE;
        }
    }


    public function update_error_log_field($id = null,  $table = null, $data = null)
    {
        $this->db->where('error_id', $id);
        $query = $this->db->update($table, $data);
        if ($query != null) {
            return "FALSE";
        } else {
            return TRUE;
        }
    }

    public function update_tbl($table = null, $status = null)
    {
        $this->db->where($status);
        $query = $this->db->update($table);
        if ($query != null) {
            return "FALSE";
        } else {
            return TRUE;
        }
    }

    public function update_field_where($clm_name = null, $clm_val = null, $table = null, $data = null)
    {
        $this->db->where($clm_name, $clm_val);
        $query = $this->db->update($table, $data);
        if ($query != null) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function deleteRow($tableName = null, $condition = null)
    {
        $this->db->where($condition);
        $query = $this->db->delete($tableName);
        if ($query != null) {
            return 'FALSE';
        } else {
            return TRUE;
        }
    }
    //create new id for product/order table
    public function getNew_Id($prefix, $table, $pad_length = 3)
    {
        $id = 0;
        $row = $this->db->query("SELECT max(id) as maxid  FROM " . $table)->row();

        if ($row) {
            $id = $row->maxid;
        }
        $id++;

        $Id = strtoupper($prefix . date('y') . date('m') . date('d') . str_pad($id, $pad_length, '0', STR_PAD_LEFT));

        return $Id; // $maxid==NULL?1:$maxid+1;
    }




    public function update_table($table = null, $condition = null, $data = null)
    {
        // $this->db->set('status', $data);
        $this->db->where($condition);
        $query = $this->db->update($table, $data);
        if ($query != null) {
            return 'FALSE';
        } else {
            return 'TRUE';
        }
    }

    public function selectAllWhere($tableName = null, $condition = null)
    {
        $this->db->where($condition);
        $query = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $query : false;
    }


    public function insert_status($table = null, $data = null)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows() ? 'TRUE' : 'FALSE';
    }



    //delete records by using 

    public function delete($tableName = null, $column_name = null, $id = null)
    {
        $query =  $this->db->where($column_name, $id);
        $this->db->delete($tableName);
        if ($query != null) {
            return 'FALSE';
        } else {
            return TRUE;
        }
    }



    public function max_date($table = null, $date_clm = null)
    {

        $this->db->select_max($date_clm);
        $query = $this->db->get($table);  // Produces: SELECT MAX(date) as date FROM members
        return $query->result_array();
    }



    // function to select records by column
    public function select_Column($column = null, $tableName = null, $condition = null)
    {
        $this->db->distinct();
        $this->db->select($column);
        $this->db->where($condition);
        $query = $this->db->get($tableName)->result_array();
        return $query;
    }

    // function to select records by column which are ununique
    public function select_Duplicate_Column($column = null, $tableName = null, $condition = null)
    {

        $this->db->select($column);
        $this->db->where($condition);
        $query = $this->db->get($tableName)->result_array();
        return $query;
    }

    // function to extract date in yyyy-mm-dd format from timestamp field between given range

    public function selectAllBetween($tableName = null, $first_condition = null, $second_condition = null)
    {
        $this->db->where($first_condition);
        $this->db->where($second_condition);
        $query = $this->db->get($tableName)->result_array();
        return $this->db->affected_rows() ? $query : false;
    }


    // function to extract date in yyyy-mm-dd format from timestamp field
    public function selectAllsubDate($column = null, $tableName = null)
    {
        // print_r($column);print_r($tableName);
        $query = "SELECT *, SUBSTRING($column,1,10) as mynewdate from $tableName";
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }

    // function to extract date in dd-mm-yy format from database field
    public function selectAll_PA_job($colomn = null, $tableName = null)
    {
        // $query="SELECT *, concat(SUBSTRING($colomn,7,2),SUBSTRING($colomn,4,2),SUBSTRING($colomn,1,2)) as mynewdate from $tableName";

        $query = "SELECT *, SUBSTRING($colomn,1,8) as mynewdate from $tableName";
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }

    // function to extract seller orders by ids from database in Job card table..
    public function selectAll_date_where_id($colomn = null, $tableName = null, $id = null)
    {

        $query = "SELECT *, SUBSTRING($colomn,1,10) as mynewdate from $tableName WHERE seller_id=$id";
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }

    // function to extract seller all orders by  from database in Job card table..
    public function selectAll_order($colomn = null, $tableName = null, $status = null)
    {
        $query = "SELECT *, SUBSTRING($colomn,1,10) as mynewdate from $tableName where $status";
        $result = $this->db->query($query)->result_array();
        return $this->db->affected_rows() ? $result : false;
    }
}
