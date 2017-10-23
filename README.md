# Amavis Policy/Whiteblacklist/Quarantine viewer ....

This was originally based on WBList Version 0.01B  (see: http://www.hardrock.org/wblist/ )

It's been mostly rewritten and updated. 


## What is it ?

This is a web based interface to some amavisd-new things.

 * Policy database - how mails to defined recipients are treated (spam threshold, AV checks etc)
 * Quarantined emails - if a policy defines it, mail will be quarantined ... you can view and release them here
 * Whitelist/Blacklist - some senders you do (or don't!) like....

So if you're running amavisd, this can help you -

 * Create policy rules (who should receive spam/viruses etc, what scoring thresholds there are etc)
 * Create whitelist or blacklist entries (i.e. allow anyone from: @google.com to email bob@example.com, or block foo@bar.com from emailing bob@example.com).
 * View and release quarantined emails ....


## Requirements 

 1. Amavisd-new (e.g. v 2.10.1 ish) with appropriate config to use @lookup\_sql\_dsn
 2. PHP 7+ (also works with PHP 5.6+)
 3. PostgreSQL or MySQL backend (I've not tested MySQL, but it ought to work).

## Installation instructions

 1. Copy/Clone this stuff to your webserver, ideally set '/path/to/this/public/' as your DocumentRoot.
 2. Edit config.php or specify a $config in config.local.php
 3. Get composer ( https://getcomposer.org/ ) and run 'php composer.phar install' or similar.
 4. Make sure there's some restriction on who can access the code (e.g. Apache auth check)

# Operation

Basically it works like this:

 1. You define a policy first.  This defines how the mail will be recieved. 
   Anything left blank or NULL will use the defaults in /etc/amavisd.conf.
 2. Once you have an acceptable policy, add a recipient that uses this policy. 
   Each recipient will have a policy defined.
 3. Next add a sender (this is a person at a remote site).
 4. Add a wblist entry, basically relate your receiver to a sender and how
   that mail is handled.  A score will add to the resultant score like the
   soft whitelist table in /etc/amavisd.conf.  W will whitelist, B will
   blacklist and depending how you have your blacklist configured look at your
   maillogs for a "discard" line.  I like discard lines in my mail logs.


# TODO

 1. Implement scoring support as well as Whitelist/Blacklist/Neutral in the policy.
 2. Add script to view quarantined emails.
