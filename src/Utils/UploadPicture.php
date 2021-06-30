<?php


namespace App\Utils;


use App\Controller\MainController;
use App\Form\LogementType;
use ContainerRpKIFxc\getContainer_EnvVarProcessorService;
use Doctrine\ORM\EntityManager;
use phpDocumentor\Reflection\Types\AbstractList;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Exception\ExceptionInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity;

class UploadPicture
{
      protected  $newFilename;

    public function loadpicture( $file, string $dirImage, $name){

        if($file){
            //$container = $this->kernel->getContainer();
            $newFilename=$name.'-'.uniqid().'.'.$file->guessExtension();

            $file->move($dirImage,$newFilename);

        }
        return $newFilename;
    }

}