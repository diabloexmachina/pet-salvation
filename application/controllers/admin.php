<?php
//Author:Moshi Musukwa

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

        public function __construct(){

            parent::__construct();
            $this->load->model('admin_model');
            $this->load->model('listing_model');
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
        
        }


        public function login(){

          if(!$this->session->userdata('logged_in')){


              $data['title'] = 'Login';
              $data['formtitle'] = 'Login';
              $this->load->view('templates/header', $data);
              $this->load->view('admin/login', $data);
              $this->load->view('templates/footer');
              $this->session->sess_destroy();

          }else{

              redirect('admin/home');
          }


        }
		
		
		    public function home(){

             if($this->session->userdata('logged_in')){


                $total_offset=0;

                $config['base_url'] = base_url() . "admin/home";
                $total=$this->listings_model->get_listing($id=FALSE,$keyword=NULL,$limit=NULL,$total_offset);
                $total_num_rows=count($total);

                $config['total_rows']=$total_num_rows;
                $config['per_page'] = 2;
                $config['uri_segment'] = 3;
                $config['use_page_numbers'] = TRUE;
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] ='<li class="active"><span><b>';
                $config['cur_tag_close'] = "</b></span></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tag_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tag_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tag_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tag_close'] = "</li>";
                $config['display_pages'] = FALSE;
               //$config['num_links'] = 2;
 
                $offset = ($this->uri->segment(3))?(($this->uri->segment(3)-1)*$config['per_page']):0;

                $this->pagination->initialize($config);

                $data['listings']=$this->listing_model->get_listing($id=FALSE,$keyword='',$config['per_page'],$offset);

                $data['links']=$this->pagination->create_links();


						    $this->load->view('templates/header', $data);
						    $this->load->view('admin/home', $data);
						    $this->load->view('templates/footer');


          
             }else{

                $this->session->set_flashdata('status_message','Please login to view listings.');
                redirect('admin/login');
             }

          


        }
		


        public function authenticate(){

            if(!$this->session->userdata('logged_in')){

              //set rules for error checking
                $this->form_validation->set_rules('username', 'User Name', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
			  
              //if validation failed redisplay the login form

                if ($this->form_validation->run() === FALSE){

                    $data['title'] = 'Login';
                    $data['formtitle'] = 'Login';
                
              	    $this->load->view('templates/header', $data);
              	    $this->load->view('admin/login', $data);
              	    $this->load->view('templates/footer');

                }else{//if form validation was a success compare login data against database or use active directory integration the set the session data

              	       if($result=$this->admin_model->authenticate_admin()){

              	               $success_message='You are now logged into the system.';

                                $userdata = array(
                                  'name' => $result['name'],
                                  'username' =>$result['username'],
                                  'email' => $result['email'],
                                  'logged_in'=>TRUE
                                );

                                $this->session->set_userdata($userdata);
              	                $this->session->set_flashdata('login_success',$success_message);

                        

                                if($this->session->userdata('logged_in')===TRUE){
                        
                                      redirect("admin/home");

                                }else{
							
						                          $this->session->set_flashdata('login_error','Your credentials are not valid!');	
						                          redirect("admin/login");
							
						                    }

                        }else{

                              $this->session->set_flashdata('login_error','Your credentials are not valid!');
                              redirect("admin/login");
                        }
                }

             

            }else{

                   
                    if($this->session->userdata('logged_in')===TRUE){
                        
                          redirect("admin/home");
                    }
            }
        }



//delete/unset session variables and log user out
        
        public function logout(){
 
			        $this ->session ->set_userdata(array('logged_in'=> false));
			        redirect('admin/login');
        
        
        }


//create user.not necessary in final version
        public function create() {

        	    $data['title'] = 'Register';
              $data['formtitle'] = 'Register';

              //set rules for error checking
              $this->form_validation->set_rules('username', 'User Name', 'required');//revisit
              $this->form_validation->set_rules('email', 'Email', 'required');
              $this->form_validation->set_rules('password', 'Password', 'required');//revisit
              $this->form_validation->set_rules('passwordconfirm', 'Confirm Password', 'required|matches[password]');

              //if validation failed redisplay the form

              if ($this->form_validation->run() === FALSE) {

              	   $this->load->view('templates/header', $data);
              	   $this->load->view('admin/create', $data);
              	   $this->load->view('templates/footer');

              }else{//if validation was a success enter data into database and show the user a success message.

              	   $this->admin_model->set_admin();
              	   $success_message='You have been registered.You can now login to access the system.';
              	   $this->session->set_flashdata('status_message',$success_message);
              	   redirect("admin/login");
              }

        }

}