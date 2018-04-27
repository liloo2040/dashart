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

        return $this->render('posts/index.html.twig');
    }
}