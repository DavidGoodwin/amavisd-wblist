<?php

require_once('common.php');

  prn_head("Update Policy");
  prn_body("Update Policy");

  /* check input data is there */
  
  $id = $_REQUEST['id'];
  $policy_name = $_REQUEST['policy_name'];
  $virus_lover = $_REQUEST['virus_lover'];
  $spam_lover = $_REQUEST['spam_lover'];
  $banned_files_lover = $_REQUEST['banned_files_lover'];
  $bad_header_lover = $_REQUEST['bad_header_lover'];
  $bypass_virus_checks = $_REQUEST['bypass_virus_checks'];
  $bypass_spam_checks = $_REQUEST['bypass_spam_checks'];
  $bypass_banned_checks = $_REQUEST['bypass_banned_checks'];
  $bypass_header_checks = $_REQUEST['bypass_header_checks'];
  $spam_modifies_subj = $_REQUEST['spam_modifies_subj'];
  $virus_quarantine_to = $_REQUEST['virus_quarantine_to'];
  $spam_quarantine_to = $_REQUEST['spam_quarantine_to'];
  $banned_quarantine_to = $_REQUEST['banned_quarantine_to'];
  $bad_header_quarantine_to = $_REQUEST['bad_header_quarantine_to'];
  $clean_quarantine_to = $_REQUEST['clean_quarantine_to'];
  $other_quarantine_to = $_REQUEST['other_quarantine_to'];
  $spam_tag_level = $_REQUEST['spam_tag_level'];
  $spam_tag2_level = $_REQUEST['spam_tag2_level'];
  $spam_kill_level = $_REQUEST['spam_kill_level'];
  $spam_dsn_cutoff_level = $_REQUEST['spam_dsn_cutoff_level'];
  $spam_quarantine_cutoff_level = $_REQUEST['spam_quarantine_cutoff_level'];
  $addr_extension_virus = $_REQUEST['addr_extension_virus'];
  $addr_extension_spam = $_REQUEST['addr_extension_spam'];
  $addr_extension_banned = $_REQUEST['addr_extension_banned'];
  $addr_extension_bad_header = $_REQUEST['addr_extension_bad_header'];
  $warnvirusrecip = $_REQUEST['warnvirusrecip'];
  $warnbannedrecip = $_REQUEST['warnbannedrecip'];
  $warnbadhrecip = $_REQUEST['warnbadhrecip'];
  $newvirus_admin = $_REQUEST['newvirus_admin'];
  $virus_admin = $_REQUEST['virus_admin'];
  $banned_admin = $_REQUEST['banned_admin'];
  $bad_header_admin = $_REQUEST['bad_header_admin'];
  $spam_admin = $_REQUEST['spam_admin'];
  $spam_subject_tag = $_REQUEST['spam_subject_tag'];
  $spam_subject_tag2 = $_REQUEST['spam_subject_tag2'];
  $message_size_limit = $_REQUEST['message_size_limit'];
  $banned_rulenames = $_REQUEST['banned_rulenames'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing changes</font><br>\n";
  $conn = sql_open();

  $qry = "insert into policy values (0,";
    if(strlen($policy_name) == 0) {
    	$qry .= "NULL,\n";
    } else {
	    $qry .= "'$policy_name',\n";
	  }
    if(strlen($virus_lover) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$virus_lover',\n";
    }
    if(strlen($spam_lover) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_lover',\n";
    }
    
    if(strlen($banned_files_lover) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$banned_files_lover',\n";
    }
    
    if(strlen($bad_header_lover) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bad_header_lover',\n";
    }
    
    if(strlen($bypass_virus_checks) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bypass_virus_checks',\n";
    }
    
    if(strlen($bypass_spam_checks) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bypass_spam_checks',\n";
    }
    
    if(strlen($bypass_banned_checks) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bypass_banned_checks',\n";
    }
    
    if(strlen($bypass_header_checks) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bypass_header_checks',\n";
    }
    
    if(strlen($spam_modifies_subj) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_modifies_subj',\n";
    }
    
    if(strlen($virus_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$virus_quarantine_to',\n";
    }
    
    if(strlen($spam_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_quarantine_to',\n";
    }
    
    if(strlen($banned_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$banned_quarantine_to',\n";
    }
    
    if(strlen($bad_header_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bad_header_quarantine_to',\n";
    }
    
    if(strlen($clean_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$clean_quarantine_to',\n";
    }
    
    if(strlen($other_quarantine_to) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$other_quarantine_to',\n";
    }
    
    if(strlen($spam_tag_level) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_tag_level',\n";
    }
    
    if(strlen($spam_tag2_level) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_tag2_level',\n";
    }
    
    if(strlen($spam_kill_level) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_kill_level',\n";
    }
    
    if(strlen($spam_dsn_cutoff_level) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_dsn_cutoff_level',\n";
    }
    
    if(strlen($spam_quarantine_cutoff_level) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_quarantine_cutoff_level',\n";
    }
    
    if(strlen($addr_extension_virus) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$addr_extension_virus',\n";
    }
    
    if(strlen($addr_extension_spam) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$addr_extension_spam',\n";
    }
    
    if(strlen($addr_extension_banned) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$addr_extension_banned',\n";
    }
    
    if(strlen($addr_extension_bad_header) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$addr_extension_bad_header',\n";
    }
    
    if(strlen($warnvirusrecip) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$warnvirusrecip',\n";
    }
    
    if(strlen($warnbannedrecip) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$warnbannedrecip',\n";
    }
    
    if(strlen($warnbadhrecip) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$warnbadhrecip',\n";
    }
    
    if(strlen($newvirus_admin) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$newvirus_admin',\n";
    }
    
    if(strlen($virus_admin) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$virus_admin',\n";
    }
    
    if(strlen($banned_admin) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$banned_admin',\n";
    }
    
    if(strlen($bad_header_admin) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$bad_header_admin',\n";
    }
    
    if(strlen($spam_admin) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_admin',\n";
    }
    
    if(strlen($spam_subject_tag) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_subject_tag',\n";
    }
    
    if(strlen($spam_subject_tag2) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$spam_subject_tag2',\n";
    }
    
    if(strlen($message_size_limit) == 0) {
    	$qry .= "NULL,\n";
    } else {
    	$qry .= "'$message_size_limit',\n";
    }
    
    if(strlen($banned_rulenames) == 0) {
    	$qry .= "NULL\n";
    } else {
    	$qry .= "'$banned_rulenames'\n";
    }
    
    $qry .= ")";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
    print "<pre>$qry</pre>\n";
  } else {
    print "<font color=\"green\">Successfully updated record ID $id for policy $policy_name.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  prn_copyend();
  
?>
