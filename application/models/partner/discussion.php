<?php
Class Discussion extends CI_Model
{
 
 function add_topic($data)
 {
	 $this->db->insert('topic', $data);
 }
 
 function get_topic()
 {
	 $query=$this->db->get('topic');
     return $query->result_array();
 }
 
}
?>