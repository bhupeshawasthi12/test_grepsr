<!-- 3. Write a code or function to display dates in provided format?
Example:
Input: 'Sep 20 2021' and '09092021'
Output: 2021-09-20 and 'Sep-09-2021'
 -->

<?php
$input1="Sep 20 2021";
$input2="09092021";
$z=str_replace(" ","-",$input1);

$new=str_replace("Sep", "09", "$z");
$a=explode("-",$new);

$b=(str_split($input2,2));
echo("output are : \n");
echo("$a[2]-$a[0]-$a[1] \n" );
echo("$b[0]-$b[1]-$b[2]$b[3] \n" );
?>