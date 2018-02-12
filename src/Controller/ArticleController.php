<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 12/02/2018
 * Time: 19:49
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
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
    public function  show($slug)
    {
        return new Response(Sprintf('Future page show the article: %s',
                                    $slug
        ));
    }


}