<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = intval($_POST['length']);
    $includeUppercase = isset($_POST['uppercase']);
    $includeNumbers = isset($_POST['numbers']);
    $includeSpecial = isset($_POST['special']);

    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numberChars = '0123456789';
    $specialChars = '!@#$%^&*()-_=+<>?';

    $chars = $lowercaseChars;
    if ($includeUppercase) $chars .= $uppercaseChars;
    if ($includeNumbers) $chars .= $numberChars;
    if ($includeSpecial) $chars .= $specialChars;

    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }

    header("Location: index.php?password=" . urlencode($password));
    exit();
} else {
    header("Location: index.php");
    exit();
}