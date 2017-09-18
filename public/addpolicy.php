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
  
  prn_head("Add Policy Entry");
  prn_body("Add Policy Entry");

  print "<table border=0 width=100%>\n";
  
  print "<form action=\"insertpolicy.php\" method=\"POST\">\n";
  
  print "<tr><td width=50% align=left>".FONT2."Policy name. (<font color=\"red\">This is the only required field.</font>)</font>".FONTE."</td>\n";
  print "<td width=50% align=left>".FONT2."<input type=text name=policy_name size=30 maxlength=255>".FONTE."</td></tr>\n";
    
  print "<tr><td>".FONT2."Virus Lover?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=virus_lover><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Spam Lover?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=spam_lover><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Banned Files Lover?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=banned_files_lover><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Bad Header Lover?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=bad_header_lover><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Bypass Virus Checks?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=bypass_virus_checks><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Bypass Spam Checks?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=bypass_spam_checks><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Bypass Banned File Checks?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=bypass_banned_checks><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Bypass Banned Header Checks?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=bypass_header_checks><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Spam Modifies Subject?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=spam_modifies_subj><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Warn Virus Recipient?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=warnvirusrecip><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Warn Banned File Recipient?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=warnbannedrecip><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td>".FONT2."Warn Bad Header Recipient?".FONTE."</td>\n";
  print "<td>".FONT2."<select name=warnbadhrecip><option value='Y'";
  print ">Yes<option value='N'>No<option value='' selected>Default";
  print "</select></td></tr>\n";  	

  print "<tr><td colspan=2><br></td></tr>\n";
  
  print "<tr><td colspan=2 align=center>".FONT2."These should be floating point if not left blank.<br>\n<b>Warning:</b> setting incorrect values will cause mail to be dropped!".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Insert header tags starting at what level?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_tag_level size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Mark as spam starting at what level?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_tag2_level size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Spam quarantine only cutoff?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_kill_level size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Do not send notifications after this level.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_dsn_cutoff_level size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."No longer quarantine after this level.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_quarantine_cutoff_level size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td colspan=2><br></td></tr>\n";
  
  print "<tr><td colspan=2 align=center>".FONT2."Leave everything else to the default values (blank) or change <b>ONLY</b> if you know what you are doing!".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine Virus To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=virus_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine Spam To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine Banned Files To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=banned_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine Bad Headers To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=bad_header_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine Clean Messages To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=clean_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Quarantine All Other Messages To?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=other_quarantine_to size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Address extension for virus messages.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=addr_extension_virus size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Address extension for spam messages.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=addr_extension_spam size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Address extension for banned file messages.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=addr_extension_banned size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Address extension for bad header messages.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=addr_extension_bad_header size=6 maxlength=6>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."New virus admin email to?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=newvirus_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Other virus admin email to?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=virus_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Banned file admin email to?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=banned_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Bad header admin email to?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=bad_header_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Spam admin email to?".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_admin size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Set Spam message subject to include:".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_subject_tag size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Set Spam message subject second level to include:".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=spam_subject_tag2 size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Maximum Message Size to Scan (in bytes).".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=message_size_limit size=10 maxlength=10>".FONTE."</td></tr>\n";

  print "<tr><td>".FONT2."Comma seperated list of bad rule names.".FONTE."</td>\n";
  print "<td>".FONT2."<input type=text name=banned_rulenames size=30 maxlength=64>".FONTE."</td></tr>\n";

  print "<tr><td align=center><input type=\"submit\" value=\"Form\"></td>\n";
  print "<td align=center><input type=\"reset\" value=\"Reset Form\"></td></tr>\n";
  print "</form>\n";
	
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
