          <!-- Page Heading -->
          <div class="row mb-2">
              <div class="col-sm-12 text-md-right text-sm-center">
                <a href="/course/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add new course</a>
                <a href="/course/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add from CSV</a>
              </div>
            </div>

          <!-- DataTales Example -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Dept.</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Type</th>
                    <th>Duration</th>
                    <th>Modules</th>
                    <th>Head tutor</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Code</th>
                    <th>Dept.</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Type</th>
                    <th>Duration</th>
                    <th>Modules</th>
                    <th>Head tutor</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($courses as $course) { ?>
                    <tr>
                        <td width="7%"><?=$course->department_code . $course->course_id; ?></td>
                        <td width="7%"><?=$course->getDepartmentName(); ?></td>
                        <td><?=$course->name?></td>
                        <td width="7%"><?=$course->degree_type; ?></td>
                        <td width="7%"><?=$course->type; ?></td>
                        <td width="7%"><?=$course->duration . ' year(s)'; ?></td>
                        <td><?=$course->getModulesNames();?></td>
                        <td width="7%"><?=$course->getHeadTutorName();?></td>
                        <td width="7%" class="td-action"><a href="/course/edit?code=<?=$course->department_code . '-' . $course->course_id; ?>" class="btn btn-warning px-2 py-1"><i class="fas fa-edit"></i></a></td>
                        <td width="7%" class="td-action">
                          <form action="/course/delete" method="POST">
                            <input type="hidden" name="course_code" value="<?=$course->department_code . '-' . $course->course_id; ?>">
                            <button type="submit" class="btn btn-danger px-2 py-1" name="submit"><i class="fas fa-trash"></i></button>
                          </form>  
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

            