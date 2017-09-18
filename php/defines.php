<?php

// Path on the server ( https://my.site/BASEPATH )

define("BASEPATH","/wblist");
if(isset($_SERVER["HTTP_HOST"])) {
	define("BASEURL","https://".$_SERVER["HTTP_HOST"].BASEPATH);
}

// Change these for your installation.

define("SQL_DB", "amavistest");
define("SQL_HOST","localhost");
define("SQL_USER","amavisuser");
define("SQL_PASS","SETAPASSWORD");
define("SQL_TYPE", "pgsql");

define("FONT1", "<font face=\"arial,helvetica\" size=\"1\">");
define("FONT2", "<font face=\"arial,helvetica\" size=\"2\">");
define("FONT3", "<font face=\"arial,helvetica\" size=\"3\">");
define("FONTE", "</font>");
define("TITLE", "Amavis Database Manager");
define("BGCOLOUR", "#ffffff");
define("COPYNOTE","Copyright (c) 2008<br>\nJames Bourne &lt;jbourne@hardrock.org&gt;");

include('php/sql.php');
include('php/funcs.php');
?>
