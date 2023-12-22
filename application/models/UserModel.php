<?php
class UserModel extends CI_Model{
        public function getUsers(){
                $query=$this->db->get('users');
                return $query->result();
           }

        public function storeUser($data){
        
            $this->db->insert('users',$data);
            return $this->db->insert_id();
        }
         public function updateLoginToken($token,$userid){
                $this->db->query("UPDATE users SET logintoken='$token' WHERE id=$userid");
            }

        public function checkUser($mobile,$pwd){
                $this->db->where('contact', $mobile);
                $this->db->where('pwd',$pwd);
                $query=$this->db->get('users');
                return $query->row();
        }
        public function getUser($userid){
                $this->db->where('id',$userid);
                $query=$this->db->get('users');
                return $query->row();
        }
}