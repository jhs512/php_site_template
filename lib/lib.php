<?php
function jsAlert(string $msg) {
    echo "<script> alert('{$msg}'); </script>";
}

function jsLocationReplace(string $url) {
    echo "<script> location.replace('{$url}'); </script>";
    exit;
}

function jsHistoryBack() {
    echo "<script> history.back(); </script>";
    exit;
}

function DB__execute($sql) {
    global $config;
    return mysqli_query($config['dbConn'], $sql);
}

function DB__getDBRows($sql) {
    $rs = DB__execute($sql);

    $rows = [];

    while ( $row = mysqli_fetch_assoc($rs) ) {
        $rows[] = $row;
    }

    return $rows;
}

function DB__getDBRow($sql) {
    $rows = DB__getDBRows($sql);

    if ( isset($rows[0]) ) {
        return $rows[0];
    }

    return [];
}