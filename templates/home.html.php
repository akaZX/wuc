<!-- Content Row -->

<?php if(!isset($_SESSION['access_level'])) { ?>
<!-- STUDENT VIEW START -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">NEXT DUE</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">27/05 - Databases 2 exam</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CURRENT COURSE</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$current_course->name ?? ''?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Personal Tutor</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Raj Singh</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-tie fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Your attendance this year</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">86%</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-chart-line fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- STUDENT VIEW END -->
<?php } ?>

<?php if(isset($_SESSION['user_fullname']) && $_SESSION['user_fullname'] == 'Adam  Blake') { ?>
<!-- ADMIN VIEW START -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Live students</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$dashboardData['live_student_count']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Courses available</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$dashboardData['courses_count']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Staff currently employed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$dashboardData['live_staff_count']?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Overall attendance this year</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">77%</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Budget Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item" href="#">More details</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Hide</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Live students split</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item" href="#">More details</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Hide</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Full-time
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Part-time
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Distance learning
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ADMIN VIEW END -->
<?php } ?>


<?php if(isset($_SESSION['user_fullname']) && $_SESSION['user_fullname'] != 'Adam  Blake' && isset($_SESSION['access_level'])) { ?>
<!-- ACADEMICS VIEW START -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">NEXT PT MEETING</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">11/05 11:45<br>John Beeby<br>LH401</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">NEXT SESSION</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">03/05 10:00<br>Web Design & Development<br>LH311</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                        <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">STUDENTS ON MY MODULES</div>

          <!-- DataTales Example -->
          <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Student number</th>
                    <th>Name</th>
                    <th>Course</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Student number</th>
                    <th>Name</th>
                    <th>Course</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($related_students as $student) { ?>
                    <tr>
                    <td width="5%"><?=$student->student_number; ?></td>
                    <td><?=$student->firstname . ' ' . $student->surname ?></td>
                    <td><?=$student->getCourseName(); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- ACADEMICS VIEW END -->
<?php } ?>

            </div> 
          </div>

        </div>
        <!-- /.container-fluid -->

<?php 
  echo '<script>';
  echo 'var encodedDashboardData = '. $encodedDashboardData;
  echo '</script>';
?>