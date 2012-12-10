<?php
//
// logVarToErrorLog: log a variable to a PHP error log for debugging.
//
// Begin code to place in your code:
//
// If you are using the system error log, then set $logFile to null; else,
// set it to the location where you want the logging to go. Note that
// if you do want to use the system error log, then you can use the settings
// noted below to minimize output to deal with. See the php.net doc if you
// decide to change these settings; else, using your own log file will be
// more direct and simpler to manage (and not system-wide).
//
// The php.ini file you use should be located near the executable
// directory where the php bin lives; search for the following variables
// as you see fit:
//
// error_reporting = E_ALL & ~E_NOTICE & ~E_WARNING 
// display_errors = On
// log_errors = On
// error_log = /path/to/phperror.txt
//
function logVarToErrorLog( $varToLog, $logFile )
{
   
   // First, we get the name of the function that called us.
   $trace = debug_backtrace();
   //print_r($trace);
   $tracCall = $trace[0];  // 0 is the immediate caller of trace
   $prevCall = $trace[1];  // function that called logVarToErrorLog
   $tracFunc = $prevCall["function"];
   $tracFile = $tracCall["file"] . '#' . $tracCall["line"] . '(' . $tracFunc . ')';
   $tracArgs = $tracCall["args"];
   print_r($tracFile . "\n");
   if (is_array($tracArgs[0])) {
      foreach($tracArgs[0] as $fa => $fk)
         print_r($fa . ' => ' . $fk . "\n");
   }
   else
      print_r($tracArgs[0] . "\n" );
 
  

   // Timestamps only done for the system log, so we have to do our own
   // if a logfile name has been passed to us. We do it using the same
   // format that the system log would provide (continuity, ya know).
   $myDate = date("[j-M-Y G:H:s]");
   
   if ($logFile == null)
      error_log("*****  Begin logVarToErrorLog  *****\n");
   else
      error_log("$myDate *****  Begin logVarToErrorLog  *****\n", 3, $logFile);
   
   // If you need var_dump, then replace/add it near the print_r
   // varToLog statement.
   ob_start();
   print_r($varToLog);
   if(!is_array($varToLog))  // arrays auto space non-arrays don't
      print_r("\n");
   $buffer = ob_get_contents();
   ob_end_clean();
   
   if ($logFile == null)
   {
      error_log($buffer);
      error_log("*****  End   logVarToErrorLog  *****\n");
   }
   else
   {
      error_log($buffer, 3, $logFile);
      error_log("$myDate *****  End   logVarToErrorLog  *****\n", 3, $logFile); 
   }
} 
// end code to place in your code.
//
// The code from here on is just used to test the logVarToErrorLog function.
// Remove it before integrating logVarToErrorLog into your code.
//
// Uncomment the next line to use a specific log file and comment out the
// one after it (after placing your log file name in of course  :0) ).

function main ($varMarty)

{
   
$logFile = "D:\cygwin\home\marty\projects\php-errors.log";
// $logFile = null;  // null causes the system error log to be used (see php.ini)

$array = array("foo" => "bar",
               "my" => "thing",
               1 => 2,
               "hallo" => "world");

$array2 = null;
$str1 = "hi";

//logVarToErrorLog( $array, $logFile );
//logVarToErrorLog( $array2, $logFile);
logVarToErrorLog($varMarty, $logFile);
logVarToErrorLog($str1, $logFile);

$myDate = date("[j-M-Y G:H:s]" . "\n");
print_r($myDate);

} // main

$str4 = "from open code";
$str2 = array(0,1,2,3);
$str3 = array("hi1" => "to you", "there1" => 2);
main($str2);

$aa = 1;

logVarToErrorLog($str4, $logFile);

die ("We are done...\n");

?>