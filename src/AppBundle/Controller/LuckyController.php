<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 9.11.16
 * Time: 16.57
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller {
  /**
   * @Route("/lucky/number")
   */
  public function numberAction() {
    $number = mt_rand(0, 100);

    return $this->render('lucky/number.html.twig', array(
        'number' => $number,
    ));

  }
}
