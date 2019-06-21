<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @route ("/", name="home")
     */
    public function home(){
        return $this->render('immo/home.html.twig', [
            'title' => "Bienvenue sur le site d'immobilier"
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
