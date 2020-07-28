          <!-- Page Heading -->
          <div class="row mb-2">
              <div class="col-sm-12 text-md-right text-sm-center">
                <a href="/module/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add new module</a>
                <a href="/module/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add from CSV</a>
              </div>
            </div>

          <!-- DataTales Example -->
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Credits</th>
                    <th>Tutor(s)</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Credits</th>
                    <th>Tutor(s)</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($modules as $module) { ?>
                    <tr>
                        <td width="7%"><?=$module->code; ?></td>
                        <td><?=$module->name?></td>
                        <td width="7%"><?=$module->year; ?></td>
                        <td width="7%"><?=$module->credits; ?></td>
                        <td><?=$module->getModuleTutorsNames();?></td>
                        <td width="5%" class="td-action"><a href="/module/edit?code=<?=$module->code; ?>" class="btn btn-warning px-2 py-1"><i class="fas fa-edit"></i></a></td>
                        <td width="5%" class="td-action">
                          <form action="/module/delete" method="POST">
                            <input type="hidden" name="code" value="<?=$module->code; ?>">
                            <button type="submit" class="btn btn-danger px-2 py-1" name="submit"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>