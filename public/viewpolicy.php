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

  include_once('php/defines.php');
  
  // check input
  if(!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
    // bad input redirect to the search page
    header("Location", "search.php");
    exit;
  }
  prn_head("View Policy Entry");
  prn_body("View Policy Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  $id = $_REQUEST['id'];
		
  // get user information first and display it
  $qry = "select * from policy where id=$id";

  $res = sql_exec($qry, $conn);
  $nrows = sql_num_rows($res);
  if($nrows != 1) {
    print "<tr><td>".FONT2."Error in retrieving user data, please try again.".FONTE."</td></tr>\n";
  } else {
    $row = mysql_fetch_row($res);
    $id = $row[0];
    $policy_name = $row[1];
    $virus_lover = $row[2];
    $spam_lover = $row[3];
    $banned_files_lover = $row[4];
    $bad_header_lover = $row[5];
    $bypass_virus_checks = $row[6];
    $bypass_spam_checks = $row[7];
    $bypass_banned_checks = $row[8];
    $bypass_header_checks = $row[9];
    $spam_modifies_subj = $row[10];
    $virus_quarantine_to = $row[11];
    $spam_quarantine_to = $row[12];
    $banned_quarantine_to = $row[13];
    $bad_header_quarantine_to = $row[14];
    $clean_quarantine_to = $row[15];
    $other_quarantine_to = $row[16];
    $spam_tag_level = $row[17];
    $spam_tag2_level = $row[18];
    $spam_kill_level = $row[19];
    $spam_dsn_cutoff_level = $row[20];
    $spam_quarantine_cutoff_level = $row[21];
    $addr_extension_virus = $row[22];
    $addr_extension_spam = $row[23];
    $addr_extension_banned = $row[24];
    $addr_extension_bad_header = $row[25];
    $warnvirusrecip = $row[26];
    $warnbannedrecip = $row[27];
    $warnbadhrecip = $row[28];
    $newvirus_admin = $row[29];
    $virus_admin = $row[30];
    $banned_admin = $row[31];
    $bad_header_admin = $row[32];
    $spam_admin = $row[33];
    $spam_subject_tag = $row[34];
    $spam_subject_tag2 = $row[35];
    $message_size_limit = $row[36];
    $banned_rulenames = $row[37];


    print "<form action=\"updatepolicy.php\" method=\"POST\">\n";
    print "<input type=\"hidden\" name=\"id\" value=\"$id\">\n";
    
    print "<tr><td width=50% align=left>".FONT2."Policy name. (<font color=\"red\">This is the only required field.</font>)</font>".FONTE."</td>\n";
		print "<td width=50% align=left>".FONT2."<input type=text name=policy_name value=\"$policy_name\" size=30 maxlength=255>".FONTE."</td></tr>\n";
		    
    print "<tr><td>".FONT2."Virus Lover?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=virus_lover><option value='Y'";
    if(strcasecmp($virus_lover, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($virus_lover, "N") == 0){
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Spam Lover?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=spam_lover><option value='Y'";
    if(strcasecmp($spam_lover, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($spam_lover, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Banned Files Lover?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=banned_files_lover><option value='Y'";
    if(strcasecmp($banned_files_lover, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($banned_files_lover, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Bad Header Lover?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=bad_header_lover><option value='Y'";
    if(strcasecmp($bad_header_lover, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if (strcasecmp($bad_header_lover, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else { 
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Bypass Virus Checks?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=bypass_virus_checks><option value='Y'";
    if(strcasecmp($bypass_virus_checks, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($bypass_virus_checks, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Bypass Spam Checks?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=bypass_spam_checks><option value='Y'";
    if(strcasecmp($bypass_spam_checks, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($bypass_spam_checks, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Bypass Banned File Checks?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=bypass_banned_checks><option value='Y'";
    if(strcasecmp($bypass_banned_checks, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($bypass_banned_checks, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Bypass Banned Header Checks?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=bypass_header_checks><option value='Y'";
    if(strcasecmp($bypass_header_checks, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($bypass_header_checks, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Spam Modifies Subject?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=spam_modifies_subj><option value='Y'";
    if(strcasecmp($spam_modifies_subj, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($spam_modifies_subj, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Warn Virus Recipient?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=warnvirusrecip><option value='Y'";
    if(strcasecmp($warnvirusrecip, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($warnvirusrecip, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Warn Banned File Recipient?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=warnbannedrecip><option value='Y'";
    if(strcasecmp($warnbannedrecip, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>Default";
    } else if(strcasecmp($warnbannedrecip, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>Default";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

    print "<tr><td>".FONT2."Warn Bad Header Recipient?".FONTE."</td>\n";
    print "<td>".FONT2."<select name=warnbadhrecip><option value='Y'";
    if(strcasecmp($warnbadhrecip, "Y") == 0) {
    	print " selected>Yes<option value='N'>No<option value=''>";
    } else if(strcasecmp($warnbadhrecip, "N") == 0) {
    	print ">Yes<option value='N' selected>No<option value=''>";
		} else {
			print ">Yes<option value='N'>No<option value='' selected>Default";
		}
		print "</select></td></tr>\n";    	

		print "<tr><td colspan=2><br></td></tr>\n";
		
		print "<tr><td colspan=2 align=center>".FONT2."These should be floating point if not left blank.<br>\n<b>Warning:</b> setting incorrect values will cause mail to be dropped!".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Insert header tags starting at what level?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_tag_level\" name=spam_tag_level size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Mark as spam starting at what level?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_tag2_level\" name=spam_tag2_level size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Spam quarantine only cutoff?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_kill_level\" name=spam_kill_level size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Do not send notifications after this level.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_dsn_cutoff_level\" name=spam_dsn_cutoff_level size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."No longer quarantine after this level.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_quarantine_cutoff_level\" name=spam_quarantine_cutoff_level size=6 maxlength=6>".FONTE."</td></tr>\n";

		print "<tr><td colspan=2><br></td></tr>\n";
		
		print "<tr><td colspan=2 align=center>".FONT2."Leave everything else to the default values (blank) or change <b>ONLY</b> if you know what you are doing!".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine Virus To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$virus_quarantine_to\" name=virus_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine Spam To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_quarantine_to\" name=spam_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine Banned Files To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$banned_quarantine_to\" name=banned_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine Bad Headers To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$bad_header_quarantine_to\" name=bad_header_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine Clean Messages To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$clean_quarantine_to\" name=clean_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Quarantine All Other Messages To?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$other_quarantine_to\" name=other_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Address extension for virus messages.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$addr_extension_virus\" name=addr_extension_virus size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Address extension for spam messages.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$addr_extension_spam\" name=addr_extension_spam size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Address extension for banned file messages.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$addr_extension_banned\" name=addr_extension_banned size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Address extension for bad header messages.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$addr_extension_bad_header\" name=addr_extension_bad_header size=6 maxlength=6>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."New virus admin email to?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$newvirus_admin\" name=newvirus_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Other virus admin email to?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$virus_admin\" name=virus_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Banned file admin email to?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$banned_admin\" name=banned_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Bad header admin email to?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$bad_header_admin\" name=bad_header_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Spam admin email to?".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_admin\" name=spam_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Set Spam message subject to include:".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_subject_tag\" name=spam_subject_tag size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Set Spam message subject second level to include:".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$spam_subject_tag2\" name=spam_subject_tag2 size=30 maxlength=64>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Maximum Message Size to Scan (in bytes).".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$message_size_limit\" name=message_size_limit size=10 maxlength=10>".FONTE."</td></tr>\n";

    print "<tr><td>".FONT2."Comma seperated list of bad rule names.".FONTE."</td>\n";
    print "<td>".FONT2."<input type=text value=\"$banned_rulenames\" name=banned_rulenames size=30 maxlength=64>".FONTE."</td></tr>\n";

		print "<tr><td align=center><input type=\"submit\" value=\"Submit Form\"></td>\n";
		print "<td align=center><input type=\"reset\" value=\"Reset Form\"></td></tr>\n";
    print "</form>\n";
	}
	
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
