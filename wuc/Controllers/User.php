<?php
namespace wuc\Controllers;

class User {
    private $studentsTable;
    private $staffTable;
    private $coursesTable;

    public function __construct($studentsTable, $staffTable, $coursesTable) {
        $this->studentsTable = $studentsTable;
        $this->staffTable = $staffTable;
        $this->coursesTable = $coursesTable;
    }

    public function showProfile() {
        if (isset($_GET['id'])) {
            $user = false;
            
            if($this->studentsTable->ifUserExists('student_number', $_GET['id']) != false) {
                $user = $this->studentsTable->ifUserExists('student_number', $_GET['id']);
            } else if($this->staffTable->ifUserExists('staff_id', $_GET['id']) != false) {
                $user = $this->staffTable->ifUserExists('staff_id', $_GET['id']);
            }
        }
        else {
            $user = false;
        }

        //details of course of particular student
        if(isset($user->course_code)) {
            $department_code = preg_replace('/[^a-zA-Z]/', '', $user->course_code);
            $course_id = preg_replace('/[^0-9]/', '', $user->course_code);

            $current_course = $this->coursesTable->findCompound('department_code', $department_code, 'course_id', $course_id);
        } else {
            $current_course = false;
        }

        return [
            'template' => '../templates/profile.html.php',
            'variables' => ['user' => $user,
                            'current_course' => $current_course
                        ],
            'title' => 'Profile page'
        ];
    }

    public function displayLoginForm() {
        return [
            'template' => '../templates/login.html.php',
            'variables' => [],
            'title' => 'Log in'
        ];
    }

    public function login() {
        $credentialsEntered = $_POST['user'];


        if($this->studentsTable->ifUserExists('username', $credentialsEntered['username']) != false) {
            $matchedUser = $this->studentsTable->ifUserExists('username', $credentialsEntered['username']);
        } else if($this->staffTable->ifUserExists('username', $credentialsEntered['username']) != false) {
            $matchedUser = $this->staffTable->ifUserExists('username', $credentialsEntered['username']);
        } else {
            $matchedUser = false;
        }


        // var_dump($matchedUser);
        // die();
        //if any record matches entered username
        if($matchedUser != false) {
            // compare passwords
            if($credentialsEntered['password'] == $matchedUser->password) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_fullname'] = $matchedUser->firstname . ' ' . $matchedUser->middlename . ' ' . $matchedUser->surname;
                $_SESSION['user_id'] = $matchedUser->staff_id ?? $matchedUser->student_number;
                $_SESSION['access_level'] = $matchedUser->access_level;
                header('location: /');
            } else {
                // password incorrect
                header('location: /user/login');
            }

        } else {
            // no records matched
            header('location: /user/login');
        }

    }

    public function logout() {
        // unset($_SESSION['loggedIn']);
        // unset($_SESSION['user_fullname']);
        // unset($_SESSION['user_id']);
        // unset($_SESSION['access_level']);
        session_unset();
        header('location: /user/login');
    }
}