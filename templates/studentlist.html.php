          <!-- Page Heading -->
          <div class="row mb-2">
              <div class="col-sm-12 text-md-right text-sm-center">
                <a href="/student/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add new student</a>
                <a href="/student/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add from CSV</a>
              </div>
            </div>

          <!-- DataTales Example -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Course</th>
                    <th>Mobile no.</th>
                    <th>Private email</th>
                    <th>More/Edit</th>
                    <th>Make live</th>
                    <th>Make dormant</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status & comment</th>
                    <th>Course</th>
                    <th>Mobile no.</th>
                    <th>Private email</th>
                    <th>More/Edit</th>
                    <th>Make live</th>
                    <th>Make dormant</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($students as $student) { ?>
                    <tr>
                    <td width="5%"><?=$student->student_number; ?></td>
                    <td><?=$student->firstname . ' ' . $student->surname ?></td>
                    <td><?=$student->status; ?></td>
                    <td><?=isset($student->course_code) && $student->course_code != '' ? $student->getCourseName() : ''; ?></td>
                    <td><?=$student->mobile_no; ?></td>
                    <td><a href="mailto:<?=$student->personal_email; ?>"><?=$student->personal_email; ?></a></td>
                    <td width="7%" class="td-action"><a href="/student/edit?id=<?=$student->student_number; ?>" class="btn btn-warning px-2 py-1"><i class="fas fa-edit"></i></a></td>
                    <td class="td-action">
                      <form action="/student/makelive" method="POST">
                        <input type="hidden" name="student_number" value="<?=$student->student_number; ?>">
                        <button type="submit" class="btn btn-success px-2 py-1" name="submit"><i class="fas fa-check"></i></button>
                      </form>  
                    </td>
                    <td class="td-action">
                      <form action="/student/makedormant" method="POST">
                        <input type="hidden" name="student_number" value="<?=$student->student_number; ?>">
                        <button type="submit" class="btn btn-danger px-2 py-1" name="submit"><i class="fas fa-archive"></i></button>
                      </form>  
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
