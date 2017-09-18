<?php
/*
 *  Copyright (C) 2004 James Bourne
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
 * Date: Oct 31, 2004
*/
/* print an html error message for the client */
function prn_error($msg) {
	print "<p>".FONT2."An error has occured in the application<br>\n";
	print "<blockquote>$msg</blockquote>\n";
	print "Please contact your system administrator if you require assistance.".FONTE."</p>\n";
}

function log_error($msg) {
	openlog("filetrans", LOG_NDELAY|LOG_PID, LOG_USER);
	syslog(LOG_DEBUG, $msg);
	closelog();	
}

function prn_head($msg) {
	print "<html>\n<head><title>$msg</title></head>\n";
}

function prn_body($msg) {
	print "<body bgcolor=\"".BGCOLOUR."\">\n";
	print "<center><table width=700>\n<tr><td width=100% align=center>".FONT3."$msg".FONTE."</td></tr>\n";
	print "<tr><td><!-- content start -->\n";
}

function prn_copyend() {
	print "<!-- content end --></td></tr></table></center>\n";
	print FONT1.COPYNOTE.FONTE;
	print "</body></html>\n";
}

?>
