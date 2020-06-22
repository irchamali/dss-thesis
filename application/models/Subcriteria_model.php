<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcriteria_model extends CI_Model
{
    public $id_subcriteria;
    public $id_criteria;
    public $subcriteria;
    public $value;

    public function __construct()
    {
        parent::__construct();
    }

    public function getDataSub()
    {
        return $this->db->query("SELECT * FROM `electre_subcriterias`")->result();
    }

    private function getTable()
    {
        return 'electre_subcriterias';
    }

    private function getData()
    {
        $data = array(
            'id_subcriteria' => $this->id_subcriteria,
            'subcriteria' => $this->subcriteria,
            'value' => $this->value
        );
        return $data;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $subcriterias[] = $row;
            }
            return $subcriterias;
        }
    }

    public function getById()
    {
        $this->db->where('id_criteria', $this->id_criteria);
        $query = $this->db->get($this->getTable());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $subcriteria[] = $row;
            }
            return $subcriteria;
        }
    }

    public function insert()
    {
        $data = $this->getData();
        $this->db->insert($this->getTable(), $data);
        return $this->db->insert_id();
    }

    public function update()
    {
        $data = $this->getData();
        $this->db->where('id_subcriteria', $this->id_subcriteria);
        $this->db->where('id_criteria', $this->id_criteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id_criteria', $id);
        return $this->db->delete($this->getTable());
    }
}
