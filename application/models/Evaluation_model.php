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

    public function getAlternativeById($id)
    {
        return $this->db->get_where('electre_evaluations', ['id_criteria' => $id])->row_array();
    }

    public function getValueAlternativeById($id)
    {
        $query = $this->db->query(
            'SELECT u.id_alternative, u.alternative, k.id_criteria, k.criteria ,n.value FROM electre_alternatives u, electre_evaluations n, electre_criterias k WHERE k.id_criteria = ' . $id . ' GROUP BY n.id_criteria'
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
            'SELECT u.id_alternative, u.alternative, k.id_criteria, k.criteria ,n.value FROM electre_alternatives u, electre_evaluations n, electre_criterias k WHERE u.id_alternative = n.id_alternative AND k.id_criteria = n.id_criteria '
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

    public function getDataCriteria()
    {
        return $this->db->query("SELECT * FROM `electre_criterias`")->result();
    }

    public function getDataAlternative()
    {
        return $this->db->query("SELECT * FROM `electre_alternatives`")->result();
    }

    public function LuasSegitiga($alas, $tinggi)
    {
        return 0.5 * $alas * $tinggi;
    }

    public function LuasPersegi($sisi)
    {
        return $sisi * $sisi;
    }
}
