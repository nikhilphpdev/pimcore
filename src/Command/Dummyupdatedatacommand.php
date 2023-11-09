<?php

namespace App\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Log\ApplicationLogger;
use Pimcore\Model\DataObject;


class Dummyupdatedatacommand extends AbstractCommand
{
  public function testAction(ApplicationLogger $logger)
  {
      $logger->error('Your error message');
      $logger->alert('Your alert');
      $logger->debug('Your debug message', ['foo' => 'bar']); // additional context information
  }
  
    protected function configure(): void
    {
        $this
            ->setName('Update:command')
            ->setDescription('Nikhil Update custom command');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        
       $file = fopen("product.csv","r");
      
       while (($line = fgetcsv($file)) !== FALSE) {
         //echo'<pre>'; print_r($line);
           $SKU = $line[5];
           $newPrice = $line[6];
      try {
  
       $entries = new DataObject\Products\Listing();
        $entries->setCondition("SKU = ?", $SKU);
        $entries->load();
        foreach($entries as $v){
            $v->setMRP($newPrice);
            $v->setPublished(true);
            $v->save();
            
        }
     
    }
    catch (\Exception $e) 
        {
          // $output->writeln('An error occurred: ' . $e->getMessage());
           $this->logger->error('An error occurred: ' . $e->getMessage());
           $logger = $this->get(ApplicationLogger::class);
      $logger->error('Your error message');
            
            
        }

 }   
     return 0;
        
    }

  
    
}