          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="/course/list" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Back to courses list</a>
          </div>

          <form action="" method='POST'>
            <div class="row justify-content-md-center">
              <div class="col-sm-10 col-lg-8">
                <div class="form-group">
                  <input type="hidden" name="course_code" value="<?=isset($_GET['code']) ? $_GET['code'] : ''?>">
                  <label for="course_department">Department</label>
                  <select class="form-control" id="course_department" name="course[department_code]" <?=isset($_GET['code']) ? ' disabled' : ''?> required>
                      <!-- loop -->
                    <option value=""></option>
                    <?php foreach($departments as $department) { ?>
                      <option value="<?=$department->code;?>" <?=isset($course->department_code) && $course->department_code === $department->code ? ' selected' : ''?>><?=$department->name;?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="course_name">Name</label>
                  <input type="text" class="form-control" id="course_name" name="course[name]" value="<?=$course->name ?? ''?>" required>
                </div>
                <div class="form-group">
                  <label for="degree_type">Degree type</label>
                  <select class="form-control" id="degree_type" name="course[degree_type]" required>
                    <option value=""></option>
                    <option value="Foundation" <?=isset($course->degree_type) && $course->degree_type === 'Foundation' ? ' selected' : ''?>>Foundation Degree</option>
                    <option value="Bachelor" <?=isset($course->degree_type) && $course->degree_type === 'Bachelor' ? ' selected' : ''?>>Bachelor's Degree</option>
                    <option value="Master" <?=isset($course->degree_type) && $course->degree_type === 'Master' ? ' selected' : ''?>>Master's Degree</option>
                    <option value="Doctor" <?=isset($course->degree_type) && $course->degree_type === 'Doctor' ? ' selected' : ''?>>Doctoral Degree</option>
                    <option value="HND" <?=isset($course->degree_type) && $course->degree_type === 'HND' ? ' selected' : ''?>>HND</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="course_type">Type</label>
                  <select class="form-control" id="course_type" name="course[type]" required>
                    <option value=""></option>
                    <option value="FT" <?=isset($course->type) && $course->type === 'FT' ? ' selected' : ''?>>Full-time</option>
                    <option value="PT" <?=isset($course->type) && $course->type === 'PT' ? ' selected' : ''?>>Part-time</option>
                    <option value="DL" <?=isset($course->type) && $course->type === 'DL' ? ' selected' : ''?>>Distance Learning</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="course_duration">Duration</label>
                  <select class="form-control" id="course_duration" name="course[duration]" required>
                    <option value="1" <?=isset($course->duration) && $course->duration === '1' ? ' selected' : ''?>>1 year</option>
                    <option value="2" <?=isset($course->duration) && $course->duration === '2' ? ' selected' : ''?>>2 years</option>
                    <option value="3" <?=isset($course->duration) && $course->duration === '3' ? ' selected' : ''?>>3 years</option>
                    <option value="4" <?=isset($course->duration) && $course->duration === '4' ? ' selected' : ''?>>4 years</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="course_head_tutor">Head tutor</label>
                  <select class="form-control" id="course_head_tutor" name="course[head_tutor_id]">
                    <?php foreach($tutors as $tutor) {?>
                        <option value=""></option>
                        <option value="<?=$tutor->staff_id;?>" <?=isset($course->head_tutor_id) && $course->head_tutor_id === $tutor->staff_id ? ' selected' : ''?>><?='#' . $tutor->staff_id . ' ' . $tutor->firstname . ' ' . $tutor->surname?></option>
                    <?php } ?>
                  </select>
                </div>
          
                <!-- --------------YEAR 1 MODULES--------------- -->
                <h6 class="text-center mt-4">Year 1 Modules</h6>
                <div class="form-group row">
                  <label for="module-1-1" class="col-sm-1 col-form-label">#1</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-1" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-1-2" class="col-sm-1 col-form-label">#2</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-2" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-1-3" class="col-sm-1 col-form-label">#3</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-3" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-1-4" class="col-sm-1 col-form-label">#4</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-4" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-1-5" class="col-sm-1 col-form-label">#5</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-5" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-1-6" class="col-sm-1 col-form-label">#6</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-1-6" name="modules[year1][]">
                      <option value=""></option>
                      <?php foreach($modules['year1'] as $year1_module) { ?>
                      <option value="<?=$year1_module->code;?>"><?=$year1_module->code . ' ' . $year1_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- --------------YEAR 2 MODULES--------------- -->
                <h6 class="text-center mt-4">Year 2 Modules</h6>
                <div class="form-group row">
                  <label for="module-2-1" class="col-sm-1 col-form-label">#1</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-1" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-2-2" class="col-sm-1 col-form-label">#2</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-2" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-2-3" class="col-sm-1 col-form-label">#3</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-3" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-2-4" class="col-sm-1 col-form-label">#4</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-4" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-2-5" class="col-sm-1 col-form-label">#5</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-5" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-2-6" class="col-sm-1 col-form-label">#6</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-2-6" name="modules[year2][]">
                      <option value=""></option>
                      <?php foreach($modules['year2'] as $year2_module) { ?>
                      <option value="<?=$year2_module->code;?>"><?=$year2_module->code . ' ' . $year2_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- --------------YEAR 3 MODULES--------------- -->
                <h6 class="text-center mt-4">Year 3 Modules</h6>
                <div class="form-group row">
                  <label for="module-3-1" class="col-sm-1 col-form-label">#1</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-1" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-3-2" class="col-sm-1 col-form-label">#2</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-2" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-3-3" class="col-sm-1 col-form-label">#3</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-3" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-3-4" class="col-sm-1 col-form-label">#4</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-4" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-3-5" class="col-sm-1 col-form-label">#5</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-5" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-3-6" class="col-sm-1 col-form-label">#6</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-3-6" name="modules[year3][]">
                      <option value=""></option>
                      <?php foreach($modules['year3'] as $year3_module) { ?>
                      <option value="<?=$year3_module->code;?>"><?=$year3_module->code . ' ' . $year3_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- --------------YEAR 4 MODULES--------------- -->
                <h6 class="text-center mt-4">Year 4 Modules</h6>
                <div class="form-group row">
                  <label for="module-4-1" class="col-sm-1 col-form-label">#1</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-1" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-4-2" class="col-sm-1 col-form-label">#2</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-2" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-4-3" class="col-sm-1 col-form-label">#3</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-3" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-4-4" class="col-sm-1 col-form-label">#4</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-4" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-4-5" class="col-sm-1 col-form-label">#5</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-5" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="module-4-6" class="col-sm-1 col-form-label">#6</label>
                  <div class="col-sm-11">
                    <select class="form-control" id="module-4-6" name="modules[year4][]">
                      <option value=""></option>
                      <?php foreach($modules['year4'] as $year4_module) { ?>
                      <option value="<?=$year4_module->code;?>"><?=$year4_module->code . ' ' . $year4_module->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <button type="submit" class="btn btn-success mb-4" name="submit"><i class="fas fa-check"></i> Submit</button>
              </div>
            </div>

          </form>