<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13.12.16
 * Time: 17.29
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedditController extends Controller{
  /**
   * @Route("reddit-list", name="githut")
   */
  public function listAction()
  {
    $posts = $this->getDoctrine()->getRepository('AppBundle:RedditPost')->findAll();
    dump($posts);
    return $this->render(':reddit:index.html.twig', [
      'posts' =>$posts,
    ]);
  }
}
