<?php

namespace App\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Bundle\ApplicationLoggerBundle\ApplicationLogger;

class Customcommand extends AbstractCommand
{
    

    protected function configure(): void
    {
        $this
            ->setName('product:command')
            ->setDescription('Nikhil custom command');
    }

    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
       $file = fopen("product.csv","r");
       while (($line = fgetcsv($file)) !== FALSE) {
       //echo'<pre>'; print_r($line);
          
      try {
      $newObject = new DataObject\Product();
     //echo'<pre>'; print_r($newObject); exit;
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
    catch (\Exception $e) 
        {
           //$output->writeln('An error occurred: ' . $e->getMessage());
           //$this->logger->error('An error occurred: ' . $e->getMessage());
            
            
        }

 }   
     return 0;
        
    }
    
}