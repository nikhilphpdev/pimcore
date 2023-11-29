<?php 
namespace TestBundle\Service;
//use TestBundle\Service\DataCustomService;

class DataCustomService
{
    public function testing()
    {
        $file = fopen("product.csv","r");
        while (($line = fgetcsv($file)) !== FALSE) {
        //echo'<pre>'; print_r($line);
           
       $newObject = new DataObject\Product();
      echo'<pre>'; print_r($newObject); exit;
        $newObject->setKey($line[0]);
        $newObject->setParentId(153);
        $newObject->setproductName($line[0]);
        $newObject->setModelNo($line[1]);
       $newObject->setDesc($line[2]);
       $newObject->setMRP($line[3]);
       $newObject->setSellingprice($line[4]);
     $newObject->setsku($line[5]);
       $newObject->setPublished(true);
        $newObject->save();
        
     
    }
}
}