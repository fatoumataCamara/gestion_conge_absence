<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
  * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

     /**
     * Liste de tous les utilisateurs
     *
     * @Route("/users", name="users")
     */
    public function usersList(UserRepository $user)
    {
        return $this -> render("admin/users.html.twig", [
            'user' => $user -> findAll()

        ]);
    }

    
    /**
     * Modifier les données d'un utilisateur
     *
     * @Route("/users/modifier/{id}", name="modifier_users")
     */
    public function EditUser(User $user, Request $request)
    {
        $form = $this -> createForm(EditUserType::class, $user);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid())
            {
                $entityManager = $this -> getDoctrine() -> getManager();
                $entityManager -> persist($user);
                $entityManager -> flush();

                $this -> addFlash('message', 'Utilisateur modifié avec succès !!');
                return $this -> redirectToRoute('admin_users');
            }
        return $this -> render('admin/edituser.html.twig', [
            'userForm' => $form -> createView()
        ]);
    }

     /**
     * Supprimer un utilisateur
     *
     * @Route("/users/supprimer/{id}", name="supprimer_users")
     */
    public function Delete(User $user)
    {
        $entityManager = $this -> getDoctrine() -> getManager();
        $entityManager -> remove($user);
        $entityManager -> flush();

        $this -> addFlash('message','Utilisateur supprimer avec succès!!');
        return $this -> redirectToRoute('admin_users');
    }
}
