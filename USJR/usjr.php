<?php
require_once 'autoload.php';

use University\University;

$university = University::createUniversity();
University::printUniversityDetails($university);
?>
