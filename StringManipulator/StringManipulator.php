<?php

class StringManipulator {
    private $str;

    public function __construct(){
        $this->str = '';
    }

    public function append($text) {
        $this->str .= $text;
        return $this; 
    }

    public function prepend($text) {
        $this->str = $text . $this->str;
        return $this; 
    }

    public function toUpperCase() {
        $this->str = strtoupper($this->str);
        return $this; 
    }

    public function toLowerCase() {
        $this->str = strtolower($this->str);
        return $this; 
    }

    public function getResult() {
        return $this->str;
    }
}


$manipulator = new StringManipulator();
echo $manipulator->append("world")->prepend("Hello ")->toUpperCase()->getResult();

?>
