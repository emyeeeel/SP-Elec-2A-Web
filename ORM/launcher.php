<?php

require_once 'init2.php';

$db = new DBORM('mysql:host=localhost;dbname=usjr','root','root');


// $result = $db->table('students')->insert(['124','Gudio','Camocamo','Jeoffrey','BSIT',4,'SCS']);  // sample insertion
// echo $db->showQuery();

//  $result = $db->select()->from('students')->getAll(); // Get all rows from a table
//  echo $db->showQuery();

// $result = $db->select()->from('students')->where('studcollege','SCS')->getAll(); // Get all rows from a table matching a criteria
// echo $db->showQuery();

// $result = $db->select()->from('students')->where('studfname','Roderick')->get(); // Get a single row fron a table that matches the criteria
// echo $db->showQuery();

$result = $db->table('students')->where('studfirstname','Kang')->update(['studfirstname'=>'Hanni']); // sample update
echo $db->showQuery();

// $result = $db->table('students')->where('studid', 789456123)->delete(); // sample delete
// echo $db->showQuery();