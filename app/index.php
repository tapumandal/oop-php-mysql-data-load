<?php

include './database.php';
include './user.php';
include './test_result.php';

$db = database::getInstance();
$db->connect("localhost", "", "", "test");




$user = new User($db);
$user->load()->printTable();

$user = new TestResult($db);
$user->load()->printTable();