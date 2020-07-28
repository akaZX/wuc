          <!-- Page Heading -->
          <div class="row mb-2">
              <div class="col-sm-12 text-md-right text-sm-center">
                <a href="/staff/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add new member</a>
                <a href="/staff/edit" class="btn btn-primary"><i class="fas fa-plus"></i> Add from CSV</a>
              </div>
            </div>
          
          <!-- DataTales Example -->
              <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Mobile no.</th>
                        <th>Private Email</th>
                        <th>Roles</th>
                        <th>Spec. subjects</th>
                        <th>More/Edit</th>
                        <th>Make live</th>
                        <th>Make dormant</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Mobile no.</th>
                        <th>Private Email</th>
                        <th>Roles</th>
                        <th>Spec. subjects</th>
                        <th>More/Edit</th>
                        <th>Make live</th>
                        <th>Make dormant</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($staff as $staffMember) { ?>
                    <tr>
                      <td><?=$staffMember->staff_id; ?></td>
                      <td><?=$staffMember->firstname . ' ' . $staffMember->surname ?></td>
                      <td><?=$staffMember->status; ?></td>
                      <td><?=$staffMember->mobile_no; ?></td>
                      <td><a href="mailto:<?=$staffMember->personal_email; ?>"><?=$staffMember->personal_email; ?></a></td>
                      <td><?=$staffMember->roles; ?></td>
                      <td><?=$staffMember->specialist_subjects; ?></td>
                      <td class="td-action"><a href="/staff/edit?id=<?=$staffMember->staff_id; ?>" class="btn btn-warning px-2 py-1"><i class="fas fa-edit"></i></a></td>
                      <td class="td-action">
                        <form action="/staff/makelive" method="POST">
                          <input type="hidden" name="staff_id" value="<?=$staffMember->staff_id; ?>">
                          <button type="submit" class="btn btn-success px-2 py-1" name="submit"><i class="fas fa-check"></i></button>
                        </form>  
                      </td>
                      <td class="td-action">
                        <form action="/staff/makedormant" method="POST">
                          <input type="hidden" name="staff_id" value="<?=$staffMember->staff_id; ?>">
                          <button type="submit" class="btn btn-danger px-2 py-1" name="submit"><i class="fas fa-archive"></i></button>
                        </form>  
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>