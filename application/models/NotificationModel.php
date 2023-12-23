<?php

defined('BASEPATH') or exit('No direct script access allowed');


class NotificationModel extends CI_Model
{
    public function add_notification($data)
    {
        unset($data["save"]);
        $result=$this->db->insert("notification", $data);
        return $result;
    }
    public function check_person_id($id)
    {
        $r=$this->db->where("person_id",$id)->get("person")->num_rows();
        return $r;

    }

    public function get_notifications()
    {
        $query = $this->db->get('notification');
        return $query->result();
    }
    public function delte_notification($id)
    {
        $result = $this->db->where('notification_id', $id)->delete('notification');

        return $result;
    }
 


}
