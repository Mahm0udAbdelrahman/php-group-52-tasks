<?php
//  $arr = [3,6,7,18,34,88,150];
//  $co= count($arr);
//  for($i = 0 ; $i <$co ; $i++){
//      echo '<h1> num is : ' . $arr[$i] . '</h1>';
//  }

//  echo"<br>";
// for($i=0 ; $i<10 ;$i++){
//     echo'Number : ' .$i . '<br>';
// }
// $a = array(1, 2, 3, 17);

// foreach ($a as $v) {
//     echo "Current value of \$a: $v.\n";
// }

$cards = [
    ['name' => 'Card 1', 'value' => 10],
    ['name' => 'Card 2', 'value' => 5],
    ['name' => 'Card 3', 'value' => 8]
];

$duplicatedCards = [];

foreach ($cards as $card) {
    $duplicatedCards[] = $card; // Add original card
    $duplicatedCards[] = $card; // Add duplicated card
}

// Print duplicated cards
foreach ($duplicatedCards as $card) {
    echo "Card Name: " . $card['name'] . "\n";
    echo "Card Value: " . $card['value'] . "\n";
    echo "---------------------\n";
}

?>