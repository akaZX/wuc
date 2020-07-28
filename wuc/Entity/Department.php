<?php
namespace wuc\Entity;

class Department {
    public $tutorsTable;

    public $head_tutor_id;

    public function __construct(\CSY2028\DatabaseTable $tutorsTable) {
        $this->tutorsTable = $tutorsTable;
    }
    
    public function getDeptHeadName() {
        return $this->tutorsTable->find('staff_id', $this->head_tutor_id)[0];
    }
}