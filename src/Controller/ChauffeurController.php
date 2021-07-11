<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Form\ChauffeurType;
use App\Repository\ChauffeurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChauffeurController extends AbstractController
{

    /**
     * @Route("/", name="chauffeur")
     */
    public function new(Request $request, EntityManagerInterface $manager, ChauffeurRepository $repo): Response
    {

         $repos = $repo->findAll();
         $chau = new Chauffeur();
         $form = $this->createForm(ChauffeurType::class, $chau);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isSubmitted()){

             $manager->persist($chau);
             $manager->flush();

             return $this->redirectToRoute('chauffeur');
         }

        return $this->render('chauffeur/index.html.twig', [
            'forms' => $form->createView(),
            'repo'=> $repos

        ]);
    }

}
