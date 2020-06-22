<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Criteria_model extends CI_Model
{
    public $id_criteria;
    public $criteria;
    public $weight_id;

    public function __construct()
    {
        parent::__construct();
    }

    private function getTable()
    {
        return 'electre_criterias';
    }

    private function getData()
    {
        $data = array(
            'criteria' => $this->criteria,
            'weight_id' => $this->weight_id
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $criterias[] = $row;
            }
            return $criterias;
        }
    }

    public function getById()
    {
        $this->db->from($this->getTable());
        $this->db->where('id_criteria', $this->id_criteria);
        $query = $this->db->get();

        return $query->row();
    }

    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id_criteria', $id);
        return $this->db->delete($this->getTable());
    }

    public function getLastID()
    {
        $this->db->select('id_criteria');
        $this->db->order_by('id_criteria', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

    public function getWeightCriteria()
    {
        $query = $this->db->query('select kriteria, bobot from kriteria');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $weight_id[] = $row;
            }
            return $weight_id;
        }
    }



    // Batas
    public function getAllCriteria()
    {
        // $query = $this->db->get('electre_criterias');
        // return $query->result_array(); //baca query builder pada documentasi CI
        //lebih simplenya gini nih:
        return $this->db->get('electre_criterias')->result_array(); //tanpa select * from 
    }

    public function getWeight()
    {
        $query = "SELECT `electre_criterias`.*, `electre_weight`.`weight`
                  FROM `electre_criterias` JOIN `electre_weight`
                  ON `electre_criterias`.`weight_id` = `electre_weight`.`id`
                  ";
        return $this->db->query($query)->result_array();
    }


    public function tambahDataCriteria()
    {
        $data = [
            "criteria" => $this->input->post('criteria', true),
            "code_crt" => $this->input->post('code_crt', true),
            "weight" => $this->input->post('weight_id', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        $this->db->insert('electre_criterias', $data);
    }

    public function hapusDataCriteria($id)
    {
        // $this->db->where('id_criteria', $id);
        // $this->db->delete('electre_criterias');
        //diatas adalah cara pertama: dengan method dua baris
        $this->db->delete('electre_criterias', ['id_criteria' => $id]);
    }

    public function getCriteriaById($id)
    {
        return $this->db->get_where('electre_criterias', ['id_criteria' => $id])->row_array();
    }

    public function ubahDataCriteria()
    {
        $data = [
            "criteria" => $this->input->post('criteria', true),
            "code_crt" => $this->input->post('code_crt', true),
            "weight_id" => $this->input->post('weight_id', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        //bedanya dengan insert ada pada penambahan 'where' sebelum 'update'
        $this->db->where('id_criteria', $this->input->post('id_criteria'));
        $this->db->update('electre_criterias', $data);
    }

    public function cariDataCriteria()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('criteria', $keyword);
        // $this->db->or_like('code_crt', $keyword);
        // $this->db->or_like('weight', $keyword);
        //menampilkan pencarian secara keseluruhan
        return $this->db->get('electre_criterias')->result_array();
    }
}
