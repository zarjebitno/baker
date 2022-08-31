<?php

function getUsers() {
    global $conn;
    return executeQuery("SELECT * from user");
}

function getOneUser($id) {
    global $conn;
    return executeSingleQuery("SELECT * from user WHERE id = $id");
}

function userLoggedIn($id = 0){
    include_once '../../config/connection.php';
    $file = fopen(ACCESS_LOG, "a");
    $date = date('d-m-Y H:i:s');
    fwrite($file, "{$id}\tloggedIn\t{$date}\n");
    fclose($file);
}

function loggedInToday() {
    include_once 'config/connection.php';

    $br = 0;

    $fileU = fopen(ACCESS_LOG, "r");
    $rowsU = file(ACCESS_LOG);
    fclose($fileU);

    foreach($rowsU as $row) {
        $data = explode("\t", $row);
        $action = $data[1];
        $date = date("d m y", strtotime($data[2]));
        $today = date("d m y");

        if( $action=="loggedIn" && $today==$date)
            $br++;
    }

    return $br; 
}

function getByPercentage() {
    include_once 'config/connection.php';

    $fileU = fopen(ACCESS_LOG, "r");
    $rowsU = file(ACCESS_LOG);
    fclose($fileU);

    $today = date("d m y");

    $pageEntries = array();

    foreach($rowsU as $row) {
        $data = explode("\t", $row);
        $page = '';
        $pageFull = $data[0];
        $date = date("d m y", strtotime($data[1]));

        if(strpos($pageFull, 'page='))
            $page = explode('page=', $pageFull)[1];

        if(strpos($page, '&')) {
            $page = explode($page, '&')[0];
        }

        if($page != '' && $today == $date)
            array_push($pageEntries, $page);
    }


    $num = count($pageEntries);
    return array_map(
        function($val) use ($num){
            return array('count'=>$val,'avg'=> round($val/$num*100, 1));
        },
        array_count_values($pageEntries));
}