<?php
header("Access-Control-Allow-Origin: *");

require __DIR__.'/vendor/autoload.php';

use App\Controllers\SkinController;
use App\Controllers\UserController;
use Marrios\Router\HttpRouter;


$router = new HttpRouter();


$router->get("/", [SkinController::class, "getAll"])->run();
$router->post("/register", [UserController::class, "create"])->run();
$router->get("/skin/{skin_id}", [SkinController::class, "getById"])->run();

$router->notFound("pagina nao encontrada");
