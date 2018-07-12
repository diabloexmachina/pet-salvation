 <h4 class="text-center"><?php echo $formtitle;?></h4>

    <div class="row">
    <div class="col-xs-3 col-sm-2"></div>
    <div class="col-xs-9 col-sm-8">
      

  <?php 

      if (isset($pet)){

          echo form_open_multipart('pet/update/pet-info/'.$pet['pet_id']);

      }else{
       
          echo form_open_multipart('pet/add/pet-info');
      } 

  ?>


   <div class="card">
   <div class="card-body">

   <?php 

                  if(isset($upload_error)){

                       echo '<div class="alert alert-warning">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.
                       $upload_error.'</div>';

                  }


   ?>

  <input  name="id" type="hidden" value="<?php set_value('id', isset($pet['pet_id']) ? $pet['pet_id'] : '');?> ">

  <div class="form-group">
    <label for="exampleInputEmail1">Posted By:</label>

    <?php
    if(form_error('posted_by')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('posted_by').'</div>';

    }

    ?>
            <input type="text" class="form-control" name="posted_by" value="<?php echo set_value('posted_by', isset($pet['posted_by']) ? $pet['posted_by'] : ''); ?>" placeholder="Name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Town:</label>

    <?php
    if(form_error('town')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('town').'</div>';

    }

    ?>

      <select id="town" class="form-control" name="town">
                    <option  value="">Select Town</option>

                    <optgroup label="Copperbelt">
                        <option value="Ndola"  <?php if ((isset($listing['town']) && $listing['town'] == 'Ndola')||$this->input->post("town")=="Ndola") echo 'selected = "selected"'; ?>>Ndola</option>
                        <option value="Kitwe"  <?php if ((isset($listing['town']) && $listing['town'] == 'Kitwe')||$this->input->post("town")=="Kitwe") echo 'selected = "selected"'; ?>>Kitwe</option>
                        <option value="Luanshya"  <?php if ((isset($listing['town']) && $listing['town'] == 'Luanshya')||$this->input->post("town")=="Luanshya") echo 'selected = "selected"'; ?>>Luanshya</option>
                        <option value="Masaiti" <?php if ((isset($listing['town']) && $listing['town'] == 'Masaiti')||$this->input->post("town")=="Masaiti") echo 'selected = "selected"'; ?>>Masaiti</option>
                        <option value="Mufulira" <?php if ((isset($listing['town']) && $listing['town'] == 'Mufulira')||$this->input->post("town")=="Mufulira") echo 'selected = "selected"'; ?>>Mufulira</option>
                        <option value="Kalulushi" <?php if ((isset($listing['town']) && $listing['town'] == 'Kalulushi')||$this->input->post("town")=="Kalulushi") echo 'selected = "selected"'; ?>>Kalulushi</option>
                        <option value="Chambeshi" <?php if ((isset($listing['town']) && $listing['town'] == 'Chambeshi')||$this->input->post("town")=="Chambeshi") echo 'selected = "selected"'; ?>>Chambeshi</option>
                    </optgroup>
            
                    <optgroup label="Lusaka">

                        <option value="Lusaka" <?php if ((isset($listing['town']) && $listing['town'] == 'Lusaka')||$this->input->post("town")=="Lusaka") echo 'selected = "selected"'; ?>>Lusaka</option>
                        <option value="Kafue"  <?php if ((isset($listing['town']) && $listing['town'] == 'Kafue')||$this->input->post("town")=="Kafue") echo 'selected = "selected"'; ?>>Kafue</option>
                        <option value="Chilanga" <?php if ((isset($listing['town']) && $listing['town'] == 'Chilanga')||$this->input->post("town")=="Chilanga") echo 'selected = "selected"'; ?>>Chilanga</option>
                        <option value="Luangwa" <?php if ((isset($listing['town']) && $listing['town'] == 'Luangwa')||$this->input->post("town")=="Luangwa") echo 'selected = "selected"'; ?>>Luangwa</option>

                    </optgroup>

                    <optgroup label="Central">
                        <option value="Kabwe" <?php if ((isset($listing['town']) && $listing['town'] == 'Kabwe')||$this->input->post("town")=="Kabwe") echo 'selected = "selected"'; ?>>Kabwe</option>
                        <option value="Kapiri Mposhi" <?php if ((isset($listing['town']) && $listing['town'] == 'Kapiri Mposhi')||$this->input->post("town")=="Kapiri Mposhi") echo 'selected = "selected"'; ?>>Kapiri Mposhi</option>
                        <option value="Mkushi" <?php if ((isset($listing['town']) && $listing['town'] == 'Mkushi')||$this->input->post("town")=="Mkushi") echo 'selected = "selected"'; ?>>Mkushi</option>
                        <option value="Mumbwa" <?php if ((isset($listing['town']) && $listing['town'] == 'Mumbwa')||$this->input->post("town")=="Mumbwa") echo 'selected = "selected"'; ?>>Mumbwa</option>
                        <option value="Chibombo"  <?php if ((isset($listing['town']) && $listing['town'] == 'Chibombo')||$this->input->post("town")=="Chibombo") echo 'selected = "selected"'; ?>>Chibombo</option>
                        <option value="Serenje"  <?php if ((isset($listing['town']) && $listing['town'] == 'Serenje')||$this->input->post("town")=="Serenje") echo 'selected = "selected"'; ?>>Serenje</option>
                    </optgroup>

                    <optgroup label="Southern">
                        <option value="Siavonga" <?php if ((isset($listing['town']) && $listing['town'] == 'Siavonga')||$this->input->post("town")=="Siavonga") echo 'selected = "selected"'; ?>>Siavonga</option>
                        <option value="Mazabuka"  <?php if ((isset($listing['town']) && $listing['town'] == 'Mazabuka')||$this->input->post("town")=="Mazabuka") echo 'selected = "selected"'; ?>>Mazabuka</option>
                        <option value="Livingstone" <?php if ((isset($listing['town']) && $listing['town'] == 'Livingstone')||$this->input->post("town")=="Livingstone") echo 'selected = "selected"'; ?>>Livingstone</option>
                        <option value="Kalomo"  <?php if ((isset($listing['town']) && $listing['town'] == 'Kalomo')||$this->input->post("town")=="Kalomo") echo 'selected = "selected"'; ?>>Kalomo</option>
                        <option value="Maamba" <?php if ((isset($listing['town']) && $listing['town'] == 'Maamba')||$this->input->post("town")=="Maamba") echo 'selected = "selected"'; ?>>Maamba</option>
                        <option value="Chirundu" <?php if ((isset($listing['town']) && $listing['town'] == 'Chirundu')||$this->input->post("town")=="Chirundu") echo 'selected = "selected"'; ?>>Chirundu</option>
                        <option value="Zimba" <?php if ((isset($listing['town']) && $listing['town'] == 'Zimba')||$this->input->post("town")=="Zimba") echo 'selected = "selected"'; ?>>Zimba</option>
                        <option value="Monze" <?php if ((isset($listing['town']) && $listing['town'] == 'Monze')||$this->input->post("town")=="Monze") echo 'selected = "selected"'; ?>>Monze</option>
                        <option value="Namwala" <?php if ((isset($listing['town']) && $listing['town'] == 'Namwala')||$this->input->post("town")=="Namwala") echo 'selected = "selected"'; ?>>Namwala</option>
                        <option value="Pemba"  <?php if ((isset($listing['town']) && $listing['town'] == 'Pemba')||$this->input->post("town")=="Pemba") echo 'selected = "selected"'; ?>>Pemba</option>
                    </optgroup>

                    <optgroup label="North Western">
                        <option value="Solwezi" <?php if ((isset($listing['town']) && $listing['town'] == 'Solwezi')||$this->input->post("town")=="Solwezi") echo 'selected = "selected"'; ?>>Solwezi</option>
                        <option value="Mwinilunga" <?php if ((isset($listing['town']) && $listing['town'] == 'Mwinilunga')||$this->input->post("town")=="Mwinilunga") echo 'selected = "selected"'; ?>>Mwinilunga</option>
                        <option value="Kansanshi" <?php if ((isset($listing['town']) && $listing['town'] == 'Kansanshi')||$this->input->post("town")=="Kansanshi") echo 'selected = "selected"'; ?>>Kansanshi</option>
                        <option value="Chavuma" <?php if ((isset($listing['town']) && $listing['town'] == 'Chavuma')||$this->input->post("town")=="Chavuma") echo 'selected = "selected"'; ?>>Chavuma</option>
                        <option value="Mufumbwe" <?php if ((isset($listing['town']) && $listing['town'] == 'Mufumbwe')||$this->input->post("town")=="Mufumbwe") echo 'selected = "selected"'; ?>>Mufumbwe</option>
                        <option value="Lumwana" <?php if ((isset($listing['town']) && $listing['town'] == 'Lumwana')||$this->input->post("town")=="Lumwana") echo 'selected = "selected"'; ?>>Lumwana</option>
                        <option value="Kabompo" <?php if ((isset($listing['town']) && $listing['town'] == 'Kabompo')||$this->input->post("town")=="Kabompo") echo 'selected = "selected"'; ?>>Kabompo</option>
                        <option value="Zambezi" <?php if ((isset($listing['town']) && $listing['town'] == 'Zambezi')||$this->input->post("town")=="Zambezi") echo 'selected = "selected"'; ?>>Zambezi</option>
                        <option value="Mutanda" <?php if ((isset($listing['town']) && $listing['town'] == 'Mutanda')||$this->input->post("town")=="Mutanda") echo 'selected = "selected"'; ?>>Mutanda</option>
                        <option value="Lufwanyama" <?php if ((isset($listing['town']) && $listing['town'] == 'Lufwanyama')||$this->input->post("town")=="Lufwanyama") echo 'selected = "selected"'; ?>>Lufwanyama</option>
                    </optgroup>

                    <optgroup label="Eastern">
                        <option value="Chipata"  <?php if ((isset($listing['town']) && $listing['town'] == 'Chipata')||$this->input->post("town")=="Chipata") echo 'selected = "selected"'; ?>>Chipata</option>
                        <option value="Lundazi" <?php if ((isset($listing['town']) && $listing['town'] == 'Lundazi')||$this->input->post("town")=="Lundazi") echo 'selected = "selected"'; ?>>Lundazi</option>
                        <option value="Chadiza" <?php if ((isset($listing['town']) && $listing['town'] == 'Chadiza')||$this->input->post("town")=="Chadiza") echo 'selected = "selected"'; ?>>Chadiza</option>
                        <option value="Katete" <?php if ((isset($listing['town']) && $listing['town'] == 'Katete')||$this->input->post("town")=="Katete") echo 'selected = "selected"'; ?>>Katete</option>
                        <option value="Petauke" <?php if ((isset($listing['town']) && $listing['town'] == 'Petauke')||$this->input->post("town")=="Petauke") echo 'selected = "selected"'; ?>>Petauke</option>
                        <option value="Nyimba" <?php if ((isset($listing['town']) && $listing['town'] == 'Nyimba')||$this->input->post("town")=="Nyimba") echo 'selected = "selected"'; ?>>Nyimba</option>
                    </optgroup>

                    <optgroup label="Luapula">
                        <option value="Mansa" <?php if ((isset($listing['town']) && $listing['town'] == 'Mansa')||$this->input->post("town")=="Mansa") echo 'selected = "selected"'; ?>>Mansa</option>
                        <option value="Nchelenge"  <?php if ((isset($listing['town']) && $listing['town'] == 'Nchelenge')||$this->input->post("town")=="Nchelenge") echo 'selected = "selected"'; ?>>Nchelenge</option>
                        <option value="Samfya" <?php if ((isset($listing['town']) && $listing['town'] == 'Samfya')||$this->input->post("town")=="Samfya") echo 'selected = "selected"'; ?>>Samfya</option>
                        <option value="Kashikishi" <?php if ((isset($listing['town']) && $listing['town'] == 'Kashikishi')||$this->input->post("town")=="Kashikishi") echo 'selected = "selected"'; ?>>Kashikishi</option>
                        <option value="Mbereshi" <?php if ((isset($listing['town']) && $listing['town'] == 'Mbereshi')||$this->input->post("town")=="Mbereshi") echo 'selected = "selected"'; ?>>Mbereshi</option>
                        <option value="Kataba" <?php if ((isset($listing['town']) && $listing['town'] == 'Kataba')||$this->input->post("town")=="Kataba") echo 'selected = "selected"'; ?>>Kataba</option>
                        <option value="Kazembe" <?php if ((isset($listing['town']) && $listing['town'] == 'Kazembe')||$this->input->post("town")=="Kazembe") echo 'selected = "selected"'; ?>>Kazembe</option>
                    </optgroup>

                    <optgroup label="Northern">
                        <option value="Kasama" <?php if ((isset($listing['town']) && $listing['town'] == 'Kasama')||$this->input->post("town")=="Kasama") echo 'selected = "selected"'; ?>>Kasama</option>
                        <option value="Mbala" <?php if ((isset($listing['town']) && $listing['town'] == 'Mbala')||$this->input->post("town")=="Mbala") echo 'selected = "selected"'; ?>>Mbala</option>
                        <option value="Mpulungu" <?php if ((isset($listing['town']) && $listing['town'] == 'Mpulungu')||$this->input->post("town")=="Mpulungu") echo 'selected = "selected"'; ?>>Mpulungu</option>
                        <option value="Mporokoso" <?php if ((isset($listing['town']) && $listing['town'] == 'Mporokoso')||$this->input->post("town")=="Mporokoso") echo 'selected = "selected"'; ?>>Mporokoso</option>
            
                        <option value="Luwingu" <?php if ((isset($listing['town']) && $listing['town'] == 'Luwingu')||$this->input->post("town")=="Luwingu") echo 'selected = "selected"'; ?>>Luwingu</option>
                    </optgroup>


                    <optgroup label="Muchinga">
                        <option value="Nakonde" <?php if ((isset($listing['town']) && $listing['town'] == 'Nakonde')||$this->input->post("town")=="Nakonde") echo 'selected = "selected"'; ?>>Nakonde</option>
                        <option value="Isoka" <?php if ((isset($listing['town']) && $listing['town'] == 'Isoka')||$this->input->post("town")=="Isoka") echo 'selected = "selected"'; ?>>Isoka</option>
                        <option value="Mpika" <?php if ((isset($listing['town']) && $listing['town'] == 'Mpika')||$this->input->post("town")=="Mpika") echo 'selected = "selected"'; ?>>Mpika</option>
                        <option value="Chinsali" <?php if ((isset($listing['town']) && $listing['town'] == 'Chinsali')||$this->input->post("town")=="Chinsali") echo 'selected = "selected"'; ?>>Chinsali</option>
                        <option value="Chama"  <?php if ((isset($listing['town']) && $listing['town'] == 'Chama')||$this->input->post("town")=="Chama") echo 'selected = "selected"'; ?>>Chama</option>
                        <option value="Mafinga" <?php if ((isset($listing['town']) && $listing['town'] == 'Mafinga')||$this->input->post("town")=="Mafinga") echo 'selected = "selected"'; ?>>Mafinga</option>
                    </optgroup>

                    <optgroup label="Western">
                        <option value="Mongu" <?php if ((isset($listing['town']) && $listing['town'] == 'Mongu')||$this->input->post("town")=="Mongu") echo 'selected = "selected"'; ?>>Mongu</option>
                        <option value="Kaoma" <?php if ((isset($listing['town']) && $listing['town'] == 'Kaoma')||$this->input->post("town")=="Kaoma") echo 'selected = "selected"'; ?>>Kaoma</option>
                        <option value="Kalabo" <?php if ((isset($listing['town']) && $listing['town'] == 'Kalabo')||$this->input->post("town")=="Kalabo") echo 'selected = "selected"'; ?>>Kalabo</option>
                        <option value="Lukulu" <?php if ((isset($listing['town']) && $listing['town'] == 'Lukulu')||$this->input->post("town")=="Lukulu") echo 'selected = "selected"'; ?>>Lukulu</option>
                        <option value="Sesheke" <?php if ((isset($listing['town']) && $listing['town'] == 'Sesheke')||$this->input->post("town")=="Sesheke") echo 'selected = "selected"'; ?>>Sesheke</option>
                        <option value="Mulobezi" <?php if ((isset($listing['town']) && $listing['town'] == 'Mulobezi')||$this->input->post("town")=="Mulobezi") echo 'selected = "selected"'; ?>>Mulobezi</option>
                    </optgroup>


          </select>
  </div>
            
    <div class="form-group">
        <label for="exampleInputPassword1">Province:</label>
            <?php

                if(form_error('province')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('province').'</div>';

                }

            ?>
            <select class="form-control" name="province">
                    <option  value="">Select Province</option>
                    <option value="Lusaka" <?php if ((isset($listing) && $listing['province'] == 'Lusaka')||$this->input->post("province")=="Lusaka")  echo 'selected = "selected"'; ?> >Lusaka</option>
                    <option value="Southern" <?php if ((isset($listing) && $listing['province'] == 'Southern')||$this->input->post("province")=="Southern") echo 'selected = "selected"'; ?>>Southern</option>
                    <option value="Eastern" <?php if ((isset($listing) && $listing['province'] == 'Eastern')||$this->input->post("province")=="Eastern") echo 'selected = "selected"'; ?>>Eastern</option>
                    <option value="Western" <?php if ((isset($listing) && $listing['province'] == 'Western')||$this->input->post("province")=="Western") echo 'selected = "selected"'; ?>>Western</option>
                    <option value="North Western" <?php if ((isset($listing) && $listing['province'] == 'North Western')||$this->input->post("province")=="North Western") echo 'selected = "selected"'; ?>>North Western</option>
                    <option value="Copperbelt" <?php if ((isset($listing) && $listing['province'] == 'Copperbelt')||$this->input->post("province")=="Copperbelt") echo 'selected = "selected"'; ?>>Copperbelt</option>
                    <option value="Muchinga" <?php if ((isset($listing) && $listing['province'] == 'Muchinga')||$this->input->post("province")=="Muchinga") echo 'selected = "selected"'; ?>>Muchinga</option>
                    <option value="Luapula" <?php if ((isset($listing) && $listing['province'] == 'Luapula')||$this->input->post("province")=="Luapula") echo 'selected = "selected"'; ?>>Luapula</option>
                    <option value="Northern" <?php if ((isset($listing) && $listing['province'] == 'Northern')||$this->input->post("province")=="Northern") echo 'selected = "selected"'; ?>>Northern</option>
                    <option value="Central" <?php if ((isset($listing) && $listing['province'] == 'Central')||$this->input->post("province")=="Central") echo 'selected = "selected"'; ?>>Central</option>
            </select>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Area:</label>

    <?php
    if(form_error('area')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('area').'</div>';

    }

    ?>
            <input type="text" class="form-control" name="area" value="<?php echo set_value('area', isset($pet['area']) ? $pet['area'] : ''); ?>" placeholder="Area">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number:</label>

    <?php
    if(form_error('phonenumber')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('phonenumber').'</div>';

    }

    ?>
            <input type="text" class="form-control" name="phonenumber" value="<?php echo set_value('phonenumber', isset($pet['telephone']) ? $pet['phonenumber'] : ''); ?>" placeholder="Phone Number">
  </div>

  <div class="form-group"><!-- possibility of multiple api -->
    <label for="exampleInputEmail1">Email:</label>

    <?php
    if(form_error('email')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('email').'</div>';

    }

    ?>
            <input type="email" class="form-control" name="email" value="<?php echo set_value('email', isset($pet['email']) ? $pet['email'] : ''); ?>" placeholder="Email">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Description:</label>

    <?php
    if(form_error('description')){

            echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('description').'</div>';

    }

    ?>
    <textarea type="text" class="form-control" name="description" value="<?php echo set_value('description', isset($pet['description']) ? $pet['description'] : ''); ?>" placeholder="pet description"></textarea>
  </div>


  <div id='uploadContainer' class="form-group">

  </div>

        <h4 class='text-center'>Click add file to upload image(s)</h4>

         
       <a id='addfile' href='#addfile' class='btn btn-info btn-block'>Add File</a>

       
       <div class='form-group'></div>
       

       <div class='form-group'>
         <input  type="submit" name="submit" class="btn btn-info btn-block form-control" value="Submit" />
       </div>


       </div>        
    </div>

  </div>   

</form>

  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-2"></div>

</div>

