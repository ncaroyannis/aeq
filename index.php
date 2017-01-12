<?php
spl_autoload_register(function($class) {
    include 'classes/' . $class . '.php';
});

// Create Cards and People from the input
foreach ($argv as $key => $item) {
    if ($key === 0) continue; // Skip the filename argument

    try {
        $people[] = PersonFactory::create($item);
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "\r\n";
        die;
    }
}

// Score the people
$scorer = new Scorer;
$scorer->scorePeople($people);

// Output the winners!
echo $scorer->getWinner($people);
echo "\r\n";
