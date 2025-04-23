<?php
// exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '../../vendor/autoload.php'; // Carrega o autoload do Composer
// error_reporting(-1);
//  ini_set('display_errors', 1);
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="CodeIgniter API",
 *     version="1.0.0",
 *     description="API Documentation"
 * )
 * @OA\Server(
 *     url="http://0.0.0.0:9100",
 *     description="API Server"
 * )
 */
class Api extends CI_Controller {
    // Este controller pode estar vazio, serve apenas para as anotações globais
}

