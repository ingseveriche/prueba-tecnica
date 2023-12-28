<?php

    $array_random_numbers = array();
    for ($number_random=1; $number_random <= 200 ; $number_random++) 
    { 
        $array_random_numbers[] = mt_rand();
    }

    $counter = 1;
    foreach ($array_random_numbers as $number) 
    {

        if ($number % 2 == 0 AND $counter <= 50) 
        {
            print $counter.'- '.$number."\n";
            $counter++;
        }

    }
    
?>