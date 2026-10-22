<?php

namespace App\Controller;
use App\Repository\GroupsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\GroupType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;



class GroupController extends AbstractController
{

    //lister des groupes
    #[Route('/group', name: 'app_group')]
    public function index(GroupsRepository $groupRepository): Response //le GroupsRepository eto le fichier repository ery am repertoire repository 
    {
        $groupList = $groupRepository ->findAll();

        //dd($groupList);
        return $this->render('group/index.html.twig', [
            'controller_name' => 'GroupController',
            'group_list' => $groupList,
        ]);
    }

    //ajouter des groupes 
    #[Route('/group/add', name: 'add_group')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response  
    {
 
        $form =$this->createForm(GroupType::class);
        $form -> add ('save', SubmitType::class, ['label'=>'Envoyer']);
        $form->handleRequest($request);
 
    if($form->isSubmitted() && $form->isValid())
    {
        $group = $form->getData();
        $entityManager->persist($group);
        $entityManager->flush();
        return $this->redirectToRoute('app_group');
    }

         return $this->render('group/add.html.twig', [ // ici c'est pour afficher la vue 
            'form_add' => $form->createView(), // ireto info tiko afficher alefa any am vue 
         ]);
    }

    //modifier les groupes 
    #[Route('/group/update/{id}', name: 'update_group')]

    public function update(int $id, GroupsRepository $groupRepository, Request $request, EntityManagerInterface $entityManager): Response {
    //je reccupère les données groupes avec son id 

    $group = $groupRepository->find($id);

    $form =$this->createForm(GroupType::class,$group);
    $form -> add ('save', SubmitType::class, ['label'=>'Modifier']);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $group = $form->getData();
        $entityManager->persist($group); // je prepare les données à envoyer dans la BDD
        $entityManager->flush(); // executer la modification 
        return $this->redirectToRoute('app_group');
    }

    return $this->render('group/update.html.twig',[
        'form_update' =>$form->createView(),
    ]);
}
}

