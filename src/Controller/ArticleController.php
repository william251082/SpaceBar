<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 12/02/2018
 * Time: 19:49
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    public function  homepage()
    {
        return new Response('New Page');
    }
}