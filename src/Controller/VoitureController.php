<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        
        return $this->render('voiture/index.html.twig', [
           
        ]);
    }
     /**
     * @Route("/voiture", name="voiture")
     */
    public function new(Request $req, EntityManagerInterface $mana, VoitureRepository $repo): Response
    {
        $rp = $repo->findAll();
        $voit = new Voiture();
        $form = $this->createForm(VoitureType::class,$voit);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()){
            $mana->persist($voit);
            $mana->flush();

            return $this->redirectToRoute('voiture');
        }

        return $this->render('voiture/index.html.twig',[
            'form' =>$form->createView(),
            'rpo' =>$rp,
        ]);
    }

    /**
     * @Route("/modifie_voiture/{id}}", name="voiture_modif")
     */
    public function modifier(Voiture $voiture,EntityManagerInterface $manager,Request $request){
        $form=$this -> createForm(VoitureType::class, $voiture);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()){
            $manager -> flush();
            return  $this -> redirectToRoute('voiture');
        }
        return $this->render('voiture/modifie.html.twig',[
            'form'  => $form -> createView(),
        ]);
    }

    /**
     * @Route("/voiture/delete{id}", name="voiture_delete")
     *
     */
    public function supprimer($id,EntityManagerInterface $manager)
    {

        $voiture = $manager->getRepository(Voiture::class)->find($id);
        if ($voiture != null ){
            $manager->remove($voiture);
            $manager->flush();
        }
        return $this->redirectToRoute('voiture');
    }


}
