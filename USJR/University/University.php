<?php

namespace University;

class University {
    public static function createUniversity() {
        $school = new School("University of San-Jose Recoletos");

        $discipline1 = new Discipline("ITELEC1A", 101, 30, 10);
        $discipline2 = new Discipline("ITELEC1A", 102, 35, 12);

        $teacher1 = new Teacher("Dr.", "Gregg Gabison");
        $teacher2 = new Teacher("Ms.", "Marisa Mahilom");
        $teacher3 = new Teacher("Mr.", "Roderick Bandalan");

        $student1 = new Student("Abastas, Clint", 1);
        $student2 = new Student("Bunac, James", 1);
        $student3 = new Student("Cabatingan, Eugene", 1);
        $student4 = new Student("Evangelista, Jullene Jane", 1);
        $student5 = new Student("Gudio, Jeoffrey", 1);
        $student6 = new Student("Moreno, Richard", 1);
        $student7 = new Student("Rebutazo, Jeffrey", 1);
        $student8 = new Student("Salares, Roy", 1);


        $student9 = new Student("Artiaga, Resty", 2);
        $student10 = new Student("Chan, Donnah Marizh", 2);
        $student11 = new Student("Libato, Mikee", 2);
        $student12 = new Student("Pagador, John", 2);
        $student13 = new Student("Panorel, Justine", 2);
        $student14 = new Student("Patalinghug, Jerald", 2);
        $student15 = new Student("Valenzona, Pach", 2);

        $classSchedule1 = new ClassSchedule(1, "10:00am-11:30am", $discipline1);
        $classSchedule2 = new ClassSchedule(2, "8:30am-10:00am", $discipline2);

        $classSchedule1->addTeacher($teacher1);
        $classSchedule1->addTeacher($teacher2);
        $classSchedule1->addStudent($student1);
        $classSchedule1->addStudent($student2);
        $classSchedule1->addStudent($student3);
        $classSchedule1->addStudent($student4);
        $classSchedule1->addStudent($student5);
        $classSchedule1->addStudent($student6);
        $classSchedule1->addStudent($student7);
        $classSchedule1->addStudent($student8);

        $classSchedule2->addTeacher($teacher3);
        $classSchedule2->addStudent($student9);
        $classSchedule2->addStudent($student10);
        $classSchedule2->addStudent($student11);
        $classSchedule2->addStudent($student12);
        $classSchedule2->addStudent($student13);
        $classSchedule2->addStudent($student14);
        $classSchedule2->addStudent($student15);

        $school->addClassSchedule($classSchedule1);
        $school->addClassSchedule($classSchedule2);

        return $school;
    }

    public static function printUniversityDetails(School $school) {
        echo $school->getName() . "<br><br>"; 
        
        foreach ($school->getClassSchedules() as $schedule) {
            echo $schedule->getId() . " " . $schedule->getDiscipline()->getName() . " " . $schedule->getTimeSlot() . "<br>";
            
            $teachers = $schedule->getTeachers();
            $teacherCount = count($teachers);
    
            if ($teacherCount == 1) {
                echo "Teacher:<br>";  
            } else {
                echo "Teachers:<br>";  
            }
    
            foreach ($teachers as $teacher) {
                echo $teacher->getTitle() . " " . $teacher->getName() . "<br>";
            }
    
            echo "<br>"; 
    
            foreach ($schedule->getStudents() as $student) {
                echo $student->getName() . "<br>";
            }
            echo "<br>";  
        }
    }
    
    
}
?>
