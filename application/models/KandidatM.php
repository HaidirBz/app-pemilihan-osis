<?php defined('BASEPATH') or exit('No direct script access allowed');
class KandidatM extends CI_Model
{
    protected $_table = "kandidat";

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

    public function no_urut(){
        $this->db->select('RIGHT(kandidat.no_urut,1) as kode', false);
        $this->db->order_by('no_urut','DESC');
        $this->db->limit(1);

        $query=$this->db->get('kandidat');
        
        if ($query->num_rows()<>0) {
                  $data=$query->row();
                  $kode=intval($data->kode)+1;
              }
              else{
                $kode=1;
              }
              $kode_max=str_pad($kode,1,"0",STR_PAD_LEFT);
              $kode_new="".$kode_max;
              return $kode_new;
    }

    public function total_rows(){
        return $this->db->get('kandidat')->num_rows();
    }
}
