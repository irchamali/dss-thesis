<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_model extends CI_Model
{
    public function getLabel()
    {
        $data = $this->db->query("SELECT * from electre_alternatives");
        return $data->result();
    }

    public function getSumVal()
    {
        $query = $this->db->query("SELECT id_alternative, SUM(value) as val FROM electre_evaluations GROUP BY id_alternative");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $val[] = $row;
            }

            return $val;
        }
    }

    public function getDataBar()
    {
        $query = $this->db->query("SELECT id_alternative, SUM(result) as result FROM electre_alternatives GROUP BY id_alternative");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $result[] = $row;
            }

            return $result;
        }
    }

    public function getDataPie()
    {
        $query = $this->db->query("SELECT COUNT(new_info) as pie FROM electre_alternatives GROUP BY new_info");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $pie[] = $row;
            }

            return $pie;
        }
    }

    function getDataValue1()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='1'");
        $jumVal1 = $query->row()->value;
        return $jumVal1;
    }

    function getDataValue2()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='2'");
        $jumVal2 = $query->row()->value;
        return $jumVal2;
    }

    function getDataValue3()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='3'");
        $jumVal3 = $query->row()->value;
        return $jumVal3;
    }

    function getDataValue4()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='4'");
        $jumVal4 = $query->row()->value;
        return $jumVal4;
    }

    function getDataValue5()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='5'");
        $jumVal5 = $query->row()->value;
        return $jumVal5;
    }

    function getDataValue6()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='6'");
        $jumVal6 = $query->row()->value;
        return $jumVal6;
    }

    function getDataValue7()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='7'");
        $jumVal7 = $query->row()->value;
        return $jumVal7;
    }

    function getDataValue8()
    {
        $query = $this->db->query("SELECT SUM(value) as value FROM electre_evaluations WHERE id_alternative='8'");
        $jumVal8 = $query->row()->value;
        return $jumVal8;
    }
}
