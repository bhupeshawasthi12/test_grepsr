<!-- 5.Write a crawler in PHP to extract data from URL: https://books.toscrape.com/
a. Navigate to category ‘Science’
b. Collect all the listings available (across pages)
c. Collect the following data from each listing (column names as listed in bold, with
required datatype):
i. id: Create a random alphanumeric text value of length 8 – String
ii. category : ‘Science’ (Fixed value – String)
iii. category_url : Category URL – String
iv. title : Book Title (full text – String)
v. price : Price listed for the book – Float
vi. stock: Stock Availability – String
vii. rating: No of Ratings (Stars value – Float)
viii. url: Detail URL of the book – String
 -->

//setlocale(LC_ALL, 'en_US.UTF-8');set this otherwise while writting csv file it miss some component 
 //Note:A package name Guzzale is used for web crawler

<?php
require 'vendor/autoload.php';
$httpClient = new \GuzzleHttp\Client(['verify'=>false]);
$response = $httpClient->get('https://books.toscrape.com/catalogue/category/books/science_22/');
$htmlString = (string) $response->getBody();
//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
print_r($titles,true);
echo gettype($titles);
$a=array();
$c=array();
$d=array();
$availity=array();
$price=array();
$links=array();
$desiredTag = "p";
$desiredTag1 = "image_container";
  foreach ($xpath->query('//'.$desiredTag) as $node) {
        $b = $node->getAttribute('class');

       
         array_push($a, $b);
     
         }

          



 
 $res = $xpath -> query('//ol[@class="row"]//li//article//h3//a/@href');

if ($res -> length > 0)
{
    foreach ($res as $node)
    {
       $new= $node -> nodeValue ;
       array_push($links, $new);

    }
}
else
    echo "There were no external links found.";
     
for ($x = 0; $x <= 41; $x++) {
  array_push($c, $a[$x]);
  $x=$x+2;
}
foreach ($c as $value) {
}

$prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');


$availibale =$xpath->evaluate('
//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="instock availability"]');



foreach ($titles as $key => $title) {
$x= $title->textContent .PHP_EOL;
array_push($d, $x);
}

foreach ($availibale as $key => $title) {
$x= $title->textContent .PHP_EOL;
array_push($availity, $x);

}
foreach ($prices as $key => $title) {
$x= $title->textContent.PHP_EOL;
array_push($price, $x);

}
 echo gettype($x);
 $count= count($c);
 

  function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


$category="science";
$category_link="https://books.toscrape.com/catalogue/category/books/science_22";
$digit_value=array();
for ($x = 0; $x <= $count-1; $x++) {
  
  $val =generateRandomString(8)  ;
  array_push($digit_value, $val);
  echo "\n";
    echo "\n";
  echo (" ID: $val \n Title:$d[$x] \n Category: $category \n Category_Url: $category_link \n Stock:$availity[$x] \n Price:$price[$x] \n Rating:$c[$x] \n URL: $links[$x] \n");
 
}


$length= count($price);
$i=0;
while($i<$length)
{
    $final_result[]= array(
        $digit_value[$i],$d[$i],$category,$category_link,$availity[$i],$price[$i],$c[$i],$links[$i]


    );
    $i++;
}

$myfile = fopen("science_listing.csv", "w");
foreach($final_result as $line){
    fputcsv($myfile, $line);
}
echo("\n");
echo("file is written successfuly");
fclose($myfile);

?>
