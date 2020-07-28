<?php
namespace wuc\Entity;

class Course {
    public $tutorsTable;
    public $course_modulesTable;
    public $modulesTable;
    public $departmentsTable;

    public $head_tutor_id;
    public $course_id;
    public $department_code;

    public function __construct(\CSY2028\DatabaseTable $tutorsTable, \CSY2028\DatabaseTable $course_modulesTable, \CSY2028\DatabaseTable $modulesTable, \CSY2028\DatabaseTable $departmentsTable) {
        $this->tutorsTable = $tutorsTable;
        $this->course_modulesTable = $course_modulesTable;
        $this->modulesTable = $modulesTable;
        $this->departmentsTable = $departmentsTable;
    }

    public function getDepartmentName() {
        $department = $this->departmentsTable->find('code', $this->department_code)[0];

        return $department->name;
    }

    public function getHeadTutorName() {
        $head_tutor = $this->tutorsTable->find('staff_id', $this->head_tutor_id)[0];

        return $head_tutor->firstname . ' ' . $head_tutor->surname;
    }

    public function getModulesNames() {
        $course_modules = $this->course_modulesTable->find('course_code', $this->department_code . $this->course_id);
        $modules_codes = [];
        foreach($course_modules as $course_module) {
            $modules_codes[] = $course_module->module_code;
        }
        
        $modules_names = [];
        foreach($modules_codes as $module_code) {
            $module = $this->modulesTable->find('code', $module_code)[0];
            $modules_names[] = $module->name;
        }
        
        return implode(', ', $modules_names);
    }
}