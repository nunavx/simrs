<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sub_pemeriksaan_laboratoirum_model extends CI_Model
{

    public $table = 'tbl_sub_pemeriksaan_laboratoirum';
    public $id = 'kode_sub_periksa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kode_sub_periksa', $q);
	$this->db->or_like('kode_periksa', $q);
	$this->db->or_like('nama_pemeriksaan', $q);
	$this->db->or_like('satuan', $q);
	$this->db->or_like('nilai_rujukan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($kode_periksa,$limit, $start = 0, $q = NULL) {
        $this->db->where('kode_periksa',$kode_periksa);
        $this->db->order_by($this->id, $this->order);

        
	$this->db->limit($limit, $start);
        return $this->db->get('tbl_sub_pemeriksaan_laboratoirum')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_sub_pemeriksaan_laboratoirum_model.php */
/* Location: ./application/models/Tbl_sub_pemeriksaan_laboratoirum_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-16 18:03:54 */
/* http://harviacode.com */