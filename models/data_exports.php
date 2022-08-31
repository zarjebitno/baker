<?php

  $dataType = $_GET['data'];

  // excel exports
  if($dataType === 'excel') {
    include_once '../config/connection.php';
    include_once 'users/functions.php';
    
    header("Content-Disposition: attachment; filename=users.xls"); 
    header("Content-Type: application/x-msexcel"); 
    header('Content-Type: application/vnd.ms-excel');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
    header("Pragma: no-cache");

    $users = getUsers();
    $export_string = "Full Name \tEmail Address\n";

    foreach($users as $user) {
      $export_string .= $user->first_name . ' ' . $user->last_name . "\t" . $user->email ."\n";
    }

    echo $export_string;

    // word exports
  } elseif ($dataType === 'word') {
    $timestamp = time();
    $filename = 'wordSample' . $timestamp . '.doc';

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    echo "Mateja Jukic 147/17 \n";
    echo "Word export from php thing";

    exit();
  }