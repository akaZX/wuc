<?php
namespace wuc\Controllers;

class Department {
    private $departmentsTable;
    private $staffTable;
    private $coursesTable;

    public function __construct($departmentsTable, $staffTable, $coursesTable) {
        $this->departmentsTable = $departmentsTable;
        $this->staffTable = $staffTable;
        $this->coursesTable = $coursesTable;
    }
       
    public function list() {
        $departments = $this->departmentsTable->findAll();   

        return ['template' => '../templates/departmentlist.html.php',
                'title' => 'Departments list',
                'variables' => [
                    'departments' => $departments
                    ]
                ];
    }

    public function editSubmit() {
        $department = $_POST['department'];

        try {
            $this->departmentsTable->insert($department);
        } catch (\PDOException $e) {
            //using "\" as we are using namespaces and we need to look in global scope of classes rather than namespace
            header('location: /department/list');
        }

        header('location: /department/list');
    }

    public function editForm() {
        return [
            'template' => '../templates/editdepartment.html.php',
            'variables' => ['tutors' => $this->staffTable->findAll()],
            'title' => 'Department details'
        ];
    }

    public function delete() {
        $this->departmentsTable->delete('code', $_POST['code']);
        //also, delete all courses associated with this department
        $this->coursesTable->delete('department_code', $_POST['code']);

        header('location: /department/list');
    }
}