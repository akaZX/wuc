<?php
namespace wuc\Controllers;

class Dashboard {
    private $studentsTable;
    private $staffTable;
    private $coursesTable;
    private $modulesTable;
    private $module_tutorsTable;
    private $course_modulesTable;


    public function __construct($studentsTable, $staffTable, $coursesTable, $modulesTable, $module_tutorsTable, $course_modulesTable) {
        $this->studentsTable = $studentsTable;
        $this->staffTable = $staffTable;
        $this->coursesTable = $coursesTable;
        $this->modulesTable = $modulesTable;
        $this->module_tutorsTable = $module_tutorsTable;
        $this->course_modulesTable = $course_modulesTable;
    }

    public function home() {
        $dashboardData = [
            'live_student_count' => count($this->studentsTable->find('status', 'Live')),
            'live_ft_student_count' => count($this->studentsTable->findCompound('status', 'Live', 'type', 'FT')),
            'live_pt_student_count' => count($this->studentsTable->findCompound('status', 'Live', 'type', 'PT')),
            'live_dl_student_count' => count($this->studentsTable->findCompound('status', 'Live', 'type', 'DL')),
            'live_staff_count' => count($this->staffTable->find('status', 'Live')),
            'courses_count' => count($this->coursesTable->findAll())
        ];

        /* STUDENT DATA QUERIES */
        $stud = $this->studentsTable->find('student_number', $_SESSION['user_id']);
        $student = false;
        $current_course = false;
        if($stud) {
            $student = $stud[0];
            $student_department_code = preg_replace('/[^a-zA-Z]/', '', $student->course_code);
            $student_course_id = preg_replace('/[^0-9]/', '', $student->course_code);
    
            $current_course = $this->coursesTable->findCompound('department_code', $student_department_code, 'course_id', $student_course_id)[0];
        }
        /* STUDENT DATA QUERIES */


        /* RELATED STUDENTS QUERIES */
        $related_modules = $this->module_tutorsTable->find('tutor_id', $_SESSION['user_id']);
        $tutor_related_courses = [];
        $tutor_related_students = [];
        // var_dump($related_modules);
        foreach($related_modules as $module) {

            $related_courses = $this->course_modulesTable->find('module_code', $module->module_code);
            // var_dump($related_course);
            // var_dump($related_courses);
            foreach($related_courses as $rc) {
                // var_dump($rc->course_code);
                $tutor_related_courses[] = $rc->course_code;
            }
            
            
        }

        $tutor_related_courses = array_unique($tutor_related_courses);

        foreach($tutor_related_courses as $course) {
            $related_students = $this->studentsTable->find('course_code', $course);
            
            foreach($related_students as $rs) {
                $tutor_related_students[] = $rs;
            }
        }
        /* RELATED STUDENTS QUERIES */



        $encodedDashboardData = json_encode($dashboardData);

        return ['template' => '../templates/home.html.php',
                'title' => 'WUC Dashboard',
                'variables' => [
                    'dashboardData' => $dashboardData,
                    'encodedDashboardData' => $encodedDashboardData,
                    'student' => $student,
                    'current_course' => $current_course,
                    'related_students' => $tutor_related_students
                    ]
                ];
    }
}