          <!-- Page Heading -->
          <div class="row mb-2">
              <div class="col-sm-12 text-md-right text-sm-center">
                <a href="/department/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add new department</a>
                <a href="/department/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add from CSV</a>
              </div>
            </div>

          <!-- DataTales Example -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Head tutor</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Head tutor</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($departments as $department) { ?>
                    <tr>
                        <td><?=$department->name?></td>
                        <td width="7%"><?=$department->code; ?></td>
                        <td><?=isset($department->head_tutor_id) && $department->head_tutor_id != '' ? $department->getDeptHeadName()->firstname . ' ' . $department->getDeptHeadName()->surname : ''; ?></td>
                        <td width="7%" class="td-action">
                          <form action="/department/delete" method="POST">
                            <input type="hidden" name="code" value="<?=$department->code; ?>">
                            <button type="submit" class="btn btn-danger px-2 py-1" name="submit"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>