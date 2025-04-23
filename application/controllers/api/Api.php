<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '../../vendor/autoload.php'; // Carrega o autoload do Composer

// use OpenApi\Attributes as OA;

use OpenApi\Annotations as OA;

class OpenApi {}

/**
 * @OA\Info(
 *     title="Minha API CodeIgniter",
 *     version="1.0.0",
 *     description="Documentação Oficial da API",
 *     @OA\Contact(email="suporte@example.com")
 * )
 * @OA\Server(url="http://localhost:9100")
 */
// class Api extends CI_Controller {
//     // Este controller pode estar vazio, serve apenas para as anotações globais
// }

