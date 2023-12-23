<?php

defined('BASEPATH') or exit('No direct script access allowed');


class NewsModel extends CI_Model
{
    public function add_news($data)
    {
        unset($data["save"]);
        $result=$this->db->insert("news", $data);
        return $result;
    }
  

    public function get_newses()
    {
        $query = $this->db->get('news');
        return $query->result();
    }

    public function get_news($id)
    {
        $this->db->where('news_id', $id);
        $query = $this->db->get('news');
        return $query->result_array();
    }

    public function update_news($data, $id)
    {

        unset($data["save"]);

        $result = $this->db->where("news_id", $id)->update("news", $data);
    return $result;
      
    }


    public function delete_news($id)
    {
        $result = $this->db->where('news_id', $id)->delete('news');

        return $result;
    }
}
