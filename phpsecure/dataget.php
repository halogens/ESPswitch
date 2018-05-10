<?php

session_start();

// change below suitable to your database

$conn = new mysqli("aa", "aa", "aa", "aa");
$sql = "SELECT salonlight FROM ev.ev;";
$cevap1 = $conn->query($sql);
$row = $cevap1->fetch_assoc();
echo $row["salonlight"];