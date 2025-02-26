<?php

namespace University;

class ClassSchedule {
    private $id;
    private $timeSlot;
    private $teachers;
    private $students;
    private $discipline;

    public function __construct($id, $timeSlot, Discipline $discipline) {
        $this->id = $id;
        $this->timeSlot = $timeSlot;
        $this->teachers = [];
        $this->students = [];
        $this->discipline = $discipline;
    }

    public function addTeacher(Teacher $teacher) {
        $this->teachers[] = $teacher;
    }

    public function addStudent(Student $student) {
        $this->students[] = $student;
    }

    public function getTeachers() {
        return $this->teachers;
    }

    public function getStudents() {
        return $this->students;
    }

    public function getDiscipline() {
        return $this->discipline;
    }

    public function getId() {
        return $this->id;
    }

    public function getTimeSlot() {
        return $this->timeSlot;
    }
}

?>
