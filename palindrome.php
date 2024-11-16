<?php

if(isset($_GET['string'])){
    $string = $_GET['string'];
    $length = strlen($string);
    $chars = str_split($string);
    if($length > 0){
        for ($i = 0, $k = $length - 1; $i < $length / 2 && $k >= $length / 2; $i++, $k--){
            $palindrome=true;
            if($chars[$i]!=$chars[$k]) $palindrome=false;
            break;
        }
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => $palindrome
    ]);
    }else{
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "empty string provided"
        ]);
    }
}else{
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => "no string provided"
    ]);
}