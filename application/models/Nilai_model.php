<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
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
        return 'value';
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
            'select a.id_alternative, a.name_alt, c.id_criteria, v.value FROM electre_alternatives a, electre_evaluations v, electre_criterias c where a.id_alternative = v.id_alternative AND c.id_criteria = v.id_criteria AND a.id_alternative = ' . $id . ' GROUP by v.value'
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
            'select a.id_alternative, a.name_alt, c.id_criteria, c.criteria, v.value FROM electre_alternatives a, electre_evaluations v, electre_criterias c WHERE a.id_alternative = v.id_alternative AND c.id_criteria = v.id_criteria'
        );
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $value[] = $row;
            }
            return $value;
        }
    }
}
