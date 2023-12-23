<?php

defined('BASEPATH') or exit('No direct script access allowed');


class PersonModel extends CI_Model
{
    public function add_person($data)
    {
        unset($data["save"]);
        $result=$this->db->insert("person", $data);
        return $result;
    }
    public function check_family_id($id)
    {
        $r=$this->db->where("family_id",$id)->get("family")->num_rows();
        return $r;

    }

    public function get_persons()
    {
        $query = $this->db->get('person');
        return $query->result();
    }

    public function get_person($id)
    {
        $this->db->where('person_id', $id);
        $query = $this->db->get('person');
        return $query->result_array();
    }

    public function update_person($data, $person_id)
    {

        unset($data["save"]);

        $result = $this->db->where("person_id", $person_id)->update("person", $data);
        return $result;
    }


    public function delete_person($id)
    {
        $result = $this->db->where('person_id', $id)->delete('person');

        return $result;
    }
}
