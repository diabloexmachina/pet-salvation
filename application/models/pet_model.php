<?php

//Author:Moshi Musukwa

if(!defined('BASEPATH')) exit('No direct script access allowed');

class pet_model extends CI_Model {


        public function __construct(){
              $this->load->helper('date');
              $this->load->database();
        }

        public function pet_count() {
 
           return $this->db->count_all('pets');
 
        }

        //request functions
        public function get_pet($id=FALSE,$keyword='',$limit=NULL,$offset=NULL){

              $keyword=$keyword;

              if($keyword!==''){

                  $this->db->select('*');
                  $this->db->from('pets');
                  $this->db->like('pet_id',$keyword);
                  $this->db->or_like('description',$keyword);
                  $this->db->or_like('town',$keyword);
                  $this->db->or_like('province',$keyword);
                  

                  if($limit!==NULL && $offset!==NULL){

                     $this->db->limit($limit,$offset);

                  }
                     $query = $this->db->get();
                     return $query->result_array();  

              }


              if($keyword=='' && $id==FALSE){

                  $this->db->select('*');
                  $this->db->from('pets');

                  if($limit!==NULL && $offset!==NULL){

                     $this->db->limit($limit,$offset);

                  }
                     $query = $this->db->get();
                     return $query->result_array();  

              }

            
            //part of function that gets requests by id

              if($id!==FALSE){

                    $query = $this->db->get_where('pets', array('pet_id' => $id));
                    return $query->row_array();

              }
        
        }

        public function set_pet($file_names=NULL){


              $data = array(

                  'posted_by' => $this->input->post('posted_by'),
                  'description' => $this->input->post('description'),
                  'area' => $this->input->post('area'),
                  'town' => $this->input->post('town'),
                  'province' => $this->input->post('province'),
                  'email' => $this->input->post('email'),
                  'telephone' => $this->input->post('phonenumber'),
                  'photos'=>($file_names!==NULL?implode(",", $file_names): NULL),
                  //'longitude' => $this->input->post('longitude'),
                  //'latitude' => $this->input->post('latitude'),
                  'date_posted' => mdate('%Y-%m-%d %H:%i:%s', now())
              );

              return $this->db->insert('pets',$data);
        }


        public function delete_pet($id){

                  $this->db->where('pet_id', $id);
                  $query=$this->db->delete('pets');
                  return $query;


        }


        public function update_pet($id=FALSE,$file_names=NULL){

              $id=$id;

              $data = array(

                  'posted_by' => $this->input->post('posted_by'),
                  'description' => $this->input->post('description'),
                  'area' => $this->input->post('area'),
                  'town' => $this->input->post('town'),
                  'province' => $this->input->post('province'),
                  'email' => $this->input->post('email'),
                  'telephone' => $this->input->post('phonenumber'),
                  'photos'=>($file_names!==NULL?implode(",", $file_names): NULL),
                  //'longitude' => $this->input->post('longitude'),
                  //'latitude' => $this->input->post('latitude'),
                  'date_posted' => mdate('%Y-%m-%d %H:%i:%s', now())
              );


              

                $this->db->where('pet_id', $id);
                $query = $this->db->update('pets',$data);
                return $query;


        }


        public function set_pet_comment($id){

              $data = array(

                  'pet_id' => $this->input->post('id'),
                  'posted_by'=>$this->session->userdata('name'),
                  'category' => $this->input->post('category'),
                  'comment' => $this->input->post('comment')
              );

              return $this->db->insert('pet_comments', $data);
        }


        public function delete_pet_comment($id){

              $data = array(

                  'pet_id' => $this->input->post('id'),
                  'posted_by'=>$this->session->userdata('name'),
                  'category' => $this->input->post('category'),
                  'comment' => $this->input->post('comment')
              );

              return $this->db->insert('pet_comments', $data);
        }



        public function get_pet_comments($id){

              $query = $this->db->get_where('pet_comments', array('pet_id' => $id));
              return $query->result_array();
        
        }



}
