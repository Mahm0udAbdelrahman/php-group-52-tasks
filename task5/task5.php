<?php
function calculateFactorial($number) {
    if ($number < 0) {
        return "Invalid input. Please provide a non-negative integer.";
    }

    $factorial = 1;
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }

    return $factorial;
}
$number = 5;
$result = calculateFactorial($number);
echo "The factorial of $number is: $result";
#======================================================================================================
echo '<br>';
echo '<br>';

function reverseString($input) {
    return strrev($input);
}
$input = "ahmed";
$result = reverseString($input);
echo "Reversed input: " . $result;
#======================================================================================================

echo '<br>';
echo '<br>';

function calFactorial($number) {
    if ($number < 0) {
        return "Invalid input. Please provide a non-negative integer.";
    }

    if ($number === 0 || $number === 1) {
        return 1;
    }

    return $number * calFactorial($number - 1);
}
$number =3;
$result = calFactorial($number);
echo "The factorial of $number is: $result";
#======================================================================================================

echo '<br>';
echo '<br>';
function getFirstWord($sentence) {
    $words = explode(' ', trim($sentence));
    return $words[0];
}

$sentence = "Hello, how are you?";
$firstWord = getFirstWord($sentence);
echo "The first word of the sentence is: " . $firstWord;
#======================================================================================================


echo '<br>';
echo '<br>';

function generateRandomPassword($length, $characters) {
    $password = '';
    $charactersLength = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, $charactersLength - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

$allowedCharacters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$passwordLength = 8;

$randomPassword = generateRandomPassword($passwordLength, $allowedCharacters);
echo "Random Password: " . $randomPassword;
#======================================================================================================


echo '<br>';
echo '<br>';

for ($i = 1; $i <= 10; $i++) {
    echo $i . ' ';
}



?>