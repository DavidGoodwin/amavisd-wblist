<?php
/*
 *  Copyright (C) 2008 James Bourne
 *
 *    This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * Author: James Bourne
 * Email: jbourne@hardrock.org
 * Date: Feb 16, 2008
*/

define("BASEPATH","/wblist");
if(isset($_SERVER["HTTP_HOST"])) {
	define("BASEURL","https://".$_SERVER["HTTP_HOST"].BASEPATH);
}

define("SQL_DB", "amavistest");
define("SQL_HOST","localhost");
define("SQL_USER","amavisuser");
define("SQL_PASS","SETAPASSWORD");

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
