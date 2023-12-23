<?php

defined('BASEPATH') or exit('No direct script access allowed');


class FamilyModel extends CI_Model
{
    public function add_family($data)
    {
        unset($data["save"]);
        $this->db->insert("family", $data);
        return true;
    }

    public function get_families()
    {
        $query = $this->db->get('family');
        return $query->result();
    }

    public function get_family($userid)
    {
        $this->db->where('family_id', $userid);
        $query = $this->db->get('family');
        return $query->result_array();
    }

    public function update_family($data, $family_id)
    {

        unset($data["save"]);
        $result = $this->db->where("family_id", $family_id)->update("family", $data);
        return $result;
    }


    public function delete_family($userid)
    {
        $result = $this->db->where('family_id', $userid)->delete('family');

        return $result;
    }
}
