<?php

namespace App\Controller;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArtistType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;

class ArtistController extends AbstractController
{
    //lister les artistes
    #[Route('/artist', name: 'app_artist')]
    public function index(ArtistRepository $artistRepository): Response
    {
        $artistList = $artistRepository->findAll();

        //dd($artistList);
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'artist_list' => $artistList, //ampesaina any am vue le 'artist_list' eto 
        ]);
    }

    //ajouter les artistes 
    #[Route('/artist/add', name: 'add_artist')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form =$this->createForm(ArtistType::class);
        $form -> add('save', SubmitType::class, ['label'=>'Envoyer']);

       $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $artist = $form->getData();
            //dd($artist);
            $entityManager->persist($artist);
            $entityManager->flush();
            return $this->redirectToRoute('app_artist'); // app_artist eto nom an le route ery ambony 
        }
        //dd($artistList);
        return $this->render('artist/add.html.twig', [
            'form_add' => $form->createView(),
         ]); 
        
    }
    
    //modifier les artistes 
    #[Route('/artist/update/{id}', name: 'update_artist')]
    public function update(int $id, ArtistRepository $artistRepository, Request $request, EntityManagerInterface $entityManager): Response 
    {
        //je recupère les données artistes avec son id 
        $artist = $artistRepository->find($id);

        $form =$this->createForm(ArtistType::class,$artist);
        $form -> add('save', SubmitType::class, ['label'=>'Modifier']);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $artist= $form->getData();
            $entityManager->persist($artist);
            $entityManager->flush();
            return $this->redirectToRoute('app_artist');
        }

        //je sauvegarde les données recuperer dans le formulaire pour pouvoir le modifier 
   
    return $this->render('artist/update.html.twig', [
        'controller_name' => 'ArtistController', 
        'form_update' =>$form->createView(),
    ]);
}
}



