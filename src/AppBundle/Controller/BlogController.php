<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 25.11.16
 * Time: 17.06
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller {
  /**
   * Matches /blog exactly
   *
   * @Route("/blog", name="blog_list")
   */
  public function listAction()
  {
    // ...
  }

  /**
   * Matches /blog/*
   *
   * @Route("/blog/{slug}", name="blog_show")
   */
  public function showAction($slug)
  {
    // /blog/my-blog-post
    $url = $this->generateUrl(
      'blog_show',
      array('slug' => 'my-blog-post')
    );

    $url = $this->container->get('router')->generate(
      'blog_show',
      array('slug' => 'my-blog-post2')
    );

    $a = 1;
    return new Response(
      '<html><body>Url: ' . $url . '</body></html>'
    );
  }
}
