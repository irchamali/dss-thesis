<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahDataUser()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "role_id" => $this->input->post('role_id', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        $this->db->insert('user', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function ubahDataUser()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "role_id" => $this->input->post('role_id', true)
        ]; //urutkan sesuai dengan field yg tampil //true untuk mengamnkan data yg dikirim
        //bedanya dengan insert ada pada penambahan 'where' sebelum 'update'
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function getDataAlternative()
    {
        $query = $this->db->query("SELECT * FROM `electre_alternatives`");
        $jumAlt = $query->num_rows();
        return $jumAlt;
    }

    public function getDataCriteria()
    {
        $query = $this->db->query("SELECT * FROM `electre_criterias`");
        $jumCrt = $query->num_rows();
        return $jumCrt;
    }

    public function getDataSubcriteria()
    {
        $query = $this->db->query("SELECT * FROM `electre_subcriterias`");
        $jumSubCrt = $query->num_rows();
        return $jumSubCrt;
    }

    public function getDataUser()
    {
        $query = $this->db->query("SELECT * FROM `user`");
        $jumUser = $query->num_rows();
        return $jumUser;
    }
}
