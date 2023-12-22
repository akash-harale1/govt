<?php
class UserModel extends CI_Model
{
        public function getUsers()
        {
                $query = $this->db->get('admin');
                return $query->result();
        }

        public function storeUser($data)
        {

                $this->db->insert('admin', $data);
                return $this->db->insert_id();
        }
        public function updateLoginToken($token, $userid)
        {
                $this->db->query("UPDATE admin SET logintoken='$token' WHERE admin_id=$userid");
        }

        public function checkUser($mobile, $pwd)
        {
                $this->db->where('email', $mobile);
                $this->db->where('password', $pwd);
                $query = $this->db->get('Admin');
                return $query->row();
        }
        public function getUser($userid)
        {
                $this->db->where('admin_id', $userid);
                $query = $this->db->get('admin');
                return $query->row();
        }
}