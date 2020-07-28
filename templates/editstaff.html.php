          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/staff/list" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Back to staff list</a>
          </div>


          <form action="" method='POST' enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6 col-lg-4">
                <?php if(isset($staffMember->image) && $staffMember->image != '') { ?>
                <img src="/img/profiles/staff/<?=$staffMember->image?>" alt="Profile picture" class="img-thumbnail">
                <?php } ?>
                <div class="form-group">
                  <label for="image"><i class="fas fa-upload"></i> Profile photo</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <h4 class="text-info">Personal details</h4>
                <input type="hidden" name="staffMember[staff_id]" value="<?=$_GET['id'] ?? ''?>">
                <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" name="staffMember[firstname]" value="<?=$staffMember->firstname ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="middlename">Middle name(s)</label>
                  <input type="text" class="form-control" id="middlename" name="staffMember[middlename]" value="<?=$staffMember->middlename ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" name="staffMember[surname]" value="<?=$staffMember->surname ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" id="date_of_birth" name="staffMember[dob]" value="<?=$staffMember->dob ?? ''?>" required>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="staffMember[gender]" id="genderM" value="M" <?=isset($staffMember->gender) && $staffMember->gender == 'M' ? ' checked' : ''?> required>
                  <label class="form-check-label" for="genderM">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="staffMember[gender]" id="genderF" value="F" <?=isset($staffMember->gender) && $staffMember->gender == 'F' ? ' checked' : ''?>>
                  <label class="form-check-label" for="genderF">Female</label>
                </div>
                <div class="form-group">
                  <label for="mobile_no">Mobile no.</label>
                  <input type="text" class="form-control" id="mobile_no" name="staffMember[mobile_no]" value="<?=$staffMember->mobile_no ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="personal_email">Personal email</label>
                  <input type="text" class="form-control" id="personal_email" name="staffMember[personal_email]" value="<?=$staffMember->personal_email ?? ''?>">
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Address</h4>
                <div class="form-group">
                  <label for="perm_address">Address</label>
                  <input type="text" class="form-control" id="perm_address" name="staffMember[address]" value="<?=$staffMember->address ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="perm_postcode">Postcode</label>
                  <input type="text" class="form-control" id="perm_postcode" name="staffMember[postcode]" value="<?=$staffMember->postcode ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="perm_city">City</label>
                  <input type="text" class="form-control" id="perm_city" name="staffMember[city]" value="<?=$staffMember->city ?? ''?>">
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Academic info</h4>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="staffMember[status]" required>
                    <option value=""></option>
                    <option value="Provisional" <?=isset($staffMember->status) && $staffMember->status == 'Provisional' ? ' selected' : ''?>>Provisional</option>
                    <option value="Live" <?=isset($staffMember->status) && $staffMember->status == 'Live' ? ' selected' : ''?>>Live</option>
                    <option value="Dormant" <?=isset($staffMember->status) && $staffMember->status == 'Dormant' ? ' selected' : ''?>>Dormant</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status_comment">Status comment</label>
                  <textarea class="form-control" id="status_comment" name="staffMember[status_comment]" rows="3"><?=$staffMember->status_comment ?? ''?></textarea>
                </div>
                <div class="form-group">
                  <label for="employment_commenced">Employed from</label>
                  <input type="date" class="form-control" id="employment_commenced" name="staffMember[employment_commenced]" value="<?=$staffMember->employment_commenced ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="roles">Roles</label>
                  <textarea class="form-control" id="roles" name="staffMember[roles]" rows="3"><?=$staffMember->roles ?? ''?></textarea>
                </div>
                <div class="form-group">
                  <label for="specialist_subjects">Specjalist subjects</label>
                  <textarea class="form-control" id="specialist_subjects" name="staffMember[specialist_subjects]" rows="3"><?=$staffMember->specialist_subjects ?? ''?></textarea>
                </div>
                <div class="form-group">
                  <label for="access_level">Access Level</label>
                  <select class="form-control" id="access_level" name="staffMember[access_level]">
                    <option value="1" <?=isset($staffMember->access_level) && $staffMember->access_level == '1' ? ' selected' : ''?>>Lecturer</option>
                    <option value="2" <?=isset($staffMember->access_level) && $staffMember->access_level == '2' ? ' selected' : ''?>>Head of Department</option>
                    <option value="3" <?=isset($staffMember->access_level) && $staffMember->access_level == '3' ? ' selected' : ''?>>Administration member</option>
                    <option value="10" <?=isset($staffMember->access_level) && $staffMember->access_level == '10' ? ' selected' : ''?>>Super Admin</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success mb-4" name="submit"><i class="fas fa-check"></i> Submit</button>
              </div>
            </div>

          </form>