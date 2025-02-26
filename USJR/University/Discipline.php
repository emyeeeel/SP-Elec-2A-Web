<?php

namespace University;

class Discipline {
    private $name;
    private $courseNumber;
    private $lectures;
    private $exercises;

    public function __construct($name, $courseNumber, $lectures, $exercises) {
        $this->name = $name;
        $this->courseNumber = $courseNumber;
        $this->lectures = $lectures;
        $this->exercises = $exercises;
    }

    public function getName() {
        return $this->name;
    }

    public function getCourseNumber() {
        return $this->courseNumber;
    }

    public function getLectures() {
        return $this->lectures;
    }

    public function getExercises() {
        return $this->exercises;
    }
}
?>
