<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternative_model extends CI_Model
{

    public function getAllAlternative()
    {
        // $query = $this->db->get('electre_criterias');
        // return $query->result_array(); //baca query builder pada documentasi CI
        //lebih simplenya gini nih:
        return $this->db->get('electre_alternatives')->result_array(); //tanpa select * from 
    }

    public function tambahDataAlternative()
    {
        $data = [
            "name_alt" => $this->input->post('name_alt', true),
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
            "name_alt" => $this->input->post('name_alt', true),
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
        $this->db->like('name_alt', $keyword);
        // $this->db->or_like('code_crt', $keyword);
        // $this->db->or_like('weight', $keyword);
        //menampilkan pencarian secara keseluruhan
        return $this->db->get('electre_alternatives')->result_array();
    }
}
