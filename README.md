<pre>
********************************************************************

 logVarToErrorLog - print/log php variable information to the system
 or user PHP error log.

 ********************************************************************

 logVarToErrorLog: log a variable to a PHP error log for debugging.

 If you are using the system error log, then set $logFile to null; else, 
 set it to the location where you want the logging to go.  Note that if you 
 do want to use the system error log, then you can use the settings noted 
 below to minimize output to deal with.  See the php.net doc if you decide 
 to change these settings; else, using your own log file will be more 
 direct and simpler to manage (and not system-wide).  

 The php.ini file you use should be located near the executable
 directory where the php bin lives; search for the following variables
 as you see fit:

 error_reporting = E_ALL & ~E_NOTICE & ~E_WARNING 
 display_errors = On
 log_errors = On
 error_log = /path/to/phperror.txt

 The code in logVarToErrorLog.php consists of multiple parts: the first is 
 the actual function itself () and the second is some code to test it out.  

 You will need to follow the following steps to test the code or place it 
 into a tested php application environment: 

 1. I tested the code with Active State Komodo IDE 7.1. It has its own
    test environment which did not need the code to run under a web
    server (e.g. Apache).

 2. Place the php code in a webserver path (e.g. Apache htdocs) so it
    can be executed by calls to it. Note that this will require global
    inclusion into the testing php code in some fashion.

 3. Copy/cut and paste the logVarToErrorLog into an appropriate location
    within the php code that you need to test/display variables with this
    the logVarToErrorLog function.

 Also note that you will need to either directly copy the php.ini flags I have
 used above, or copy and vary them as you see fit based on the description of
 each variable (presently denoted within any current php.ini files).

 *************  Sample output to default PHP error log (php.ini)  ***************

[17-Nov-2012 16:56:31] PHP Warning:  Module 'mysql' already loaded in Unknown on line 0
[17-Nov-2012 16:56:31] PHP Warning:  Module 'pgsql' already loaded in Unknown on line 0
[17-Nov-2012 16:56:31] *****  Begin logVarToErrorLog  *****
[17-Nov-2012 16:56:31] array(4) {
  'foo' =>
  string(3) "bar"
  'my' =>
  string(5) "thing"
  [1] =>
  int(2)
  'hallo' =>
  string(5) "world"
}
Array
(
    [foo] => bar
    [my] => thing
    [1] => 2
    [hallo] => world
)

[17-Nov-2012 16:56:31] *****  End   logVarToErrorLog  *****
[17-Nov-2012 16:56:31] *****  Begin logVarToErrorLog  *****
[17-Nov-2012 16:56:31] string(12) " some stuff "
 some stuff 


 *************  Sample output to specified PHP error log  ***************

[17-Nov-2012 16:16:12] *****  Begin logVarToErrorLog  *****
array(4) {
  'foo' =>
  string(3) "bar"
  'my' =>
  string(5) "thing"
  [1] =>
  int(2)
  'hallo' =>
  string(5) "world"
}
Array
(
    [foo] => bar
    [my] => thing
    [1] => 2
    [hallo] => world
)

[17-Nov-2012 16:16:12] *****  End   logVarToErrorLog  *****
[17-Nov-2012 16:16:12] *****  Begin logVarToErrorLog  *****
string(12) " some stuff "
 some stuff 
[17-Nov-2012 16:16:12] *****  End   logVarToErrorLog  *****


 NOTE: This code commas with absolution no warranty whatsoever, so use it 
       at your own peril :0) .  

 Marty Turner
 November 2012
 mdturnerinoz@gmail.com (I seldom read this email, but can try... ;0) )

</pre>
