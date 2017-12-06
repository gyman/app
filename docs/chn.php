<?php

//$file = <<< EOF
//occurrences:
//  event-abc-0000:
//    event: event-kids-4-8
//    startDate: 2015-06-01 16:15:00
//    endDate: 2015-06-01 17:00:00
//    modified: 0
//    minutes: 45
//  event-abc-0000:
//    event: event-kids-4-8
//    startDate: 2015-06-01 16:15:00
//    endDate: 2015-06-01 17:00:00
//    modified: 0
//    minutes: 45
//  event-abc-123-0000:
//    event: event-kids-4-8
//    startDate: 2015-06-03 16:15:00
//    endDate: 2015-06-03 17:00:00
//    modified: 0
//    minutes: 45
//  event-123-def-0000:
//    event: event-kids-4-8
//    startDate: 2015-06-08 16:15:00
//    endDate: 2015-06-08 17:00:00
//    modified: 0
//    minutes: 45
//EOF;

$file = file_get_contents('src/Bundle/AppBundle/DataFixtures/Club/Yaml/occurrences.yml');

$result = [];

preg_match_all("@  (event-.*?)-0{4}@", $file, $result);

$count = array_count_values($result[1]);

foreach($count as $stringToUpdate => $number) {
    for ($a = 1; $a <= $number; $a++) {
        $needle = $stringToUpdate . "-0000";
        $pos = strpos($file, $needle);
        $file = substr_replace(
            $file,
            sprintf("$stringToUpdate-%04d", $a),
            $pos,
            strlen($needle)
        );
    }
}

file_put_contents('result.yml', $file);