<?php
namespace TestBundle\Command;

//use TestBundle\Service\DataCustomService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Images;
use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Gallery;

class Commandtest extends AbstractCommand
{
    
    // protected $service;

    // public function __construct(DataCustomService $service)
    // {
    //     $this->service = $service;
    //     parent::__construct();
    // }

    protected function configure()
    {
        $this
            ->setName('testcommand:command')
            ->setDescription('Nikhil chaudhary custom command');
    }

    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
      // $this->service->testing();
   try{
      $file = fopen("product.csv","r");
      $line = fgetcsv($file, '1000', ",");
    //   print_r($line);die;
    $i=0;
    
        while (($line = fgetcsv($file, '1000', ",")) !== FALSE) {
            if($i >= 0){
                 $imgArray = explode(",",$line[7]);
                 $galleryData = $imgArray;
                 $items=[];
            foreach($galleryData as $img){

                $image = new \Pimcore\Model\Asset\Image();
                $image->setParent(\Pimcore\Model\Asset::getById(33));
                $image->setFilename(basename($img).uniqid());
                $image->setData(file_get_contents(trim($img)));
                $image->save();


                $advancedImage = new \Pimcore\Model\DataObject\Data\Hotspotimage();
                $advancedImage->setImage($image);
                $items[] = $advancedImage;
                 } 
                //echo '<pre>';print_r($items);die;
                 $newObject = new DataObject\Images();
                 $newObject->setGallery(new \Pimcore\Model\DataObject\Data\ImageGallery($items));

            $newObject->setKey($line[0]);
            $newObject->setParentId(212);
            $newObject->setName($line[0]);
            $newObject->setModel($line[1]);
            $newObject->setDesc($line[2]);
            $newObject->setMRP($line[3]);
            $newObject->setSellingprice($line[4]);
            $newObject->setsku($line[5]);
            $newObject->setImage($image);
           
            $newObject->setPublished(true);
            $newObject->save();
            }
        $i++;
         
      }
               
 /// }   
    return 0;
        
    }
catch(Exception $e){
    print_r($e->getMessage());die;

}
    }
    
}