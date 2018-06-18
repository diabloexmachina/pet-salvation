<?php 

//Author:Moshi Musukwa
if(!defined('BASEPATH')) exit('No direct script access allowed');

class pet extends CI_Controller {

        public function __construct(){
          
                parent::__construct();
                $this->load->helper('file');
                $this->load->model('pet_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->library('email');
                $this->load->library('upload');
                
        }

        //displays all pets
        public function index($offset=''){

                $total_offset=0;
                $total=$this->pet_model->get_pet($id=FALSE,$keyword=NULL,$limit=NULL,$total_offset);

                $config['base_url'] = base_url() . "pet/index";
                $total_num_rows=count($total);

                $config['total_rows']=$total_num_rows;
                $config['per_page'] = 4;
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
                $config['display_pages'] = TRUE;
               //$config['num_links'] = 2;
 
                $offset = ($this->uri->segment(3))?(($this->uri->segment(3)-1)*$config['per_page']):0;

                $this->pagination->initialize($config);

                $data['pets']=$this->pet_model->get_pet($id=FALSE,$keyword='',$config['per_page'],$offset);

                $data['links']=$this->pagination->create_links();


				        if(empty($data['pets'])){


						              $data['title'] = 'Latest Pets';
						              $data['message'] = 'There are currently no pets to display.';

						              $this->load->view('templates/header', $data);
						              $this->load->view('pet/message', $data);
						              $this->load->view('templates/footer'); 

				        }else{
                          
                        $data['title'] = 'Missing Pets';

                        if(!$this->input->is_ajax_request()){

                             $this->load->view('templates/header', $data);

                        }
                             $this->load->view('pet/index', $data);

                        if(!$this->input->is_ajax_request()){

                             $this->load->view('templates/footer');

                        }

				        }


      }

        //function to show a single pet
     

      public function show_pet($id=FALSE){

                  $category="pet"; 
                  $data['pet']=$this->pet_model->get_pet($id,$keyword="",$limit=NULL,$offset=NULL);

                  /*
                  if($this->request_model->get_pet_comments($id)){

                        $data['comments']=$this->pet_model->get_pet_comments($id);

                  }
                  */

                  if (empty($data['pet'])){

                        show_404();

                  }

                  $data['title'] = $data['pet']['title'];

                  $this->load->view('templates/header', $data);
                  $this->load->view('pet/show_pet', $data);//show view will change
                  $this->load->view('templates/footer');

             
      }


      public function create_pet() {

            //if($this->session->userdata('logged_in')){
                  $data['formtitle'] = 'Enter Details';
                  $data['title'] = 'pet';

              //set rules for error checking
                            $this->form_validation->set_rules('posted_by', 'Posted By', 'required');
                            $this->form_validation->set_rules('town', 'Town', 'required');
                            $this->form_validation->set_rules('province', 'Province', 'required');
                            $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|min_length[10]|max_length[10]');
                            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                            $this->form_validation->set_rules('area', 'Area', 'required');
                            $this->form_validation->set_rules('description', 'Description', 'required');
                           
              //if validation failed redisplay the form

                  if($this->form_validation->run() === FALSE){

                           $this->load->view('templates/header', $data);
                           $this->load->view('pet/pet_form', $data);
                           $this->load->view('templates/footer');

                  }else{


                       $file_tag_name = 'multipleFiles';
                      //check if file present before file upload
                       if (count($_FILES['multipleFiles']['name'])>0){

                                  $number_of_files_uploaded=count($_FILES['multipleFiles']['name']);
                                  $files=$_FILES;
                                  $file_names=array();

                                  if(!is_dir('uploads')){
                                    mkdir('./uploads',777,true);   
                                  }


                                  //upload each file in file array
                                  for($i=0;$i<$number_of_files_uploaded;$i++){

                                       $_FILES['multipleFiles']['name']=$files['multipleFiles']['name'][$i];
                                       $_FILES['multipleFiles']['type']=$files['multipleFiles']['type'][$i];
                                       $_FILES['multipleFiles']['tmp_name']=$files['multipleFiles']['tmp_name'][$i];
                                       $_FILES['multipleFiles']['size']=$files['multipleFiles']['size'][$i];
                                       $_FILES['multipleFiles']['error']=$files['multipleFiles']['error'][$i];

                                       $upload_path='./uploads/';
                                       $config['upload_path'] = $upload_path;
                                       $config['allowed_types'] ='png|jpg|gif';
                                       $config['max_size'] = '2048';
                                       $config['overwrite'] = TRUE;
                                       $config['remove_spaces'] = TRUE;


                                       $this->upload->initialize($config);

                                       if($this->upload->do_upload($file_tag_name)){

                                            $file_name=$this->upload->data('file_name');
                                            array_push($file_names,$file_name);
                                            
                
                                       }else{

                                            //file uploaded has errors

                                            $data['upload_error']= $this->upload->display_errors('<p class="text-center">', '</p>');
                                            $this->load->view('templates/header',$data);
                                            $this->load->view('pet/pet_form',$data);
                                            $this->load->view('templates/footer');
             
                                       }


                                  }

                                  //upload done now save file names to database
                                  $this->pet_model->set_pet($file_names);
                                  $this->session->set_flashdata('status_message','The pet was successfully submitted.A file was attached.');
                                  redirect('pet/index');
                
            
                      }else{
                                 //no files to upload
                                  $this->pet_model->set_pet($file_names=NULL);
                                  $this->session->set_flashdata('status_message','The pet was successfully submitted.No images were uploaded');
                                   redirect('pet/index'); 
                                    

                     }            

                  }



              //}else{

                    //$this->session->set_flashdata('status_message','Please login to submit ads.');
                    //redirect('admin/login');
              //}

        }

        public function edit_pet($id=FALSE) {

                  //if($this->session->userdata('logged_in')){
                      $category="pet";
                      $data['formtitle'] = 'Edit pet';
                      $data['title'] = 'Edit pet';
                      $data['pet']=$this->pet_model->get_pet($id,$keyword='',$limit=NULL,$offset=NULL);

                      if (empty($data['pet'])){
                          show_404();
                      }else{

                          $this->load->view('templates/header', $data);
                          $this->load->view('pet/pet_form', $data);
                          $this->load->view('templates/footer');

                      }

                  //}else{

                        //$this->session->set_flashdata('status_message','Please login to edit request.');
                        //redirect('/login');
                  //}

        }

              //function to update a pet
        public function update_pet($id=FALSE) {

                    //if($this->session->userdata('logged_in')){
                             $category="pet";
                             $id=$id;
                             if ($id===FALSE){
                                    show_404();
                             }

                         //set rules for error checking
                            $this->form_validation->set_rules('pet_name', 'pet Name', 'required');
                            $this->form_validation->set_rules('town', 'Town', 'required');
                            $this->form_validation->set_rules('province', 'Province', 'required');
                            $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|numeric|min_length[10]|max_length[10]');
                            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|');
                            $this->form_validation->set_rules('area', 'Area', 'required');
                            $this->form_validation->set_rules('Pets', 'Pets', 'required');
                            //$this->form_validation->set_rules('latitude', 'Latitude', 'required');
                            //$this->form_validation->set_rules('longitude', 'Longitude', 'required');
                

                            if ($this->form_validation->run() === FALSE) {//check if form entries are valid

                                //redisplay edit form with error message
                                  $this->edit_pet($id);

                            }else{//form entries are valid so proceed

                                  //if validation was a success enter data into database and show the user a success message.
                                  $this->pet_model->update_pet($id);
                                  $this->session->set_flashdata('status_message','The pet was successfully updated.');
                                  redirect('pet/index');
                            
                            }

                      //}else{

                            //$this->session->set_flashdata('status_message','Please login to edit pets.');
                            //redirect('admin/login');
                      //}

        }








        //function to update pet status to claimed if owner found it
        public function update_status($id,$status){

            if($this->session->userdata('logged_in')){
						        $status=$status;
						        $id=$id;
                 //grab the id and status type and pass the values to a model function for update
                    if($this->pet_model->update_pet_status($id,$status)){
                         
                        $this->session->set_flashdata('status_message','The  status of the pet was successfully updated.');
                        redirect('pet/index');
        

                    }

            }else{

                    $this->session->set_flashdata('status_message','Please login to modify status of a Pet.');
                    redirect('admin/login');
            }
          
        }

		//function to add comments to a pet
        public function comment($id){

				      if($this->session->userdata('logged_in')){
             
                    $data['id']=$id;

                    $this->form_validation->set_rules('comment', 'Comment', 'required');

                    if($this->form_validation->run() === FALSE) {//check if form entries are valid

                        $this->load->view('templates/header', $data);
                        $this->load->view('pet/comment', $data);
                        $this->load->view('templates/footer'); 

                    }else{//form entries are valid so proceed

                          $id=$this->input->post('id');
                          
                          $this->pet_model->set_pet_comment($id);
                          $this->session->set_flashdata('comment_message','The comment was successfully added.');
                          redirect('pet/show/'.$id);
                          
                    }

				      }else{

					         $this->session->set_flashdata('status_message','Please login to add comment.');
					         redirect('admin/login');
				      }
        }
        

        //paginate pet search results
		
        public function results(){

				     //if($this->session->userdata('logged_in')){

						        $total_offset = 0;

						        if($this->input->post('keyword')){

							         $keyword=$this->input->post('keyword');
							         $this->session->set_userdata('previous_keyword',$keyword);

						        }else{

							         $keyword=$this->session->userdata('previous_keyword');

						        }

						          $total=$this->pet_model->get_pet($id=FALSE,$keyword,$limit=NULL,$total_offset);
						          $total_num_rows=count($total);
						          $config['base_url'] = base_url()."pet/results";
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
                    //$config['display_pages'] = FALSE;
                    //$config['num_links'] = 2;

						          $offset = ($this->uri->segment(3))?(($this->uri->segment(3)-1)*$config['per_page']):0;
						          $data['pets']=$this->pet_model->get_pet($id=FALSE,$keyword,$config['per_page'],$offset);
                      $num_results=count($data['pets']);
                      $data['num_results']=$num_results;
						          $this->pagination->initialize($config);
						          $data['links']=$this->pagination->create_links();

						          if (empty($data['pets'])){

							             $this->session->set_flashdata('status_message','Your search returned no results.Try a different keyword.');
							             redirect('pet/index');

						          }else{
                        
							             $data['title'] = 'Found';
                           $this->session->set_flashdata('status_message','Your search returned  '.$num_results.'  results.');

                           if(!$this->input->is_ajax_request()){

							                     $this->load->view('templates/header', $data);

                           }

							                      $this->load->view('pet/index', $data);

                            if(!$this->input->is_ajax_request()){

							                     $this->load->view('templates/footer');
                            }

						          }
				      //}else{

                    //$this->session->set_flashdata('status_message','Please login to  find requests.');
                    //redirect('admin/login');
				      //}        

        }


//function to contact site admin
         public function contact() {

                  $antispam_answer = "31";
            //if($this->session->userdata('logged_in')){
                  $data['formtitle'] = 'Contact Us';
                  $data['title'] = 'Contact';
              //set rules for error checking
                  $this->form_validation->set_rules('firstname','First Name','required|alpha');
                  $this->form_validation->set_rules('lastname',' Last Name','required|alpha');
                  $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|numeric|min_length[10]|max_length[10]|regex_match[/^\(?[2-9]\d{2}\)?[-\s]\d{3}-\d{4}$/]');
                  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|');
                  $this->form_validation->set_rules('message', 'Message', 'required');

              //if validation failed redisplay the form

                  if($this->form_validation->run() === FALSE){

                           $this->load->view('templates/header', $data);
                           $this->load->view('pet/contact', $data);
                           $this->load->view('templates/footer');

                  }else{

                           $first_name =$this->input->post('firstname');
                           $last_name =$this->input->post('lastname');// required
                           $full_name = $first_name."  ".$last_name;
                           $email_from =$this->input->post('email'); // required
                           $phonenumber = $this->input->post('phonenumber'); // not required
                           $message =$this->input->post('message'); // required
                           $antispam = $this->input->post('antispam'); // required

                           if($antispam===$antispam_answer){

                                $email_message .= "Full Name: ".clean_string($full_name)."\n";
                                $email_message .= "Email: ".clean_string($email_from)."\n";
                                $email_message .= "Phone Number: ".clean_string($phonenumber)."\n";
                                $email_message .= "Message: ".clean_string($comments)."\n";

                                $this->email->from('your@example.com',$email_from);
                                $this->email->to('lodgeassistadmin@gmail.com');

                                $this->email->subject('Email Test');
                                $this->email->message($message);

                                $this->email->send();

                                $this->session->set_flashdata('status_message','The message was successfully sent.');
                                $redirect('pet/contact'); 

                           }else{


                                $this->session->set_flashdata('status_message','The message was successfully sent.');
                                redirect('pet/index'); 


                          }
                          
 
                  }


              //}else{

                    //$this->session->set_flashdata('status_message','Please login to submit ads.');
                    //redirect('admin/login');
              //}
        }

//function to display static about page
        public function about(){

                  $data['title']='About Us';
                  $this->load->view('templates/header', $data);
                  $this->load->view('pet/about', $data);
                  $this->load->view('templates/footer');

        }


}
