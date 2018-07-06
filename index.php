<?php
declare(strict_types=1);

ini_set('display_errors', '1');
use Core\Router\Routing;

/**
* Dispatcheur
*/
define('ROOT', dirname(__FILE__));
define('WEBROOT', 'https://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

// On charge le Singleton
require ROOT . '/app/App.php';
require ROOT . '/config/env.php';

// On appel la méthode statique Load()
App::Load();

// On récupère l'url
$page = $_GET['url'] ?? '';

// On indique le chemin du fichier où les routes sont répertoriées
$ymlFile = ROOT."/app/Routes/routes.yml";
$routing = new Routing($ymlFile, $page);
$routing->routeManager();

// Nous sommes en dev, une ligne rouge apparaît
if(ENV === 'dev'){
  echo '<div class="col bg-warning" style="background-color:#f00; position: fixed;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 7px;
        z-index: 99999;
        ">
        </div>';
}