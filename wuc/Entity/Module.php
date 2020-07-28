<?php
namespace wuc\Entity;

class Module {
    public $tutorsTable;
    public $module_tutorsTable;

    public $code;

    public function __construct(\CSY2028\DatabaseTable $module_tutorsTable, \CSY2028\DatabaseTable $tutorsTable) {
        $this->module_tutorsTable = $module_tutorsTable;
        $this->tutorsTable = $tutorsTable;
    }
    
    public function getModuleTutorsNames() {
        $module_tutors = $this->module_tutorsTable->find('module_code', $this->code);
        $tutors_IDs = [];
        foreach($module_tutors as $module_tutor) {
            $tutors_IDs[] = $module_tutor->tutor_id;
        };
        
        $tutors_names = [];
        foreach($tutors_IDs as $tutor_id) {
            $tutor = $this->tutorsTable->find('staff_id', $tutor_id)[0];
            $tutors_names[] = $tutor->firstname . ' ' . $tutor->surname;
        }
        
        return implode(', ',$tutors_names);
    }
}