--TEST--
DBA Insert/Fetch Test
--SKIPIF--
<?php 
	require_once('skipif.inc');
	die("info $HND handler used");
?>
--FILE--
<?php
	require_once('test.inc');
	echo "database handler: $handler\n";
	if (($db_file=dba_open($db_file, "n", $handler))!==FALSE) {
		dba_insert("key1", "This is a test insert", $db_file);
		echo dba_fetch("key1", $db_file);
		dba_close($db_file);
	} else {
		echo "Error creating database\n";
	}
?>
--EXPECTF--
database handler: %s
This is a test insert
