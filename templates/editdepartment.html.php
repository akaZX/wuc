          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/department/list" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Back to departments list</a>
          </div>


          <form action="" method='POST'>
            <div class="row justify-content-md-center">
              <div class="col-sm-10 col-lg-8">
                <div class="form-group">
                  <label for="department_name">Name</label>
                  <input type="text" class="form-control" id="department_name" name="department[name]" required>
                </div>
                <div class="form-group">
                  <label for="department_code">Code</label>
                  <input type="text" class="form-control" id="department_code" name="department[code]" placeholder="Max. 3 characters. E.g. C for Computing" required>
                </div>
                <div class="form-group">
                  <label for="department_head_tutor_id">Head tutor</label>
                  <select class="form-control" id="department_head_tutor_id" name="department[head_tutor_id]">
                    <option value=""></option>
                    <?php foreach($tutors as $tutor) { ?>
                    <option value="<?=$tutor->staff_id?>"><?='#' . $tutor->staff_id . ' ' . $tutor->firstname . ' ' . $tutor->surname?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-success mb-4" name="submit"><i class="fas fa-check"></i> Submit</button>
              </div>
            </div>

          </form>