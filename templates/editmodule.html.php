          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/module/list" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Back to modules list</a>
          </div>


          <form action="" method='POST'>
            <div class="row justify-content-md-center">
              <div class="col-sm-10 col-lg-8">
                <div class="form-group">
                  <label for="module_code">Code</label>
                  <input type="text" class="form-control" id="module_code" name="module[code]" value="<?=$module->code ?? ''?>" placeholder="MOD followed by 4 digits e.g. MOD2078" <?= isset($module->code) ? ' readonly' : '';?> required>
                </div>
                <div class="form-group">
                  <label for="module_name">Name</label>
                  <input type="text" class="form-control" id="module_name" name="module[name]" value="<?=$module->name ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="module_year">Year</label>
                  <select class="form-control" id="module_year" name="module[year]" required>
                    <option value=""></option>
                    <option value="1" <?=isset($module->year) && $module->year == '1' ? ' selected' : ''?>>1</option>
                    <option value="2" <?=isset($module->year) && $module->year == '2' ? ' selected' : ''?>>2</option>
                    <option value="3" <?=isset($module->year) && $module->year == '3' ? ' selected' : ''?>>3</option>
                    <option value="4" <?=isset($module->year) && $module->year == '4' ? ' selected' : ''?>>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="credits">Credits</label>
                  <input type="number" class="form-control" id="credits" name="module[credits]" value="<?=$module->credits ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="module_tutor1">Tutor #1</label>
                  <select class="form-control" id="module_tutor1" name="module_tutor[]">
                    <option></option>
                    <?php foreach($tutors as $tutor) { ?>
                    <option value="<?=$tutor->staff_id;?>"<?=isset($module_tutors[0]->tutor_id) && $module_tutors[0]->tutor_id == $tutor->staff_id ? ' selected' : '';?>><?='#' . $tutor->staff_id . ' ' . $tutor->firstname . ' ' . $tutor->surname?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="module_tutor2">Tutor #2</label>
                  <select class="form-control" id="module_tutor2" name="module_tutor[]">
                    <option></option>
                    <?php foreach($tutors as $tutor) { ?>
                    <option value="<?=$tutor->staff_id;?>"<?=isset($module_tutors[1]->tutor_id) && $module_tutors[1]->tutor_id == $tutor->staff_id ? ' selected' : '';?>><?='#' . $tutor->staff_id . ' ' . $tutor->firstname . ' ' . $tutor->surname?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="module_tutor3">Tutor #3</label>
                  <select class="form-control" id="module_tutor3" name="module_tutor[]">
                    <option></option>
                    <?php foreach($tutors as $tutor) { ?>
                    <option value="<?=$tutor->staff_id;?>"<?=isset($module_tutors[2]->tutor_id) && $module_tutors[2]->tutor_id == $tutor->staff_id ? ' selected' : '';?>><?='#' . $tutor->staff_id . ' ' . $tutor->firstname . ' ' . $tutor->surname?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-success mb-4" name="submit"><i class="fas fa-check"></i> Submit</button>
              </div>
            </div>

          </form>