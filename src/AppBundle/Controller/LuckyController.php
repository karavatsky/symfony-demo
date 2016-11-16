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

class LuckyController {
  /**
   * @Route("/lucky/number")
   */
  public function numberAction()
  {
    $number = mt_rand(0, 100);

    return new Response(
      '<html><body>Lucky number: '.$number.'</body></html>'
    );
  }
}
