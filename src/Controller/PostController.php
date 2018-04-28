<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    
    public function index() 
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('posts/index.html.twig', array('posts' => $posts));
    }

    /**
     * @Route("/post/new", name="new_post")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $post = new Post();
        $form = $this->createFormBuilder($post)
            ->add('title', TextType::class, array('attr' => 
            array('class' => 'form-control')))
            ->add('content', TextareaType::class, array(
                'required' => false, 
                'attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array(
                'label' => 'Save',
                'attr' => array('class' => 'btn btn-primary mt-3' )
                ))
            ->getForm();

        return $this->render('posts/new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show($id) 
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render('posts/show.html.twig', array('post' => $post));
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