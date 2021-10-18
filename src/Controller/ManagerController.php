<?php

namespace App\Controller;

use App\Entity\Collaborateur;
use App\Repository\CollaborateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CreateCollaborateurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/manager", name="manager_")
 */
class ManagerController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('manager/index.html.twig', [
            'controller_name' => 'ManagerController',
        ]);
    }
     
    /**
     * @Route("/collaborateur/ajouter", name="ajout_collaborateur")
     */
    public function ajoutCollaborateur(Request $request)
    {
        $collaborateur= new Collaborateur;
        $form = $this -> createForm(CreateCollaborateurType::class, $collaborateur);
        $form -> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        { 
            //$collaborateur -> setCollaborateur($this -> getUser() ); 
            $doctrine =$this -> getDoctrine() -> getManager();
            $doctrine->persist($collaborateur);
            $doctrine-> flush();
            
            $this -> addFlash('message', 'Collaborateur ajouté avec succès !!');
            return $this -> redirectToRoute('manager_index');
        }
        return $this -> render('manager/ajoutcollaborateur.html.twig', [
            'ajoutcollaborateurForm' => $form->createView()
        ]);
    }
   
    /**
     * @Route("/collaborateur", name="collaborateur")
     */
    public function collaborateurList(CollaborateurRepository $collaborateur)
    {
        return $this -> render("manager/collabliste.html.twig", [
            'collaborateur' => $collaborateur -> findAll()

        ]);
    }

    /**
     * Modifier les données d'un utilisateur
     *
     * @Route("/collaborateur/modifier/{id}", name="modifier_collaborateur")
     */
    public function EditCollaborateur(Collaborateur $collaborateur, Request $request)
    {
        $form = $this -> createForm(CreateCollaborateurType::class, $collaborateur);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid())
            {
                $entityManager = $this -> getDoctrine() -> getManager();
                $entityManager -> persist($collaborateur);
                $entityManager -> flush();

                $this -> addFlash('message', 'Utilisateur modifié avec succès !!');
                return $this -> redirectToRoute('manager_collaborateur');
            }
        return $this -> render('manager/editcollaborateur.html.twig', [
            'collaborateurForm' => $form -> createView()
        ]);
    }

     /**
     * Supprimer un collaborateur
     *
     * @Route("/collaborateur/supprimer/{id}", name="supprimer_collaborateur")
     */
    public function Delete(Collaborateur $collaborateur)
    {
        $entityManager = $this -> getDoctrine() -> getManager();
        $entityManager -> remove($collaborateur);
        $entityManager -> flush();

        $this -> addFlash('message','Utilisateur supprimer avec succès!!');
        return $this -> redirectToRoute('manager_liste_collaborateur');
    }
}
