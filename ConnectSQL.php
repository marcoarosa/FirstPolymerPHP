

<!--//$serverName = "pcglis.database.windows.net\sqlexpress"; //serverName\instanceName
//$connectionInfo = array( "Database"=>"PCGLIS", "UID"=>"lisadmin", "PWD"=>"C00lrunning$");
//$conn = sqlsrv_connect( $serverName, $connectionInfo);

//if( $conn ) {
//    echo "Connection established.<br />";
//}else{
//    echo "Connection could not be established.<br />";
//    die( print_r( sqlsrv_errors(), true));
//}

dl('php_pdo_sqlsrv_56_ts.dll');

function OpenConnection()
{
    try
    {
        $serverName = "tcp:pcglis.database.windows.net";
        $connectionOptions = array("Database"=>"PCGLIS",
            "Uid"=>"lisadmin", "PWD"=>"C00lrunning$");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            echo "Connection could not be established.<br />";
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

openConnection();-->


<?php

function OpenConnection()
{
    try
    {
        $serverName = "tcp:pcglis.database.windows.net,1433";
        $connectionOptions = array("Database"=>"PCGLIS",
            "UID"=>"lisadmin", "PWD"=>"C00lrunning$");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            echo "Connection could not be established.<br />";
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
}

openConnection();

?>