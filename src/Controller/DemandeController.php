<?php

namespace App\Controller;

use App\Entity\DemandeConge;
use App\Entity\Collaborateur;
use App\Entity\DemandeAutorisationAbs;
use App\Entity\TraiterDemandeAutorisationAbs;
use App\Entity\TraiterDemandeConge;
use App\Form\DemandeCongeType;
use App\Form\DemandeAutorisationAbsType;
use App\Form\TraiterDemandeAutorisationAbsType;
use App\Form\TraiterDemandeCongeType;
use App\Repository\DemandeAutorisationAbsRepository;
use App\Repository\DemandeCongeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demande", name="demande")
     */
    public function index(): Response
    {
        return $this->render('demande/index.html.twig', [
            'controller_name' => 'DemandeController',
        ]);
    }
    /**
     * @IsGranted("ROLE_COLLABORATEUR")
     * @Route("/demande/envoyerConge", name="envoyer_demandeConge")
     */
    public function envoyerDemandeConge(Request $request)
    {
        $demandeConge = new DemandeConge;
        $form = $this -> createForm(DemandeCongeType::class, $demandeConge);
        $form -> handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        { 
            $demandeConge -> setCollaborateur($this -> getUser() ); 
            $doctrine =$this -> getDoctrine() -> getManager();
            $doctrine->persist($demandeConge);
            $doctrine-> flush();
            
            $this -> addFlash('message', 'Votre demande de congé est envoyé !!');
            return $this -> redirectToRoute('collaborateur_accueil');
        }
        return $this -> render('demande/envoyerDemandeCongeForm.html.twig', [
            'envoyerDemandeCongeForm' => $form->createView()
        ]);
    }


    /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/voirconge", name="voir_demandeConge")
     */
    public function voirDemandeConge(DemandeCongeRepository $demandeConge)
    {
        return $this -> render("demande/voirdemande.html.twig", [
            'demandeConge' => $demandeConge -> findAll()

        ]);
    }

     /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/supprimerConge/{id}", name="supprimer_demandeConge")
     */
    public function supprimerDemandeConge(DemandeConge  $demandeConge)
    {
        $entityManager = $this -> getDoctrine() -> getManager();
        $entityManager -> remove($demandeConge);
        $entityManager -> flush();

        $this -> addFlash('message','Utilisateur supprimer avec succès!!');
        return $this -> redirectToRoute('voir_demandeConge');
    }
    
    /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/traiterConge/{id}", name="traiter_demandeConge")
     */
    public function traiterDemandeConge(TraiterDemandeConge $traiterDemandeConge, Request $request)
    {
        $form = $this -> createForm(TraiterDemandeCongeType::class, $traiterDemandeConge );
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid())
            {
                $entityManager = $this -> getDoctrine() -> getManager();
                $entityManager -> persist($traiterDemandeConge);
                $entityManager -> flush();

                $this -> addFlash('message', 'Utilisateur modifié avec succès !!');
                return $this -> redirectToRoute('voir_demandeConge');
            }
        return $this -> render('demande/traiterdemandeconge.html.twig', [
            'traiterdemandecongeForm' => $form -> createView()
        ]);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @IsGranted("ROLE_COLLABORATEUR")
     * @Route("/demande/envoyerDemandeAutorisationAbs", name="envoyer_demandeAbsence")
     */
    public function envoyerDemandeAutorisationAbs(Request $request)
    {
        $demandeAutorisationAbs = new DemandeAutorisationAbs;
        $form = $this -> createForm(DemandeAutorisationAbsType::class, $demandeAutorisationAbs);
        $form -> handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        { 
            $demandeAutorisationAbs -> setCollaborateur($this -> getUser() ); 
            $doctrine =$this -> getDoctrine() -> getManager();
            $doctrine->persist($demandeAutorisationAbs);
            $doctrine-> flush();
            
            $this -> addFlash('message', 'Votre demande d autorisation d absence est envoyé !!');
            return $this -> redirectToRoute('collaborateur_accueil');
        }
        return $this -> render('demande/envoyerDemandeAbsence.html.twig', [
            'envoyerDemandeAbsenceForm' => $form->createView()
        ]);
    }
    
    /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/voir_abs", name="voir_demandeAbsence")
     */
    public function voirDemandeAbsence(DemandeAutorisationAbsRepository $demandeAutorisationAbs)
    {
        return $this -> render("demande/voirdemandeAbsence.html.twig", [
            'demandeAutorisationAbs' => $demandeAutorisationAbs -> findAll()

        ]);
    }
    
     /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/supprimerAbs/{id}", name="supprimer_demandeAbsence")
     */
    public function supprimerDemandeAutorisationAbs(DemandeAutorisationAbs $demandeAutorisationAbs)
    {
        $entityManager = $this -> getDoctrine() -> getManager();
        $entityManager -> remove($demandeAutorisationAbs);
        $entityManager -> flush();

        $this -> addFlash('message','Demande supprimer avec succès!!');
        return $this -> redirectToRoute('voir_demandeAbsence');
    }

     /**
     * @IsGranted("ROLE_MANAGER")
     * @Route("/demande/traiterAbsence/{id}", name="traiter_demandeAbsence")
     */
    public function traiterDemandeAutorisationAbs(TraiterDemandeAutorisationAbs $traiterDemandeAutorisationAbs,Request $request)
    {
        $form = $this -> createForm(TraiterDemandeAutorisationAbsType::class, $traiterDemandeAutorisationAbs );
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid())
            {
                $entityManager = $this -> getDoctrine() -> getManager();
                $entityManager -> persist($traiterDemandeAutorisationAbs);
                $entityManager -> flush();

                $this -> addFlash('message', 'Demande traitée avec succès !!');
                return $this -> redirectToRoute('voir_demandeAbsence');
            }
        return $this -> render('demande/traiterdemandeautorisationabs.html.twig', [
            'traiterdemandeautorisationabsForm' => $form -> createView()
        ]);
    }
}

