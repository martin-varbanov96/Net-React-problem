<?php
ini_set('max_execution_time', 300);
$n=rand();
$m=rand();

$simpleArr=simple($n,$m);
$duplicatedArr=array_count_values($simpleArr);
$simpleArr=array_unique($simpleArr);
arsort($duplicatedArr);

printKey($duplicatedArr);

function printKey($arr){
    $tempMax=0;
    foreach($arr as $key=>$var){
        if($var>=$tempMax){
            $tempMax=$var;
            echo "\t";
            echo $key;
            echo "\t";
        }else{
            break;
        }
    }
}

function simple($number,$max){
    $outputArr=[];
    while(count($outputArr)!=$number){
        $tempRand=rand(2,$max);
        if(isSimple($tempRand)){
            array_push($outputArr,$tempRand);
        }
    }
    return $outputArr;
}

function isSimple($var){
    for($i=2;$i<$var;$i++){
        if($var%$i==0){
            return false;
        }
    }
    return true;
}
?>