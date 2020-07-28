<?php
namespace wuc\Controllers;

class Staff {
    private $staffTable;

    public function __construct($staffTable) {
        $this->staffTable = $staffTable;
    }
       
    public function list() {
        $staff = $this->staffTable->findAll();

        return ['template' => '../templates/stafflist.html.php',
                'title' => 'Staff list',
                'variables' => [
                    'staff' => $staff
                    ]
                ];
    }

    public function editSubmit() {
        $staffMember = $_POST['staffMember'];

// START FILE UPLOAD
$staff_profile_img_dir = "./img/profiles/staff/";
$uploadOk = 1;
$uploaded_image = '';
$target_file = $staff_profile_img_dir . basename($_FILES['image']['name']);

    //checking if real image is being uploaded
    $isRealImg = true;

    if($target_file != $staff_profile_img_dir) {

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
            // var_dump("Sorry, file " . pathinfo($target_file)['basename'] . " already exists.");
            $uploadOk = 0;
        } else {
            // var_dump("new file uploading");
        }

        if ($uploadOk == 0) {
            // var_dump("Sorry, your file was not uploaded.");
        // if everything is ok, try to upload file
        } else {            
            $tmp_name = $_FILES['image']['tmp_name'];
            $name = basename($_FILES['image']['name']);
            $uploaded_image = $name;

            move_uploaded_file($tmp_name, "$staff_profile_img_dir/$name");
            
        }
    }
        $staffMember['image'] = $uploaded_image;
    
// STOP FILE UPLOAD
        $username = $this->staffTable->getLastID('staff_id') + 1;
        $university_email = strtolower($staffMember['firstname'] . '.' . $staffMember['surname'] . '@wuc.ac.uk');

        $staffMember['university_email'] = $university_email;
        $staffMember['username'] = $username;
        //For now, password is static. It will be generated and hashed.
        $staffMember['password'] = 'password';
        $this->staffTable->save($staffMember, 'staff_id');
        header('location: /staff/list');
    }

    public function editForm() {
        if (isset($_GET['id'])) {
            $result = $this->staffTable->find('staff_id', $_GET['id']);
            $staffMember = $result[0];
        }
        else {
            $staffMember = false;
        }
        return [
            'template' => '../templates/editstaff.html.php',
            'variables' => ['staffMember' => $staffMember],
            'title' => 'Staff member details'
        ];
    }

    public function makeLive() {
        $this->staffTable->updateSingleValue('status', 'Live', 'staff_id', $_POST['staff_id']);
        header('location: /staff/list');
    }

    public function makeDormant() {
        $this->staffTable->updateSingleValue('status', 'Dormant', 'staff_id', $_POST['staff_id']);
        header('location: /staff/list');
    }
    
}