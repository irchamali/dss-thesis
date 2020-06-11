<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation_model extends CI_Model{
    public function getAllEvaluation()
    {
        // $query = $this->db->get('electre_criterias');
        // return $query->result_array(); //baca query builder pada documentasi CI
        //lebih simplenya gini nih:
        return $this->db->get('electre_evaluations')->result_array(); //tanpa select * from 
        // $this->db->order_by('id_alternative', 'id_criteria');
    } 

    public function getDataCriteria(){
        return $this->db->query("SELECT * FROM `electre_criterias`")->result();
    }

    public function getDataAlternative(){
        return $this->db->query("SELECT * FROM `electre_alternatives`")->result();
    }

    public function getSelectEval(){
        return $this->db->query("SELECT * FROM electre_evaluations ORDER BY id_alternative,id_criteria")->result();
    }

    public function LuasSegitiga($alas,$tinggi) {
		return 0.5*$alas*$tinggi;
    }
    
    public function LuasPersegi($sisi) {
		return $sisi*$sisi;
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

    public function getEvaluationById($id)
    {
        return $this->db->get_where('electre_evaluations', ['id_alternative'=>$id])->row_array();
    }

    public function ubahDataEvaluation()
    {
        $data = [
            "id_alternative" => $this->input->post('id_alternative', true),
            "id_criteria" => $this->input->post('id_criteria', true),
            "value" => $this->input->post('value', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        //bedanya dengan insert ada pada penambahan 'where' sebelum 'update'
        $this->db->where('id_alternative', $this->input->post('id_alternative'));
        $this->db->update('electre_evaluations', $data);
    }

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