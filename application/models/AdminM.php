<?php defined('BASEPATH') or exit('No direct script access allowed');
class AdminM extends CI_Model
{
    protected $_table = "admin";

    // menambah data
    function new ($data) {
        if ($this->db->insert($this->_table, $data)) {
            return $this->db->insert_id();
        }
    }

    // mencari data
    public function find($where = null)
    {
        if ($where == null) {
            return $this->db->get($this->_table);
        } else {
            return $this->db->get_where($this->_table, $where);
        }
    }

    // merubah data admin
    public function edit($where, $data)
    {
        $this->db->where($where, $data);
        return $this->db->update($this->_table, $data);
    }


    // menghapus data admin
    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete($this->_table);
    }

    public function total_rows(){
        return $this->db->get('admin')->num_rows();
    }
}
