<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/HTTT-DN/object/action.php');

if (isset($_GET['price']) && !empty($_GET['price'])) {
    $num = $_GET['price'];
    $numberOnlyRegex = "/^[0-9.]*$/";
    $notNumRegEx = "/[^\d.]+/";
    if (preg_match($numberOnlyRegex, $num)) {         
            echo changeMoney(changeMoneyToNum($num));
    } else {
        echo "";
        // $temp = explode($notNumRegEx, $num);
        // echo changeMoney(changeMoneyToNum($temp[0]));
        // exit();
        // for ($i = 0; $i < count($temp); $i++) {
        //     if (preg_match($numberOnlyRegex, $temp[$i])) {
        //         echo $temp[$i];
        //         break;
        //     }
        // }        
    }
}

