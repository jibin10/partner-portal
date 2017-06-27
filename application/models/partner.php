<?php
Class Partner extends CI_Model
{
 
 function register($data)
 {
	 $this->db->insert('partner', $data);
 }
 
}
?>