<?php
class M_cart extends CI_Model
{
 function fetch_all()
 {
  $query = $this->db->get("table_barang");
  return $query->result();
 }
}
