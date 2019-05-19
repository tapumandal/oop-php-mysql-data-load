<?php

include './database.php';
include './user.php';
include './test_result.php';

$db = database::getInstance();
$db->connect("localhost", "", "", "test");




$user = new User($db);

$user->load("select u.first_name, u.last_name, avg(tr.correct) as correct, min(tr.time_taken) as time_taken from user u left join test_result tr on u.user_id = tr.user_id group by u.first_name")->jointResult();

$user->load("select * from user")->printTable();

$user = new TestResult($db);
$user->load("select * from test_result")->printTable();


