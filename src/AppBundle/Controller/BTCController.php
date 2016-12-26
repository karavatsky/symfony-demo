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

class BTCController extends Controller{
  /**
   * @Route("btc", name="btc")
   */
  public function listAction()
  {
    $data = $this->btce_query('getInfo');
    dump($data);
    return $this->render(':btc:test.html.twig', [
      'data' =>$data,
    ]);
  }

  function btce_query($method, array $req = array()) {
    // API settings
    $key = 'TTYTFE3M-O4DYW551-3FC62QHC-248TOO45-4EOV73YX'; // your API-key
    $secret = '109d6d7dda9e495cea1d1abf51446e63efff218fe31b7f8cbb7dfa56811a0eb6'; // your Secret-key

    $req['method'] = $method;
    $mt = explode(' ', microtime());
    $req['nonce'] = $mt[1];

    // generate the POST data string
    $post_data = http_build_query($req, '', '&');

    $sign = hash_hmac('sha512', $post_data, $secret);

    // generate the extra headers
    $headers = array(
      'Sign: '.$sign,
      'Key: '.$key,
    );

    // our curl handle (initialize if required)
    static $ch = null;
    if (is_null($ch)) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; BTCE PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
    }
    curl_setopt($ch, CURLOPT_URL, 'https://btc-e.com/tapi/');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    // run the query
    $res = curl_exec($ch);
    if ($res === false) throw new Exception('Could not get reply: '.curl_error($ch));
    $dec = json_decode($res, true);
    if (!$dec) throw new Exception('Invalid data received, please make sure connection is working and requested API exists');
    return $dec;
  }
}
