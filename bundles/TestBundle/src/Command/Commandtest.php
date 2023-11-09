<?php
namespace TestBundle\Command;

use TestBundle\Service\DataCustomService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;




class Commandtest extends AbstractCommand
{
    
    protected $service;

    public function __construct(DataCustomService $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('testcommand:command')
            ->setDescription('Nikhil chaudhary custom command');
    }

    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       $this->service->testing();

//        $file = fopen("product.csv","r");
//        while (($line = fgetcsv($file)) !== FALSE) {
//        //echo'<pre>'; print_r($line);
     

//  }   
    return 0;
        
    }
    
}