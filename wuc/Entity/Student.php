<?php
namespace wuc\Entity;

class Student {
    public $coursesTable;

    public $course_code;
    
    public function __construct(\CSY2028\DatabaseTable $coursesTable) {
        $this->coursesTable = $coursesTable;
    }
    
    public function getCourseName() {
        $department_code = preg_replace('/[^a-zA-Z]/', '', $this->course_code);
        $course_id = preg_replace('/[^0-9]/', '', $this->course_code);

        $course = $this->coursesTable->findCompound('department_code', $department_code, 'course_id', $course_id)[0];

        return $course->name;
    }
}