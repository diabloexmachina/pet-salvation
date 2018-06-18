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
            <select class="form-control" name="town">
                    <option  value="">Select Town</option>

                    <optgroup label="Copperbelt">
                        <option value="Ndola"  <?php if (isset($pet['town']) && $pet['town'] == 'Ndola') echo 'selected = "selected"'; ?>>Ndola</option>
                        <option value="Kitwe"  <?php if (isset($pet['town']) && $pet['town'] == 'Kitwe') echo 'selected = "selected"'; ?>>Kitwe</option>
                        <option value="Luanshya"  <?php if (isset($pet['town']) && $pet['town'] == 'Luanshya') echo 'selected = "selected"'; ?>>Luanshya</option>
                        <option value="Masaiti" <?php if (isset($pet['town']) && $pet['town'] == 'Masaiti') echo 'selected = "selected"'; ?>>Masaiti</option>
                        <option value="Mufulira" <?php if (isset($pet['town']) && $pet['town'] == 'Mufulira') echo 'selected = "selected"'; ?>>Mufulira</option>
                        <option value="Kalulushi" <?php if (isset($pet['town']) && $pet['town'] == 'Kalulushi') echo 'selected = "selected"'; ?>>Kalulushi</option>
                        <option value="Chambeshi" <?php if (isset($pet['town']) && $pet['town'] == 'Chambeshi') echo 'selected = "selected"'; ?>>Chambeshi</option>
                    </optgroup>
            
                    <optgroup label="Lusaka">

                        <option value="Lusaka" <?php if (isset($pet['town']) && $pet['town'] == 'Lusaka') echo 'selected = "selected"'; ?>>Lusaka</option>
                        <option value="Kafue"  <?php if (isset($pet['town']) && $pet['town'] == 'Kafue') echo 'selected = "selected"'; ?>>Kafue</option>
                        <option value="Chilanga" <?php if (isset($pet['town']) && $pet['town'] == 'Chilanga') echo 'selected = "selected"'; ?>>Chilanga</option>
                        <option  value="Chirundu" <?php if (isset($pet['town']) && $pet['town'] == 'Chirundu') echo 'selected = "selected"'; ?>>Chirundu</option>
                        <option value="Luangwa" <?php if (isset($pet['town']) && $pet['town'] == 'Luangwa') echo 'selected = "selected"'; ?>>Luangwa</option>

                    </optgroup>

                    <optgroup label="Central">
                        <option value="Kabwe" <?php if (isset($pet['town']) && $pet['town'] == 'Kabwe') echo 'selected = "selected"'; ?>>Kabwe</option>
                        <option value="Kapiri Mposhi" <?php if (isset($pet['town']) && $pet['town'] == 'Kapiri Mposhi') echo 'selected = "selected"'; ?>>Kapiri Mposhi</option>
                        <option value="Mkushi" <?php if (isset($pet['town']) && $pet['town'] == 'Mkushi') echo 'selected = "selected"'; ?>>Mkushi</option>
                        <option value="Mumbwa" <?php if (isset($pet['town']) && $pet['town'] == 'Mumbwa') echo 'selected = "selected"'; ?>>Mumbwa</option>
                        <option value="Chibombo"  <?php if (isset($pet['town']) && $pet['town'] == 'Chibombo') echo 'selected = "selected"'; ?>>Chibombo</option>
                        <option value="Serenje"  <?php if (isset($pet['town']) && $pet['town'] == 'Serenje') echo 'selected = "selected"'; ?>>Serenje</option>
                    </optgroup>

                    <optgroup label="Southern">
                        <option value="Siavonga" <?php if (isset($pet['town']) && $pet['town'] == 'Siavonga') echo 'selected = "selected"'; ?>>Siavonga</option>
                        <option value="Mazabuka"  <?php if (isset($pet['town']) && $pet['town'] == 'Mazabuka') echo 'selected = "selected"'; ?>>Mazabuka</option>
                        <option value="Livingstone" <?php if (isset($pet['town']) && $pet['town'] == 'Livingstone') echo 'selected = "selected"'; ?>>Livingstone</option>
                        <option value="Kalomo"  <?php if (isset($pet['town']) && $pet['town'] == 'Kalomo') echo 'selected = "selected"'; ?>>Kalomo</option>
                        <option value="Maamba" <?php if (isset($pet['town']) && $pet['town'] == 'Maamba') echo 'selected = "selected"'; ?>>Maamba</option>
                        <option value="Chirundu" <?php if (isset($pet['town']) && $pet['town'] == 'Chirundu') echo 'selected = "selected"'; ?>>Chirundu</option>
                        <option value="Zimba" <?php if (isset($pet['town']) && $pet['town'] == 'Zimba') echo 'selected = "selected"'; ?>>Zimba</option>
                        <option value="Monze" <?php if (isset($pet['town']) && $pet['town'] == 'Monze') echo 'selected = "selected"'; ?>>Monze</option>
                        <option value="Namwala" <?php if (isset($pet['town']) && $pet['town'] == 'Namwala') echo 'selected = "selected"'; ?>>Namwala</option>
                        <option value="Pemba"  <?php if (isset($pet['town']) && $pet['town'] == 'Pemba') echo 'selected = "selected"'; ?>>Pemba</option>
                    </optgroup>

                    <optgroup label="North Western">
                        <option value="Solwezi" <?php if (isset($pet['town']) && $pet['town'] == 'Solwezi') echo 'selected = "selected"'; ?>>Solwezi</option>
                        <option value="Mwinilunga" <?php if (isset($pet['town']) && $pet['town'] == 'Mwinilunga') echo 'selected = "selected"'; ?>>Mwinilunga</option>
                        <option value="Kansanshi" <?php if (isset($pet['town']) && $pet['town'] == 'Kansanshi') echo 'selected = "selected"'; ?>>Kansanshi</option>
                        <option value="Chavuma" <?php if (isset($pet['town']) && $pet['town'] == 'Chavuma') echo 'selected = "selected"'; ?>>Chavuma</option>
                        <option value="Mufumbwe" <?php if (isset($pet['town']) && $pet['town'] == 'Mufumbwe') echo 'selected = "selected"'; ?>>Mufumbwe</option>
                        <option value="Lumwana" <?php if (isset($pet['town']) && $pet['town'] == 'Lumwana') echo 'selected = "selected"'; ?>>Lumwana</option>
                        <option value="Kabompo" <?php if (isset($pet['town']) && $pet['town'] == 'Kabompo') echo 'selected = "selected"'; ?>>Kabompo</option>
                        <option value="Zambezi" <?php if (isset($pet['town']) && $pet['town'] == 'Zambezi') echo 'selected = "selected"'; ?>>Zambezi</option>
                        <option value="Mutanda" <?php if (isset($pet['town']) && $pet['town'] == 'Mutanda') echo 'selected = "selected"'; ?>>Mutanda</option>
                        <option value="Lufwanyama" <?php if (isset($pet['town']) && $pet['town'] == 'Lufwanyama') echo 'selected = "selected"'; ?>>Lufwanyama</option>
                    </optgroup>

                    <optgroup label="Eastern">
                        <option value="Chipata"  <?php if (isset($pet['town']) && $pet['town'] == 'Chipata') echo 'selected = "selected"'; ?>>Chipata</option>
                        <option value="Lundazi" <?php if (isset($pet['town']) && $pet['town'] == 'Lundazi') echo 'selected = "selected"'; ?>>Lundazi</option>
                        <option value="Chadiza" <?php if (isset($pet['town']) && $pet['town'] == 'Chadiza') echo 'selected = "selected"'; ?>>Chadiza</option>
                        <option value="Katete" <?php if (isset($pet['town']) && $pet['town'] == 'Katete') echo 'selected = "selected"'; ?>>Katete</option>
                        <option value="Petauke" <?php if (isset($pet['town']) && $pet['town'] == 'Petauke') echo 'selected = "selected"'; ?>>Petauke</option>
                        <option value="Nyimba" <?php if (isset($pet['town']) && $pet['town'] == 'Nyimba') echo 'selected = "selected"'; ?>>Nyimba</option>
                    </optgroup>

                    <optgroup label="Luapula">
                        <option value="Mansa" <?php if (isset($pet['town']) && $pet['town'] == 'Mansa') echo 'selected = "selected"'; ?>>Mansa</option>
                        <option value="Nchelenge"  <?php if (isset($pet['town']) && $pet['town'] == 'Nchelenge') echo 'selected = "selected"'; ?>>Nchelenge</option>
                        <option value="Samfya" <?php if (isset($pet['town']) && $pet['town'] == 'Samfya') echo 'selected = "selected"'; ?>>Samfya</option>
                        <option value="Kashikishi" <?php if (isset($pet['town']) && $pet['town'] == 'Kashikishi') echo 'selected = "selected"'; ?>>Kashikishi</option>
                        <option value="Mbereshi" <?php if (isset($pet['town']) && $pet['town'] == 'Mbereshi') echo 'selected = "selected"'; ?>>Mbereshi</option>
                        <option value="Kataba" <?php if (isset($pet['town']) && $pet['town'] == 'Kataba') echo 'selected = "selected"'; ?>>Kataba</option>
                        <option value="Kazembe" <?php if (isset($pet['town']) && $pet['town'] == 'Kazembe') echo 'selected = "selected"'; ?>>Kazembe</option>
                    </optgroup>

                    <optgroup label="Northern">
                        <option value="Kasama" <?php if (isset($pet['town']) && $pet['town'] == 'Kasama') echo 'selected = "selected"'; ?>>Kasama</option>
                        <option value="Kasama" <?php if (isset($pet['town']) && $pet['town'] == 'Kasama') echo 'selected = "selected"'; ?>>Kasama</option>
                        <option value="Mbala" <?php if (isset($pet['town']) && $pet['town'] == 'Mbala') echo 'selected = "selected"'; ?>>Mbala</option>
                        <option value="Mpulungu" <?php if (isset($pet['town']) && $pet['town'] == 'Mpulungu') echo 'selected = "selected"'; ?>>Mpulungu</option>
                        <option value="Mporokoso" <?php if (isset($pet['town']) && $pet['town'] == 'Mporokoso') echo 'selected = "selected"'; ?>>Mporokoso</option>
            
                        <option value="Luwingu" <?php if (isset($pet['town']) && $pet['town'] == 'Luwingu') echo 'selected = "selected"'; ?>>Luwingu</option>
                        <option value="Samfya" <?php if (isset($pet['town']) && $pet['town'] == 'Samfya') echo 'selected = "selected"'; ?>>Samfya</option>
                    </optgroup>


                    <optgroup label="Muchinga">
                        <option value="Nakonde" <?php if (isset($pet['town']) && $pet['town'] == 'Nakonde') echo 'selected = "selected"'; ?>>Nakonde</option>
                        <option value="Isoka" <?php if (isset($pet['town']) && $pet['town'] == 'Isoka') echo 'selected = "selected"'; ?>>Isoka</option>
                        <option value="Mpika" <?php if (isset($pet['town']) && $pet['town'] == 'Mpika') echo 'selected = "selected"'; ?>>Mpika</option>
                        <option value="Chinsali" <?php if (isset($pet['town']) && $pet['town'] == 'Chinsali') echo 'selected = "selected"'; ?>>Chinsali</option>
                        <option value="Chama"  <?php if (isset($pet['town']) && $pet['town'] == 'Chama') echo 'selected = "selected"'; ?>>Chama</option>
                        <option value="Mafinga" <?php if (isset($pet['town']) && $pet['town'] == 'Mafinga') echo 'selected = "selected"'; ?>>Mafinga</option>
                    </optgroup>

                    <optgroup label="Western">
                        <option value="Mongu" <?php if (isset($pet['town']) && $pet['town'] == 'Mongu') echo 'selected = "selected"'; ?>>Mongu</option>
                        <option value="Kaoma" <?php if (isset($pet['town']) && $pet['town'] == 'Kaoma') echo 'selected = "selected"'; ?>>Kaoma</option>
                        <option value="Kalabo" <?php if (isset($pet['town']) && $pet['town'] == 'Kalabo') echo 'selected = "selected"'; ?>>Sesheke</option>
                        <option value="Lukulu" <?php if (isset($pet['town']) && $pet['town'] == 'Lukulu') echo 'selected = "selected"'; ?>>Lukulu</option>
                        <option value="Sesheke" <?php if (isset($pet['town']) && $pet['town'] == 'Sesheke') echo 'selected = "selected"'; ?>>Sesheke</option>
                        <option value="Mulobezi" <?php if (isset($pet['town']) && $pet['town'] == 'Mulobezi') echo 'selected = "selected"'; ?>>Mulobezi</option>
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
                    <option value="Lusaka" <?php if (isset($pet) && $pet['province'] == 'Lusaka') echo 'selected = "selected"'; ?> >Lusaka</option>
                    <option value="Southern" <?php if (isset($pet) && $pet['province'] == 'Southern') echo 'selected = "selected"'; ?>>Southern</option>
                    <option value="Eastern" <?php if (isset($pet) && $pet['province'] == 'Eastern') echo 'selected = "selected"'; ?>>Eastern</option>
                    <option value="Western" <?php if (isset($pet) && $pet['province'] == 'Western') echo 'selected = "selected"'; ?>>Western</option>
                    <option value="North Western" <?php if (isset($pet) && $pet['province'] == 'North Western') echo 'selected = "selected"'; ?>>North Western</option>
                    <option value="Copperbelt" <?php if (isset($pet) && $pet['province'] == 'Copperbelt') echo 'selected = "selected"'; ?>>Copperbelt</option>
                    <option value="Muchinga" <?php if (isset($pet) && $pet['province'] == 'Muchinga') echo 'selected = "selected"'; ?>>Muchinga</option>
                    <option value="Luapula" <?php if (isset($pet) && $pet['province'] == 'Luapula') echo 'selected = "selected"'; ?>>Luapula</option>
                    <option value="Northern" <?php if (isset($pet) && $pet['province'] == 'Northern') echo 'selected = "selected"'; ?>>Northern</option>
                    <option value="Central" <?php if (isset($pet) && $pet['province'] == 'Central') echo 'selected = "selected"'; ?>>Central</option>
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


  <div id='uploadContainer' class=form-group>

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