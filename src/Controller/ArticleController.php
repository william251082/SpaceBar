<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 12/02/2018
 * Time: 19:49
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function  homepage()
    {
        return new Response('New Page');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        $comments = [
            'I ate normal rock'
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-',' ',$slug)),
            'comments' => $comments,
        ]);
    }


}