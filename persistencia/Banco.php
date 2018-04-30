<?php
	 $link = mysql_connect("localhost", "flavianeribeiro", "", "sistema_mer");
if (!$link) {
   "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}


"Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
"Host information: " . mysql_get_host_info($link) . PHP_EOL;

//mysqli_close($link);
?>
