<?php
namespace App\Models;
 
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
  
class Main_model extends Model
{
  
  
  
    public function getCountries()
    {
        $this->db->from('countries');
        $query=$this->db->get();
        return $query->result();
    }
      
  
    public function getStates($postData)
    {
        $this->db->from('states');
        $this->db->where('country_id',$postData['country_id']);
        $query=$this->db->get();
        return $query->result();
    } 
 
    public function getCities($postData)
    {
        $this->db->from('cities');
        $this->db->where('state_id',$postData['state_id']);
        $query=$this->db->get();
        return $query->result();
    }
 
  
}