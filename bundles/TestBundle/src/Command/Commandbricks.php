<?php
namespace TestBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Model\DataObject;


class Commandbricks extends AbstractCommand
{
    
    protected function configure()
    {
        $this
            ->setName('brickscommand:command')
            ->setDescription('Nikhil chaudhary custom commands');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = fopen("product.csv","r");
        while (($line = fgetcsv($file,2000,",")) !== FALSE) {
        //echo'<pre>'; print_r($line); exit;
           
       $newObject = new DataObject\Product();
      //echo'<pre>'; print_r($newObject); exit;
        $newObject->setKey($line[0]);
        $newObject->setParentId(181);
        $newObject->setproductName($line[0]);
        $newObject->setModelNo($line[1]);
       $newObject->setDesc($line[2]);
       $newObject->setMRP($line[3]);
       $newObject->setSellingprice($line[4]);
     $newObject->setsku($line[5]);
     $objBrick = new \Pimcore\Model\DataObject\Objectbrick\Data\Test($newObject);
     $objBrick->setSize($line[7]);
     $objBrick->setDiemenation(floatval($line[8]));
     $newObject->getProduct()->setTest($objBrick);
       $newObject->setPublished(true);
        $newObject->save();
        }
    return 0;
        
    }
    
}