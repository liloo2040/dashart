<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    
    public function index() 
    {
        $posts = $this->getDoctrine()->getRepository(Post::Class)->findAll();

        return $this->render('posts/index.html.twig', array('posts' => $posts));
    }

    /**
     * @Route("/post/show/{id}", name="post_show")
     */
    public function show($id) 
    {

    }

//    /**
//      * @Route("/post/save")
//      */
//     public function save()
//     {
//         $entityManager = $this->getDoctrine()->getManager();
//         $post = new Post();
//         $post->setTitle('Post Two');
//         $post->setContent('Post Content');

//         $entityManager->persist($post);
//         $entityManager->flush();

//         return new Response ('Post saved with id '.$post->getId());
//     } 
}