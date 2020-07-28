<?php
namespace wuc;

class Routes implements \CSY2028\RoutesInterface {
    public function getRoutes() {
        require '../database.php';
        $staffTable = new \CSY2028\DatabaseTable($pdo, 'staff', 'staff_id');
        $module_tutorsTable = new \CSY2028\DatabaseTable($pdo, 'module_tutors', '');
        $modulesTable = new \CSY2028\DatabaseTable($pdo, 'modules', 'code', '\wuc\Entity\Module', [$module_tutorsTable, $staffTable]);
        $departmentsTable = new \CSY2028\DatabaseTable($pdo, 'departments', 'code', '\wuc\Entity\Department', [$staffTable]);
        $course_modulesTable = new \CSY2028\DatabaseTable($pdo, 'course_modules', '');
        $coursesTable = new \CSY2028\DatabaseTable($pdo, 'courses', '', '\wuc\Entity\Course', [$staffTable, $course_modulesTable, $modulesTable, $departmentsTable]);
        $studentsTable = new \CSY2028\DatabaseTable($pdo, 'students', 'student_number', '\wuc\Entity\Student', [$coursesTable]);
        // $coursesTable = new \CSY2028\DatabaseTable($pdo, 'courses', 'code', '\wuc\Entity\Course', [$staffTable]);
        // $jokesTable = new \CSY2028\DatabaseTable($pdo, 'joke', 'id', '\wuc\Entity\Joke', [$authorsTable, $categoriesTable]);
        
        $studentController = new \wuc\Controllers\Student($studentsTable, $coursesTable);
        $staffController = new \wuc\Controllers\Staff($staffTable);
        $moduleController = new \wuc\Controllers\Module($modulesTable, $staffTable, $module_tutorsTable);
        $departmentController = new \wuc\Controllers\Department($departmentsTable, $staffTable, $coursesTable);
        $courseController = new \wuc\Controllers\Course($coursesTable, $staffTable, $departmentsTable, $modulesTable, $course_modulesTable);
        $dashboardController = new \wuc\Controllers\Dashboard($studentsTable, $staffTable, $coursesTable, $modulesTable, $module_tutorsTable, $course_modulesTable);
        $userController = new \wuc\Controllers\User($studentsTable, $staffTable, $coursesTable);
        $staticPageController = new \wuc\Controllers\StaticPageController();

        $routes = [
            '' => [
                'GET' => [
                    'controller' => $dashboardController,
                    'function' => 'home'
                ],
                'login' => true
            ],
            'student/list' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'student/edit' => [
                'GET' => [
                    'controller' => $studentController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $studentController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'student/makelive' => [
                'POST' => [
                    'controller' => $studentController,
                    'function' => 'makeLive'
                ],
                'login' => true
            ],
            'student/makedormant' => [
                'POST' => [
                    'controller' => $studentController,
                    'function' => 'makeDormant'
                ],
                'login' => true
            ],
            'staff/list' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'staff/edit' => [
                'GET' => [
                    'controller' => $staffController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $staffController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'staff/makelive' => [
                'POST' => [
                    'controller' => $staffController,
                    'function' => 'makeLive'
                ],
                'login' => true
            ],
            'staff/makedormant' => [
                'POST' => [
                    'controller' => $staffController,
                    'function' => 'makeDormant'
                ],
                'login' => true
            ],
            'module/list' => [
                'GET' => [
                    'controller' => $moduleController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'module/edit' => [
                'GET' => [
                    'controller' => $moduleController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $moduleController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'module/delete' => [
                'POST' => [
                    'controller' => $moduleController,
                    'function' => 'delete'
                ],
                'login' => true
            ],
            'department/list' => [
                'GET' => [
                    'controller' => $departmentController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'department/edit' => [
                'GET' => [
                    'controller' => $departmentController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $departmentController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'department/delete' => [
                'POST' => [
                    'controller' => $departmentController,
                    'function' => 'delete'
                ],
                'login' => true
            ],

            'course/list' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'list'
                ],
                'login' => true
            ],
            'course/edit' => [
                'GET' => [
                    'controller' => $courseController,
                    'function' => 'editForm'
                ],
                'POST' => [
                    'controller' => $courseController,
                    'function' => 'editSubmit'
                ],
                'login' => true
            ],
            'course/delete' => [
                'POST' => [
                    'controller' => $courseController,
                    'function' => 'delete'
                ],
                'login' => true
            ],
            'user/profile' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'showProfile'
                ],
            ],
            'user/login' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'displayLoginForm'
                ],
                'POST' => [
                    'controller' => $userController,
                    'function' => 'login'
                ],
            ],
            'user/logout' => [
                'GET' => [
                    'controller' => $userController,
                    'function' => 'logout'
                ],
            ],
            'attendance' => [
                'GET' => [
                    'controller' => $staticPageController,
                    'function' => 'showStaticPage'
                ],
                'login' => true
            ],
            'timetable' => [
                'GET' => [
                    'controller' => $staticPageController,
                    'function' => 'showStaticPage'
                ],
                'login' => true
            ]
        ];

        return $routes;
    }

    public function checkLogin() {
        if (!isset($_SESSION['loggedIn'])) {
            // redirect to home page if trying to access some site without logging in
            header('location: /user/login');
        }
    }
}
   