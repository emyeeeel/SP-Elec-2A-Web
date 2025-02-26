<?php

namespace University;

class School {
    private $name;
    private $classSchedules;

    public function __construct($name) {
        $this->name = $name;
        $this->classSchedules = [];
    }

    public function addClassSchedule(ClassSchedule $classSchedule) {
        $this->classSchedules[] = $classSchedule;
    }

    public function getClassSchedules() {
        return $this->classSchedules;
    }

    public function getName() {
        return $this->name;
    }
}
?>
