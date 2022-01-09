<?php

$conn = mysqli_connect("localhost", "root", "", "ccs-dr");

if (!$conn) {
	die("Connection Failed: ".mysqli_connect_error());
}