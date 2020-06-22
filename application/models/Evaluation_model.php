<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation_model extends CI_Model
{
    public $id_alternative;
    public $id_criteria;
    public $value;

    public function __construct()
    {
        parent::__construct();
    }

    private function getTable()
    {
        return 'electre_evaluations';
    }

    private function getData()
    {
        $data = array(
            'id_alternative' => $this->id_alternative,
            'id_criteria' => $this->id_criteria,
            'value' => $this->value
        );
        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getValueByAlternative($id)
    {
        $query = $this->db->query(
            'SELECT u.id_alternative, u.alternative, k.id_criteria, n.value FROM electre_alternatives u, electre_evaluations n, electre_criterias k, electre_subcriterias sk WHERE u.id_alternative = n.id_alternative AND k.id_criteria = n.id_criteria AND k.id_criteria = sk.id_criteria AND u.id_alternative = ' . $id . ' GROUP BY n.value '
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $value[] = $row;
            }

            return $value;
        }
    }

    public function getValueAlternative()
    {
        $query = $this->db->query(
            'SELECT u.id_alternative, u.alternative, k.id_criteria, k.criteria ,n.value FROM electre_alternatives u, electre_evaluations n, electre_criteria k WHERE u.id_alternative = n.id_alternative AND k.id_criteria = n.id_criteria '
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $value[] = $row;
            }

            return $value;
        }
    }

    public function update()
    {
        $data = array('value' => $this->value);
        $this->db->where('id_alternative', $this->id_alternative);
        $this->db->where('id_criteria', $this->id_criteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id_alternative', $id);
        return $this->db->delete($this->getTable());
    }




    // Batas model baru dgn lama
    public function getAllEvaluation()
    {
        return $this->db->get('electre_evaluations')->result_array(); //tanpa select * from 
        // $this->db->order_by('id_alternative', 'id_criteria');
    }

    public function getDataCriteria()
    {
        return $this->db->query("SELECT * FROM `electre_criterias`")->result();
    }

    public function getDataAlternative()
    {
        return $this->db->query("SELECT * FROM `electre_alternatives`")->result();
    }

    public function getSelectEval()
    {
        return $this->db->query("SELECT * FROM electre_evaluations ORDER BY id_alternative,id_criteria")->result();
    }

    public function LuasSegitiga($alas, $tinggi)
    {
        return 0.5 * $alas * $tinggi;
    }

    public function LuasPersegi($sisi)
    {
        return $sisi * $sisi;
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
        return $this->db->get_where('electre_evaluations', ['id_alternative' => $id])->row_array();
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
