<?php

// Connect to your MySQL database.
$hostname = "localhost";
$username = "root";
$password = "1337mysql";
$database = "loop_loop";

mysql_connect($hostname, $username, $password);

// The find and replace strings.
$find = "loop.arcturus.uberspace.de";
$replace = "192.168.1.100";

$loop = mysql_query("
    SELECT
        concat('UPDATE ',table_schema,'.',table_name, ' SET ',column_name, '=replace(',column_name,', ''{$find}'', ''{$replace}'');') AS s
    FROM
        information_schema.columns
    WHERE
        table_schema = '{$database}'")
or die ('Cant loop through dbfields: ' . mysql_error());

while ($query = mysql_fetch_assoc($loop))
{
        mysql_query($query['s']);
}
