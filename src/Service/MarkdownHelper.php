<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 13/02/2018
 * Time: 17:03
 */

namespace App\Service;

use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{
    private $cache;
    private $markdown;
//    private $logger;
//    private $isDebug;
//
        // Arguments to the constructor are autowired
    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown)
    {
        $this->cache = $cache;
        $this->markdown = $markdown;
//        $this->logger = $markdownLogger;
//        $this->isDebug = $isDebug;
    }

    public function parse(string $source, AdapterInterface $cache, MarkdownInterface $markdown): string
    {
//        if (stripos($source, 'bacon') !== false) {
//            $this->logger->info('They are talking about bacon again!');
//        }
//
//        // skip caching entirely in debug
//        if ($this->isDebug) {
//            return $this->markdown->transform($source);
//        }

        $item = $this->cache->getItem('markdown_'.md5($source));
        if (!$item->isHit()) {
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }

        return $item->get();
    }
}
