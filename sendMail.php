<?php

$subject = "MY TEST EMAIL";

echo "============<br>";
echo $subject . "<br>";
echo "============<br>";

$firstName = "Violetta";
$lastName = "Ilina";
$group = "538";

$text1 = "First Name: " . $firstName . "\n";
$text2 = "Last Name: " . $lastName . "\n";
$text3 = "Group: " . $group . "\n";

$message = $text1 . $text2 . $text3;

echo "<br>Message:<br>";
echo $text1 . "<br>";
echo $text2 . "<br>";
echo $text3 . "<br>";

$headers = "From: v.v.ilina@student.khai.edu";

mail(
    "ilinavioletta6336@gmail.com",
    $subject,
    $message,
    $headers
);

echo "<br><br>Email sent (if configured correctly).";
