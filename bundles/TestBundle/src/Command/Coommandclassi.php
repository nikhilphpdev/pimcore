<?php
namespace TestBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Classificationstore;


class Coommandclassi extends AbstractCommand
{
    
    protected function configure()
    {
        $this
            ->setName('classicommand:command')
            ->setDescription('Nikhil chaudhary custom commands');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = fopen("product.csv","r");
        while (($line = fgetcsv($file,2000,",")) !== FALSE) {
        
            $newObject = new DataObject\Testproduct();
            //echo'<pre>'; print_r($newObject); exit;
            $newObject->setKey('testt');
            $newObject->setParentId(205);
            $newObject->setName('bbbb');
            $newObject->setDesc('bbbb');
            $newObject->setMobile(floatval('8889899'));
            $newObject->setSku('56vc');
        $dataObject = \Pimcore\Model\DataObject\Testproduct::getById(205);
        $classificationStore = $dataObject->getDummy();
        //$classificationStore->setbrandname(1, 1, 'tesitnnnn');
            echo'<pre>'; print_r($classificationStore); exit;
            $newObject->setPublished(true);
                $newObject->save();
        }
    return 0;
        
    }
    
}