<?php

defined('BASEPATH') or exit('No direct script access allowed');


class BroadcastModel extends CI_Model
{
    public function add_broadcast($data)
    {
        unset($data["save"]);
        $result=$this->db->insert("broadcast", $data);
        return $result;
    }
    

    public function get_broadcasts()
    {
        $query = $this->db->get('broadcast');
        return $query->result();
    }
    public function delete_broadcast($id)
    {
        $result = $this->db->where('broadcast_id', $id)->delete('broadcast');

        return $result;
    }
 


}
