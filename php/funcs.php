<?php

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
