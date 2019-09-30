<?php
include "conn.php";

$sql="create database aa";

$conn=$conn->query($sql);

var_dump($conn);