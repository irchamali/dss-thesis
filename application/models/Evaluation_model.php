<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation_model extends CI_Model{
    public function getAllEvaluation()
    {
        // $query = $this->db->get('electre_criterias');
        // return $query->result_array(); //baca query builder pada documentasi CI
        //lebih simplenya gini nih:
        return $this->db->get('electre_evaluations')->result_array(); //tanpa select * from 
    } 

    // public function tambahDataEvaluation()
    // {
    //     $data = [
    //         "criteria" => $this->input->post('criteria', true),
    //         "code_crt" => $this->input->post('code_crt', true),
    //         "weight" => $this->input->post('weight', true)
    //     ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
    //     $this->db->insert('electre_criterias', $data);
    // }

    // public function hapusDataCriteria($id)
    // {
    //     // $this->db->where('id_criteria', $id);
    //     // $this->db->delete('electre_criterias');
    //     //diatas adalah cara pertama: dengan method dua baris
    //     $this->db->delete('electre_criterias', ['id_criteria'=>$id]);
    // }

    // public function getCriteriaById($id)
    // {
    //     return $this->db->get_where('electre_criterias', ['id_criteria'=>$id])->row_array();
    // }

    // public function ubahDataCriteria()
    // {
    //     $data = [
    //         "criteria" => $this->input->post('criteria', true),
    //         "code_crt" => $this->input->post('code_crt', true),
    //         "weight" => $this->input->post('weight', true)
    //     ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
    //     //bedanya dengan insert ada pada penambahan 'where' sebelum 'update'
    //     $this->db->where('id_criteria', $this->input->post('id_criteria'));
    //     $this->db->update('electre_criterias', $data);
    // }

    // public function cariDataCriteria()
    // {
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('criteria', $keyword);
    //     // $this->db->or_like('code_crt', $keyword);
    //     // $this->db->or_like('weight', $keyword);
    //     //menampilkan pencarian secara keseluruhan
    //     return $this->db->get('electre_criterias')->result_array();
    // }

} 