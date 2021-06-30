<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementType;
use App\Repository\LogementRepository;
use App\Utils\UploadPicture;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/{page}", name="main_home", requirements={"page" : "\d+"})
     */
    public function home(int $page=1, LogementRepository $logementRepository): Response
    {
    //debut insertion des données
       /*
       for($i=1; $i<26; $i++)
        {
            $faker = Factory::create();
            $logement = new Logement();
            $logement->setSuperficie($faker->numberBetween(10, 250));
            $logement->setNbPieceHabitable($faker->randomDigit);
            $logement->setTypeLogement($faker->randomElement(array('maison', 'appartement','yourte')));
            $logement->setAdresse($faker->address);
            $logement->setCodePostal($faker->numberBetween(1000,9999));
            $logement->setVille($faker->city);
            $logement->setPiscine($faker->randomElement(array('true', 'false')));
            $logement->setExterieur($faker->randomElement(array('false', 'true')));
            $logement->setSurface($faker->numberBetween(10, 350));
            $logement->setGarage($faker->randomElement(array('true', 'false')));
            $logement->setVenteLocation($faker->randomElement(array('Location', 'Vente')));
            $logement->setPrixVenteLocation($faker->numberBetween(50,750));
            $logement->setDateParution($faker->dateTime);
            $logement->setPhoto($faker->imageUrl());
            $entityManager->persist($logement);
        }
        $entityManager->flush();
       */
  //fin insertion des données

      $nbAnnonce=$logementRepository->count([]);
      $nbPageMax=ceil($nbAnnonce / 18);
      if($page>=1 && $page<=$nbPageMax){
          $annonce=$logementRepository->searchHouse($page);
      }else{
          return $this->render('error/erreurs.html.twig',[
              'message'=>"cette page n'existe pas"
          ]);
      }

        return $this->render('main/home.html.twig', [
            'announces'=>$annonce,
            'currentPage'=>$page,
            'maxPage'=>$nbPageMax,
            'nbreAnnonce'=>$nbAnnonce
        ]);
    }

    /**
     * @Route("/details/{id}",name="main_detail")
     */

    public function detail($id, LogementRepository $logementRepository):Response
    {
        $annonce=$logementRepository->find($id);
        dump($id);
        if(!$annonce){
            $message="L'annonce avec l'id ".$id." n'existe pas ";
            return $this->render('error/erreurs.html.twig', ['message' =>$message]);
        }else {
            return $this->render('main/details.html.twig',['annonce'=>$annonce]);
        }
    }

    /**
     * @Route("/create", name="main_create")
     */
    public function create(Request $request,
                           EntityManagerInterface $entityManager,
                           UploadPicture $uploadPicture): Response
    {
        $logement= new Logement();
        $logementForm=$this->createForm(LogementType::class, $logement);
        $logementForm->handleRequest($request);
        if($logementForm->isSubmitted() && $logementForm->isValid()){
            $file=$logementForm->get('photo')->getData();
             if($file){
               //  $newFilename=$logement->getTypeLogement().'-'.uniqid().'.'.$file->guessExtension();
                 //$file->move($this->getParameter('upload_photo_logement_dir'),$newFilename);
                 $ImageDirectory=$this->getParameter('upload_photo_logement_dir');
                 $imageName=$logement->getTypeLogement();
                 //$logement->setPhoto($newFilename);
                 $logement->setPhoto($uploadPicture->loadpicture($file,$ImageDirectory,$imageName));
             }
             $logement->setDateParution(new \DateTime());
             $entityManager->persist($logement);
             $entityManager->flush();
             $this->addFlash('Info','Annonce ajoutée avec succès');
             return $this->redirectToRoute('main_detail',['id'=>$logement->getId()]);
        }

        return $this->render('main/create.html.twig',[
           'logementForm'=>$logementForm->createView()
        ]);

    }
}
