<?php
ini_set('max_execution_time', 300);

/**
 *
 */
function main()
{
    $n = rand();
    $m = rand();
    $simpleArr = generatePrimeArr($n, $m);
    $duplicatedArr = array_count_values($simpleArr);
    $simpleArr = array_unique($simpleArr);
    arsort($duplicatedArr);
    printKey($duplicatedArr);
}

/**
 * Prints the most common duplicates
 * @param $arr - an array of duplicates
 */
function printKey($arr)
{
    $tempMax = 0;
    echo "the most common duplicates are: ";
    foreach ($arr as $key => $var) {
        if ($var >= $tempMax) {
            $tempMax = $var;
            echo $key . "\t";
        } else {
            break;
        }
    }
}

/**
 * Creates an array of simple numbers
 * @param $number - the length of the array
 * @param $max - the max value of the elements
 * @return array - the simple number array
 */

function generatePrimeArr($number, $max)
{
    $outputArr = [];
    while (count($outputArr) != $number) {
        $tempRand = rand(2, $max);
        if (isSimple($tempRand)) {
            array_push($outputArr, $tempRand);
        }
    }
    return $outputArr;
}

/**
 * Checks if the variable is simple
 * @param $var - variable
 * @return bool - the result
 */

function isSimple($var)
{
    if ($var < 2) {
        return false;
    } else if ($var <= 3) {
        return true;
    } else if (($var % 2 == 0) || ($var % 3 == 0)) {
        return false;
    } else {
        for ($i = 5; $i * $i <= $var; $i += 6) {
            if (($var % $i == 0) || ($var % ($i + 2) == 0)) {
                return false;
            }
        }
    }
    return true;
}

main();

?>