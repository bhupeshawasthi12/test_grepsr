
<!-- 2. Create a function in PHP to floor decimal numbers with any provided precision.
Example: convert(2.99999,2), convert(199.99999,4) -->

<?php
function converter($number, $precision, $separator)
{
$number_part=explode($separator, $number);
$number_part[1]=substr_replace($number_part[1],$separator,$precision,0);
if($number_part[0]>=0)
{$number_part[1]=floor($number_part[1]);}
else
{$number_part[1]=ceil($number_part[1]);}

$ceil_number= array($number_part[0],$number_part[1]);
return implode($separator,$ceil_number);
}
print_r(converter(2.99999, 2, ".")."\n");
print_r(converter(199.99999, 4, ".")."\n");
?>