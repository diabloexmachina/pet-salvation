<?php

//Author Moshi Musukwa

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

        public function __construct(){

              $this->load->helper('date');
              $this->load->database();

        }

        public function get_admin($username = FALSE){

              $query = $this->db->get_where('user', array('username' => $username));
              return $query->row_array();
        
        }

        public function set_admin(){

              $data = array(

                  'username' => $this->input->post('username'),
                  'email' => $this->input->post('email'),
                  'password' => $this->input->post('password'),
                  
              );

              return $this->db->insert('admin', $data);
        }


        public function check_username_exists($username){
            
            
              $this->db->select('*'); 
              $this->db->from('admin');
              $this->db->where('username', $username);
              $query = $this->db->get();


              if ( $query->num_rows() > 0 ){

                  return TRUE;

              }else{

                  return FALSE;
              }
        }


        public function check_email_exists($email){
            
            
              $this->db->select('*'); 
              $this->db->from('admin');
              $this->db->where('email', $email);
              $query = $this->db->get();


              if ( $query->num_rows() > 0 ){

                  return TRUE;
                  
              }else{

                  return FALSE;
              }
        }


        public function authenticate_admin(){


              $array = array(
                'username' =>$this->input->post('username'), 
                'password' =>$this->input->post('password'),
              );

              $this->db->select('*'); 
              $this->db->from('admin');
              $this->db->where($array);
              $query = $this->db->get();


              if ( $query->num_rows() > 0 ){

                  $row = $query->row_array();
                  return $row;
              }
        }
}
