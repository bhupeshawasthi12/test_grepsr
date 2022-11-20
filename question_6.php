<!-- 6. Write a code to create a ‘CSV’ file named ‘laptop.csv’ with column names as listed:
a. Title
b. Price
c. Brand
from JSON data. (available at https://dummyjson.com/products/search?q=Laptop) -->

<?php
$headers = [["Title","Brand","Price"]];
$csvName = "file.csv";
    $url = "https://dummyjson.com/products/search?q=Laptop";
    $json = json_decode(file_get_contents($url), true);
    $products =$json['products'];
$titles=array();
$brand=array();
$price=array();
$final=array();
foreach ($products as $key ) {
    $x= $key['title'];
    $y=$key['brand'];
    $z=$key['price'];
    array_push($titles, $x);
    array_push($brand, $y);
    array_push($price, $z);
    echo $y;
}
$length= count($titles);
$i=0;
while($i<$length)
{
    $final_result[]= array(
        $titles[$i],$brand[$i],$price[$i]
         );
    $i++;
}

print_r($final);
$myfile = fopen("laptop.csv", "w");
foreach($headers as $line){
    fputcsv($myfile, $line);
}
foreach($final_result as $line){
    fputcsv($myfile, $line);
}
echo("file is written successfuly \n");
echo("Laptop details are: \n ");
$file = fopen("laptop.csv","r");
while(! feof($file))
  {
  print_r(fgetcsv($file));
  }
fclose($file);
fclose($myfile);
?>  
