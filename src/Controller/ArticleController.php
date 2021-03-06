<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 12/02/2018
 * Time: 19:49
 */

namespace App\Controller;

use Michelf\MarkdownInterface;
use Nexy\Slack\Client;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\Service\MarkdownHelper;


class ArticleController extends AbstractController
{
    /**
     * Currently unused: just showing a controller with a constructor!
     */
    private $isDebug;

    public function __construct(bool $isDebug, Client $slack)
    {

        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function  homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug, MarkdownHelper $markdownHelper, Client $slack)
    {
        if ($slug === 'khaaaaaan') {
            $message = $slack->createMessage()
                ->from('John Doe')
                ->withIcon(':ghost:')
                ->setText('This is an amazing message!')
            ;

        }

        $comments = [
            'I ate normal rock',
            'hi',
            'Doutz!'
        ];


        $articleContent = <<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
lorem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
labore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
**turkey** shank eu pork belly meatball non cupim.

Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur
laboris sunt venison, et laborum dolore minim non meatball. Shankle eu flank aliqua shoulder,
capicola biltong frankfurter boudin cupim officia. Exercitation fugiat consectetur ham. Adipisicing
picanha shank et filet mignon pork belly ut ullamco. Irure velit turducken ground round doner incididunt
occaecat lorem meatball prosciutto quis strip steak.

Meatball adipisicing ribeye bacon strip steak eu. Consectetur ham hock pork hamburger enim strip steak
mollit quis officia meatloaf tri-tip swine. Cow ut reprehenderit, buffalo incididunt in filet mignon
strip steak pork belly aliquip capicola officia. Labore deserunt esse chicken lorem shoulder tail consectetur
cow est ribeye adipisicing. Pig hamburger pork belly enim. Do porchetta minim capicola irure pancetta chuck
fugiat.
EOF;
        //dump($cache);die;
        // Create item in memory
//        $item = $cache->getItem('markdown_'.md5($articleContent));
//
//        $articleContent = $markdown->transform($articleContent);
//        if(!$item->isHit()){
//            $item->set($markdown->transform($articleContent));
//            $cache->save($item);
//        }

        $articleContent = $markdownHelper->parse($articleContent);
        //dump($markdown);die;


//        dump($slug, $this, $comments);

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-',' ',$slug)),
            'slug' => $slug,
            'comments' => $comments,
            'articleContent' => $articleContent,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        // TODO - actually heart/unheart the article!

        $logger->info('Article is being hearted!');

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }


}