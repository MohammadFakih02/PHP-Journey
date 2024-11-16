<?php

header('Content-Type: application/json');
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if(isset($data['array'])){
    $array = $data['array'];
    $result = mergesort($array);
    echo json_encode($result);
}else{
    http_response_code(400);
    echo json_encode([
        'success'=> false,
        'message'=> 'Input an array'
    ]);
}
function merge($left,$right){
    $res = [];
    $i=$j=0;
    while($i < count($left) && $j < count($right)){
        if($left[$i] < $right[$j]){
            $result[]=$left[$i];
            $i++;
        }else{
            $result[] = $right[$j];
            $j++;
        }
    }

    while($i<count($left)){
        $result[] = $left[$i];
        $i++;
    }

    while ($j < count($right)) {
        $result[] = $right[$j];
        $j++;
    }

    return $result;
}

function mergesort($array){
    if (count( $array ) <=1){
        return $array;
    }
    $mid = floor(count( $array ) /2);
    $left  = array_slice( $array,0, $mid );    
    $right= array_slice( $array, $mid );
    $left=mergesort($left);
    $right = mergesort($right);
    return merge($left, $right);
}
