<?php
    require_once 'config.php';

    define("ROOT", $_SERVER['DOCUMENT_ROOT'].'/ict/baker');
    define("ACCESS_LOG", $_SERVER['DOCUMENT_ROOT']."/ict/Baker/data/log.txt");

    try {
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        global $conn;
    }
    catch(PDOException $ex){
        echo "Greska:" . $ex->getMessage(); 
    }

    function executeQuery($query){
        global $conn;
        return $conn->query($query)->fetchAll();
    }

    function executeSingleQuery($query) {
        global $conn;
        return $conn->query($query)->fetch();
    }

    log_access();

    function log_access(){
        $file = fopen(ACCESS_LOG, "a"); 

        if($file) {
            $date = date('d-m-Y H:i:s');
            fwrite($file, "{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
            fclose($file);
        }
    }