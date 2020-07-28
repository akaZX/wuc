<?php
namespace wuc\Controllers;

class Student {
    private $studentsTable;
    private $coursesTable;

    public function __construct($studentsTable, $coursesTable) {
        $this->studentsTable = $studentsTable;
        $this->coursesTable = $coursesTable;
    }
       
    public function list() {
        $students = $this->studentsTable->findAll();   

        return ['template' => '../templates/studentlist.html.php',
                'title' => 'Students list',
                'variables' => [
                    'students' => $students
                    ]
                ];
    }

    public function editSubmit() {
        $student = $_POST['student'];

// START FILE UPLOAD
$student_profile_img_dir = "./img/profiles/students/";
$uploadOk = 1;
$uploaded_image = '';
$target_file = $student_profile_img_dir . basename($_FILES['image']['name']);

    //checking if real image is being uploaded
    $isRealImg = true;

    if($target_file != $student_profile_img_dir) {

        if(getimagesize($_FILES['image']['tmp_name']) === false) {
            $isRealImg = false;
        }

        if($isRealImg !== false) {
            // var_dump('will upload soon');
            $uploadOk = 1;
        } else {
            // var_dump('error, fake img!!!');
            $uploadOk = 0;
        }

        if(file_exists($target_file)) {
            var_dump("Sorry, file " . pathinfo($target_file)['basename'] . " already exists.");
            $uploadOk = 0;
        } else {
            // var_dump("new file uploading");
        }

        if ($uploadOk == 0) {
            var_dump("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {            
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = basename($_FILES['image']['name']);
            $uploaded_image = $name;

            move_uploaded_file($tmp_name, "$student_profile_img_dir/$name");
            
        }
    }
        $student['image'] = $uploaded_image;
    
// STOP FILE UPLOAD


        $username = $this->studentsTable->getLastID('student_number') + 1;
        
        $student['date_registered'] = date("Y-m-d");
        $student['university_email'] = $username . '@wuc.ac.uk';
        $student['username'] = $username;
        $student['password'] = 'password';
        $this->studentsTable->save($student, 'student_number');
        header('location: /student/list');
    }

    public function editForm() {
        if (isset($_GET['id'])) {
            $result = $this->studentsTable->find('student_number', $_GET['id']);
            $student = $result[0];
        }
        else {
            $student = false;
        }
        return [
            'template' => '../templates/editstudent.html.php',
            'variables' => ['student' => $student,
                            'courses' => $this->coursesTable->findAll()
                        ],
            'title' => 'Student details'
        ];
    }
    
    public function makeLive() {
        $this->studentsTable->updateSingleValue('status', 'Live', 'student_number', $_POST['student_number']);
        header('location: /student/list');
    }

    public function makeDormant() {
        $this->studentsTable->updateSingleValue('status', 'Dormant', 'student_number', $_POST['student_number']);
        header('location: /student/list');
    }
}