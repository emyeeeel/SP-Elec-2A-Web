<?php

namespace University;

class Teacher {
    private $title;
    private $name;

    public function __construct($title, $name) {
        $this->title = $title;
        $this->name = $name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getName() {
        return $this->name;
    }
}
?>
