<?php
namespace wuc\Controllers;

class Module {
    private $modulesTable;
    private $staffTable;
    private $module_tutorsTable;

    public function __construct($modulesTable, $staffTable, $module_tutorsTable) {
        $this->modulesTable = $modulesTable;
        $this->staffTable = $staffTable;
        $this->module_tutorsTable = $module_tutorsTable;
    }
       
    public function list() {
        $modules = $this->modulesTable->findAll();   

        return ['template' => '../templates/modulelist.html.php',
                'title' => 'Modules list',
                'variables' => [
                    'modules' => $modules
                    ]
                ];
    }

    public function editSubmit() {
        /* 
        
        ADD VALIDATION TO SHOW ERROR INSTEAD OF UPDATING WHEN INSERTING USING EXISTING ID
        
        */
        $module = $_POST['module'];

        $module_code = $module['code'];
        $tutors = $_POST['module_tutor'];

        //delete all rows associated with this module
        $this->module_tutorsTable->delete('module_code', $module_code);
        //insert rows again
        foreach($tutors as $key => $tutor_id) {
            if($tutor_id !== '') {
                $this->module_tutorsTable->insertCompound('module_code', $module_code, 'tutor_id', $tutor_id);
            }
        }

        $this->modulesTable->save($module, 'code');
        header('location: /module/list');
    }

    public function editForm() {
        if (isset($_GET['code'])) {
            $result = $this->modulesTable->find('code', $_GET['code']);
            $module = $result[0];

            $module_tutors = $this->module_tutorsTable->find('module_code', $module->code);
        }
        else {
            $module = false;
            $module_tutors = false;
        }
        return [
            'template' => '../templates/editmodule.html.php',
            'variables' => ['module' => $module,
                            'tutors' => $this->staffTable->findAll(),
                            'module_tutors' => $module_tutors
                        ],
            'title' => 'Module details'
        ];
    }

    public function delete() {
        $this->modulesTable->delete('code', $_POST['code']);
        $this->module_tutorsTable->delete('module_code', $_POST['code']);

        header('location: /module/list');
    }
}