<!-- 4. Write a code using Regex, to solve problem listed:
a. Provided String: “abc@grepsr.com”
b. Create an array with two values. Example: [‘abc’,’grepsr.com’]
c. Ref: https://regex101.com/ (Try/Test) -->
<?php
$str = "abc@grepsr.com";
$pattern = "/@/";
$b= preg_replace($pattern, ",", $str);
$a=array();
array_push($a, $b);
print_r($a);

?>
