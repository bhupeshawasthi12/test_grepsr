<!-- 1. Write a code, using listed PHP functions, with example
a. is_int()
b. is_numeric()
c. is_integer()
 -->

<?php
$name_1=78;
$name_2="bhupesh";
$name_3=10.23;

if(is_int($name_1))
{
  echo ("$name_1 is  integer \n");
}
else
{
    echo ("$name_1 is not integer \n");
}

if(is_int($name_2))
{
    echo "$name_2 is integer type \n";

}
else
{
    echo ("$name_2 is not integer \n");
}
# int is allias of integer(same thing)
if(is_integer($name_1))
{
  echo ("$name_1 is  integer \n");
}
else
{
    echo ("$name_1 is not integer \n");

}

if(is_numeric($name_2))
{
    echo ("$name_2 is of numeric type \n");

}
else
{
    echo ("$name_2 is of not numeric type \n");
}

if(is_numeric($name_3))
{
    echo ("$name_3 is of numeric type \n");

}
else 
{
    echo ("$name_3 is not of numeric type \n");
}
?>