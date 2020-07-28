          <form action="" method='POST'>
            <div class="row">
              <div class="col-sm-6 col-lg-4">
                <!-- <div class="form-group">
                  <label for="photo"><i class="fas fa-upload"></i> Profile photo</label>
                  <input type="file" class="form-control-file" id="photo" name="photo">
                </div> -->
                <h4 class="text-info">Personal details</h4>
                <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" name="student[firstname]" value="<?=$user->firstname ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="middlename">Middle name(s)</label>
                  <input type="text" class="form-control" id="middlename" name="student[middlename]" value="<?=$user->middlename ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" name="student[surname]" value="<?=$user->surname ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" id="date_of_birth" name="student[dob]" value="<?=$user->dob ?? ''?>" disabled>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="student[gender]" id="genderM" value="M" <?=isset($user->gender) && $user->gender == 'M' ? ' checked' : ''?> disabled>
                  <label class="form-check-label" for="genderM">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="student[gender]" id="genderF" value="F" <?=isset($user->gender) && $user->gender == 'F' ? ' checked' : ''?> disabled>
                  <label class="form-check-label" for="genderF">Female</label>
                </div>
                <?php if(isset($user->type)) { ?>
                <div class="form-group">
                  <label for="type">Type</label>
                  <select class="form-control" id="type" name="student[type]" disabled>
                    <option value="FT" <?=isset($user->type) && $user->type == 'FT' ? ' selected' : ''?>>Full-time</option>
                    <option value="PT" <?=isset($user->type) && $user->type == 'PT' ? ' selected' : ''?>>Part-time</option>
                    <option value="DL" <?=isset($user->type) && $user->type == 'DL' ? ' selected' : ''?>>Distance Learning</option>
                  </select>
                </div>
                <?php } ?>
                <div class="form-group">
                  <label for="mobile_no">Mobile no.</label>
                  <input type="text" class="form-control" id="mobile_no" name="student[mobile_no]" value="<?=$user->mobile_no ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="personal_email">Personal email</label>
                  <input type="text" class="form-control" id="personal_email" name="student[personal_email]" value="<?=$user->personal_email ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="personal_email">University email</label>
                  <input type="text" class="form-control" id="university_email" name="student[university_email]" value="<?=$user->university_email ?? ''?>" disabled>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Permanent address</h4>
                <div class="form-group">
                  <label for="perm_address">Address</label>
                  <input type="text" class="form-control" id="perm_address" name="student[perm_address]" value="<?=$user->perm_address ?? $user->address ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="perm_postcode">Postcode</label>
                  <input type="text" class="form-control" id="perm_postcode" name="student[perm_postcode]" value="<?=$user->perm_postcode ?? $user->postcode ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="perm_city">City</label>
                  <input type="text" class="form-control" id="perm_city" name="student[perm_city]" value="<?=$user->perm_city ?? $user->city ?? ''?>" disabled>
                </div>
                <?php if(isset($user->perm_country)) { ?>
                <div class="form-group">
                  <label for="perm_country">Country</label>
                  <input type="text" class="form-control" id="perm_country" name="student[perm_country]" value="<?=$user->perm_country ?? $user->country ?? ''?>" disabled>
                </div>
                <?php } ?>
                <?php if(isset($user->term_address)) { ?>
                <h4 class="text-info">Term address</h4>
                <div class="form-group">
                  <label for="term_address">Address</label>
                  <input type="text" class="form-control" id="term_address" name="student[term_address]" value="<?=$user->term_address ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="term_postcode">Postcode</label>
                  <input type="text" class="form-control" id="term_postcode" name="student[term_postcode]" value="<?=$user->term_postcode ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="term_city">City</label>
                  <input type="text" class="form-control" id="term_city" name="student[term_city]" value="<?=$user->term_city ?? ''?>" disabled>
                </div>
                <?php } ?>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Academic info</h4>
                <?php if(isset($user->course_code)) { ?>
                <div class="form-group">
                  <label for="course_code">Current course</label>
                  <select class="form-control" id="course_code" name="student[course_code]" disabled>
                    <option><?=$current_course[0]->name ?? '' ?></option>
                  </select>
                </div>
                <?php } ?>
                <?php if(isset($user->staff_id)) { ?>
                <div class="form-group">
                  <label for="employment_commenced">Employed from</label>
                  <input type="date" class="form-control" id="employment_commenced" name="student[dob]" value="<?=$user->employment_commenced ?? ''?>" disabled>
                </div>
                <div class="form-group">
                  <label for="roles">Roles</label>
                  <textarea class="form-control" id="roles" name="student[roles]" rows="3" disabled><?=$user->roles ?? ''?></textarea>
                </div>
                <div class="form-group">
                  <label for="specialist_subjects">Specialist subjects</label>
                  <textarea class="form-control" id="specialist_subjects" name="student[specialist_subjects]" rows="3" disabled><?=$user->specialist_subjects ?? ''?></textarea>
                </div>
                <?php } ?>
              </div>
            </div>

          </form>