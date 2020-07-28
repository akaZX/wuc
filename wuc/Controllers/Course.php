<?php
namespace wuc\Controllers;

class Course {
    private $coursesTable;
    private $staffTable;
    private $departmentsTable;
    private $modulesTable;
    private $course_modulesTable;

    public function __construct($coursesTable, $staffTable, $departmentsTable, $modulesTable, $course_modulesTable) {
        $this->coursesTable = $coursesTable;
        $this->staffTable = $staffTable;
        $this->departmentsTable = $departmentsTable;
        $this->modulesTable = $modulesTable;
        $this->course_modulesTable = $course_modulesTable;
    }
       
    public function list() {
        $courses = $this->coursesTable->findAll();   

        return ['template' => '../templates/courselist.html.php',
                'title' => 'Courses list',
                'variables' => [
                    'courses' => $courses
                    ]
                ];
    }

    public function editSubmit() {
        $course = $_POST['course'];
        $modules = $_POST['modules'];

        if(isset($_POST['course_code']) && $_POST['course_code'] !== '') {
            $course_code = explode('-', $_POST['course_code']);
            $department_code = $course_code[0];
            $course_id = $course_code[1];

            $course['department_code'] = $department_code;
            $course['course_id'] = $course_id;
            // var_dump($course);
            // die();

            //delete row from courses based on compound PK
            $this->coursesTable->deleteCompound('course_id', $course_id, 'department_code', $department_code);
            //delete row from course_modules associated with this course_id
            $this->course_modulesTable->delete('course_code', $department_code . $course_id);
            //re-insert into courses
            $this->coursesTable->insert($course);

            foreach($modules as $year => $year_modules) {
                foreach($year_modules as $key => $module_code) {
                    if($module_code !== '') {
                        //re-insert into course_modules
                        $this->course_modulesTable->insertCompound('course_code', $department_code . $course_id, 'module_code', $module_code);
                    }
                }
            }     
        } else {
            //getting last course_id from courses table
            $lastCourseId = (int)$this->coursesTable->getLastIDOnCondition('course_id', 'department_code', $course['department_code']);
            
            //generating new course_id based on above
            $newCourseId = sprintf('%04d', $lastCourseId + 1);

            //assign new course id based on last one in particular department in database
            $course['course_id'] = $newCourseId;
            $this->coursesTable->insert($course);

            foreach($modules as $year => $year_modules) {
                foreach($year_modules as $key => $module_code) {
                    if($module_code !== '') {
                        $this->course_modulesTable->insertCompound('course_code', $course['department_code'] . $course['course_id'], 'module_code', $module_code);
                    }
                }
            }
                
        }

        header('location: /course/list');
    }

    public function editForm() {
        if (isset($_GET['code'])) {
            $course_code = explode('-', $_GET['code']);
            $department_code = $course_code[0];
            $course_id = $course_code[1];


            $result = $this->coursesTable->findCompound('course_id', $course_id, 'department_code', $department_code);
            $course = $result[0];

            $course_modules = $this->course_modulesTable->findAll('course_code', $department_code . $course_id);
        }
        else {
            $course = false;
            $course_modules = false;
        }
        return [
            'template' => '../templates/editcourse.html.php',
            'variables' => ['course' => $course,
                            'departments' => $this->departmentsTable->findAll(),
                            'tutors' => $this->staffTable->findAll(),
                            'modules' => [
                                'year1' => $this->modulesTable->find('year', 1),
                                'year2' => $this->modulesTable->find('year', 2),
                                'year3' => $this->modulesTable->find('year', 3),
                                'year4' => $this->modulesTable->find('year', 4)
                                ],
                            'course_modules' => $course_modules 
                            ],
            'title' => 'Course details'
        ];
    }

    public function delete() {
        $course_code = explode('-', $_POST['course_code']);
        $department_code = $course_code[0];
        $course_id = $course_code[1];

        $this->course_modulesTable->delete('course_code', $department_code . $course_id);
        $this->coursesTable->deleteCompound('course_id', $course_id, 'department_code', $department_code);

        header('location: /course/list');
    }
}


















/*
--------------OLD, WORKING BUT MESSY-------------------

namespace wuc\Controllers;

class Course {
    private $coursesTable;
    private $staffTable;

    public function __construct($coursesTable, $staffTable) {
        $this->coursesTable = $coursesTable;
        $this->staffTable = $staffTable;
    }
       
    public function list() {
        unset($_SESSION['user_message']);

        $courses = $this->coursesTable->findAll();

        return ['template' => '../templates/courselist.html.php',
                'title' => 'Courses list',
                'variables' => [
                    'courses' => $courses
                    ]
                ];
    }

    public function editSubmit() {
        $course = $_POST['course'];
        // $existing_course = $_POST['existing_course'];

        if($_POST['existing_course'] == '') {
            $course['code'] = $_POST['existing_course'];
        } else {
            $course['code'] = $course['department_code'] . $course['course_id'];
        }

        if($this->coursesTable->find('code', $course['code'])){
            $_SESSION['user_message'] = '<div class="alert alert-danger" role="alert">
            Course code ' . $course['code'].' is already used. Change either ID or Department!
          </div>';
            header('location: /course/edit');
        } else {
            $this->coursesTable->save($course, 'code');
            header('location: /course/list');
        }
        // var_dump($course['code']);
        // die();
        // $this->coursesTable->save($course, 'code');
        // header('location: /course/edit');
    }

    public function editForm() {
        if (isset($_GET['code'])) {
            $result = $this->coursesTable->find('code', $_GET['code']);
            $course = $result[0];
        }
        else {
            $course = false;
        }
        return [
            'template' => '../templates/editcourse.html.php',
            'variables' => ['course' => $course,
                            'tutors' => $this->staffTable->findAll()
                        ],
            'title' => 'Course details'
        ];
    }

    // public function delete() {
    //     $this->modulesTable->delete('student_number', $_POST['id']);

    //     header('location: /student/list');
    // }
}

*/