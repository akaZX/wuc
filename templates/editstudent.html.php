          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/student/list" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Back to students list</a>
          </div>


          <form action="" method='POST' enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6 col-lg-4">
              <?php if(isset($student->image) && $student->image != '') { ?>
                <img src="/img/profiles/students/<?=$student->image?>" alt="Profile picture" class="img-thumbnail">
                <?php } ?>
                <div class="form-group">
                  <label for="image"><i class="fas fa-upload"></i> Profile photo</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <h4 class="text-info">Personal details</h4>
                <input type="hidden" name="student[student_number]" value="<?=$_GET['id'] ?? ''?>">
                <div class="form-group">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" name="student[firstname]" value="<?=$student->firstname ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="middlename">Middle name(s)</label>
                  <input type="text" class="form-control" id="middlename" name="student[middlename]" value="<?=$student->middlename ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <input type="text" class="form-control" id="surname" name="student[surname]" value="<?=$student->surname ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="date_of_birth">Date of birth</label>
                  <input type="date" class="form-control" id="date_of_birth" name="student[dob]" value="<?=$student->dob ?? ''?>" required>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="student[gender]" id="genderM" value="M" <?=isset($student->gender) && $student->gender == 'M' ? ' checked' : ''?> required>
                  <label class="form-check-label" for="genderM">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="student[gender]" id="genderF" value="F" <?=isset($student->gender) && $student->gender == 'F' ? ' checked' : ''?>>
                  <label class="form-check-label" for="genderF">Female</label>
                </div>
                <div class="form-group">
                  <label for="type">Type</label>
                  <select class="form-control" id="type" name="student[type]" required>
                    <option value=""></option>
                    <option value="FT" <?=isset($student->type) && $student->type == 'FT' ? ' selected' : ''?>>Full-time</option>
                    <option value="PT" <?=isset($student->type) && $student->type == 'PT' ? ' selected' : ''?>>Part-time</option>
                    <option value="DL" <?=isset($student->type) && $student->type == 'DL' ? ' selected' : ''?>>Distance Learning</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="mobile_no">Mobile no.</label>
                  <input type="text" class="form-control" id="mobile_no" name="student[mobile_no]" value="<?=$student->mobile_no ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="personal_email">Personal email</label>
                  <input type="text" class="form-control" id="personal_email" name="student[personal_email]" value="<?=$student->personal_email ?? ''?>">
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Permanent address</h4>
                <div class="form-group">
                  <label for="perm_address">Address</label>
                  <input type="text" class="form-control" id="perm_address" name="student[perm_address]" value="<?=$student->perm_address ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="perm_postcode">Postcode</label>
                  <input type="text" class="form-control" id="perm_postcode" name="student[perm_postcode]" value="<?=$student->perm_postcode ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="perm_city">City</label>
                  <input type="text" class="form-control" id="perm_city" name="student[perm_city]" value="<?=$student->perm_city ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="perm_country">Country</label>
                  <input type="text" class="form-control" id="perm_country" name="student[perm_country]" value="<?=$student->perm_country ?? 'United Kingdom'?>">
                </div>

                <h4 class="text-info">Term address</h4>
                <div class="form-group">
                  <label for="term_address">Address</label>
                  <input type="text" class="form-control" id="term_address" name="student[term_address]" value="<?=$student->term_address ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="term_postcode">Postcode</label>
                  <input type="text" class="form-control" id="term_postcode" name="student[term_postcode]" value="<?=$student->term_postcode ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="term_city">City</label>
                  <input type="text" class="form-control" id="term_city" name="student[term_city]" value="<?=$student->term_city ?? ''?>">
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <h4 class="text-info">Academic info</h4>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="student[status]" required>
                    <option value=""></option>
                    <option value="Provisional" <?=isset($student->status) && $student->status == 'Provisional' ? ' selected' : ''?>>Provisional</option>
                    <option value="Live" <?=isset($student->status) && $student->status == 'Live' ? ' selected' : ''?>>Live</option>
                    <option value="Dormant" <?=isset($student->status) && $student->status == 'Dormant' ? ' selected' : ''?>>Dormant</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status_comment">Status comment</label>
                  <textarea class="form-control" id="status_comment" name="student[status_comment]" rows="3"><?=$student->status_comment ?? ''?></textarea>
                </div>
                <div class="form-group">
                  <label for="date_enrolled">Date enrolled (leave blank if Provisional)</label>
                  <input type="date" class="form-control" id="date_enrolled" name="student[date_enrolled]" value="<?=$student->date_enrolled ?? ''?>">
                </div>
                <div class="form-group">
                  <label for="course_code">Current course</label>
                  <select class="form-control" id="course_code" name="student[course_code]">
                    <option value=""></option>
                    <?php foreach($courses as $course) { ?>
                    <option value="<?=$course->department_code . $course->course_id?>" <?=isset($student->course_code) && $student->course_code == $course->department_code . $course->course_id ? ' selected' : ''; ?>><?=$course->department_code . $course->course_id . ' ' . $course->name?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="entry_qualifications">Entry qualifications</label>
                  <textarea class="form-control" id="entry_qualifications" name="student[entry_qualifications]" rows="3"><?=$student->entry_qualifications ?? ''?></textarea>
                </div>
                <button type="submit" class="btn btn-success mb-4" name="submit"><i class="fas fa-check"></i> Submit</button>
              </div>
            </div>

          </form>