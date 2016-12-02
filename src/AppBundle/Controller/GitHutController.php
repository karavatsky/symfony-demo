<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 30.11.16
 * Time: 17.06
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller {
  /**
   * @Route("/", name="githut")
   */
  public function githutAction(Request $request)
  {
    return $this->render('githut/index.html.twig');
  }
}
