<?php
class M_criteria extends CI_Model{
 
    function criteria_list(){
        $hasil=$this->db->query("SELECT * FROM electre_criterias");
        return $hasil->result();
    }
 
    function simpan_criteria($idcriteria,$criteria,$code,$weight){
        $hasil=$this->db->query("INSERT INTO electre_criterias (id_criteria,criteria,code,weight)VALUES('$idcriteria','$criteria','$code','$weight')");
        return $hasil;
    }
 
    function get_criteria_by_id($idcriteria){
        $hsl=$this->db->query("SELECT * FROM electre_criterias WHERE id_criteria='$idcriteria'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_criteria' => $data->id_criteria,
                    'criteria' => $data->criteria,
                    'code' => $data->code,
                    'weight' => $data->weight,
                    );
            }
        }
        return $hasil;
    }
 
    function update_criteria($idcriteria,$criteria,$code,$weight){
        $hasil=$this->db->query("UPDATE electre_criterias SET criteria='$criteria',code='$code',weight='$weight' WHERE id_criteria='$idcriteria'");
        return $hasil;
    }
 
    function hapus_criteria($idcriteria){
        $hasil=$this->db->query("DELETE FROM electre_criteria WHERE id_criteria='$idcriteria'");
        return $hasil;
    }
     
}