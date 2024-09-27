<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class MainController extends AbstractController
{
    private $em ;
    public function __construct( EntityManagerInterface $em){
        $this->em = $em ;

    }
      
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $posts= $this->em->getRepository(Post::class)->findAll();
        return $this->render('main/index.html.twig', [
            'posts'=> $posts,
        ]);
    }

    #[Route('/create-Post' , name : 'create-post')]
    public function createPost(Request $request){
        $post = new Post();
        $form = $this->createForm(PostType::class , $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($post);
            // Sauvegarde du post dans la base de données
            $this->em->persist($post);
            $this->em->flush();
            $this->addFlash('message' , 'post created successfully');

            // Redirection ou message de confirmation
            return $this->redirectToRoute('app_main');
        }
        return $this->render('main/post.html.twig' , [
            'form' =>$form->createView()
        ]);
    }

    #[Route('/edit-post/{id}', name: 'edit_post')]
    public function editPost(Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();

            $this->addFlash('message', 'Post updated successfully.');

            return $this->redirectToRoute('app_main');
        }

        return $this->render('main/post.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete-post/{id}', name: 'delete_post')]
    public function deletePost(Post $post): Response
    {
        $this->em->remove($post);
        $this->em->flush();

        $this->addFlash('message', 'Post deleted successfully.');

        return $this->redirectToRoute('app_main');
    }
}

