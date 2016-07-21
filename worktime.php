<?php
        define("HOST","localhost");
        define("USER", "root");
        define("PASSWD", "springst2016!");
        define("DB_NAME", "officialFriend");

        $connect = mysql_connect(HOST, USER, PASSWD) or die("Fail to connect to SQL Server");

        mysql_query("SET NAMES UTF8");

        mysql_select_db(DB_NAME, $connect);

        session_start();

        $sql = "select * from test";

        $result = mysql_query($sql, $connect);

        $total_record = mysql_num_rows($result);

        echo "{\"status\":\"OK\",\"num_results\":\"$total_record\",\"results\":[";

        for($i=0; $i < $total_record; $i++)
        {
		mysql_data_seek($result, $i);
                $row = mysql_fetch_array($result);
		echo "{\"workday\":\"$row[workday]\"}";
		echo ",";
		echo "{\"worktime\":\"$row[worktime]\"}";
                if($i<$total_record-1){
                        echo ",";
                }
        }
        echo "]}";
?>

