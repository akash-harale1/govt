<?php

defined('BASEPATH') or exit('No direct script access allowed');


class DashboardModel extends CI_Model
{
    public function get_data()
    {   
       
        $data["news"]= $this->db->get("news")->num_rows();
        $data["broadcast"]=$this->db->get("broadcast")->num_rows();
        $data["person"]=$this->db->get("person")->num_rows();
        $data["notification"]=$this->db->get("notification")->num_rows();
        $data["family"]=$this->db->get("family")->num_rows();
        return $data;
    }


}
