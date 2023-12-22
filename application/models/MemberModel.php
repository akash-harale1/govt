<?php
class MemberModel extends CI_Model{
        public function getMembers(){
                $query=$this->db->get('members');
                return $query->result();
           }

        public function storeMember($data){
        
            $this->db->insert('members',$data);
            return $this->db->insert_id();
        }
        
        public function updateLoginToken($token,$userid){
                $this->db->query("UPDATE users SET logintoken='$token' WHERE id=$userid");
        }

        public function checkMembers($mobile,$pwd){
                $this->db->where('contact', $mobile);
                $this->db->where('pwd',$pwd);
                $query=$this->db->get('users');
                return $query->row();
        }
        
        public function getMember($userid){
                $this->db->where('id',$userid);
                $query=$this->db->get('users');
                return $query->row();
        }
}