<?php
class messages_model extends CI_Model {

 
    public function get_messages(){
       $this->db->where('user_id', $this->session->userdata('id'));
       $query = $this->db->get('messages');
       return $query->result();
    }

   public function get_answers($message_id){
   $rough_answers = $this->get_rough_answers($message_id);
   $answers = array();
   foreach($rough_answers as $answer){
      $answers[$answer->id] = $answer->answer_text;
   }
   return $answers;
    }

    public function get_rough_answers($message_id){
       $this->db->where('message_id', $message_id);
       $query = $this->db->get('answers');       
       return $query->result();
    }

    public function insertmessage($data){
       return $this->db->insert('messages', $data);    
    }
}