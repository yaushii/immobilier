<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ImmoController extends AbstractController
{
    /**
     * @Route("/immo", name="immo")
     */
    public function index(ArticleRepository $repo)
    {

        $articles = $repo->findAll();

        return $this->render('immo/index.html.twig', [
            'controller_name' => 'ImmoController',
            'articles' => $articles,
        ]);
    }

    /**
     * @route("/", name="home")
     */
    public function home(){
        return $this->render('immo/home.html.twig', [
            'title' => "Bienvenue sur le site d'immobilier"
        ]);
    }

    /**
     * @route("/immo/new", name="immo_create")
     */
    public function create(Request $request, objectManager $manager){
        $article = new Article();

        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class,[
            'attr' => [
                'placeholder' => 'nom du bien']])
            
        
        ->add('image', TextType::class,[
            'attr' => [
                'placeholder' => 'image']])

        ->add('content', TextareaType::class,[
            'attr' => [
                'placeholder' => 'descriptif']])

        ->getForm();


        return $this->render('immo/create.html.twig',[
            'formArticle' => $form->createView()
        ]);
    }

    /**
     * @route ("/immo/{id}", name="immo_show")
     */
    public function show(Article $article){
    
        return $this->render('immo/show.html.twig', [
            'article' => $article
        ]);
    }
}
