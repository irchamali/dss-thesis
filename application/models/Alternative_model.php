<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternative_model extends CI_Model
{
    public $id_alternative;
    public $alternative;

    public function __construct()
    {
        parent::__construct();
    }

    private function getTable()
    {
        return 'electre_alternatives';
    }

    private function getData()
    {
        $data = array(
            'alternative' => $this->alternative
            // 'code_alt' => $this->code_alt,
            // 'info' => $this->info,
            // 'plants' => $this->plants
        );
        return $data;
    }

    public function getAll()
    {
        $alternative = array();
        $query = $this->db->get($this->getTable());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $alternative[] = $row;
            }
        }
        return $alternative;
    }

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $status = $this->db->update($this->getTable(), $this->getData(), $where);
        return $status;
    }

    public function delete($id)
    {
        $this->db->where('id_alternative', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID()
    {
        $this->db->select('id_alternative');
        $this->db->order_by('id_alternative', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }



    // Batas model baru
    public function getAllAlternative()
    {
        return $this->db->get('electre_alternatives')->result_array(); //tanpa select * from 
    }

    public function tambahDataAlternative()
    {
        $data = [
            "alternative" => $this->input->post('alternative', true),
            "code_alt" => $this->input->post('code_alt', true),
            "info" => $this->input->post('info', true),
            "plants" => $this->input->post('plants', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        $this->db->insert('electre_alternatives', $data);
    }

    public function hapusDataAlternative($id)
    {
        // $this->db->where('id_criteria', $id);
        // $this->db->delete('electre_criterias');
        //diatas adalah cara pertama: dengan method dua baris
        $this->db->delete('electre_alternatives', ['id_alternative' => $id]);
    }

    public function getAlternativeById($id)
    {
        return $this->db->get_where('electre_alternatives', ['id_alternative' => $id])->row_array();
    }

    public function ubahDataAlternative()
    {
        $data = [
            "alternative" => $this->input->post('alternative', true),
            "code_alt" => $this->input->post('code_alt', true),
            "info" => $this->input->post('info', true),
            "plants" => $this->input->post('plants', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        //bedanya dengan insert ada pada penambahan 'where' sebelum 'update'
        $this->db->where('id_alternative', $this->input->post('id_alternative'));
        $this->db->update('electre_alternatives', $data);
    }

    public function cariDataAlternative()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('alternative', $keyword);
        // $this->db->or_like('code_crt', $keyword);
        // $this->db->or_like('weight', $keyword);
        //menampilkan pencarian secara keseluruhan
        return $this->db->get('electre_alternatives')->result_array();
    }
}
