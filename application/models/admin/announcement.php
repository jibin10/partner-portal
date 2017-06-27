<?php
Class Announcement extends CI_Model
{
 
 function add_announcement($data)
 {
	 $this->db->insert('announcements', $data);
 }
 
 function get_announcement()
 {
	 $query=$this->db->get('announcements');
     return $query->result_array();
 }
 
}
?>