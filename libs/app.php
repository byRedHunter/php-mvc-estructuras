<?php
  require_once 'controllers/errores.php';

  class App {
    function __construct() {
      $url = isset($_GET['url']) ? $_GET['url'] : null;
      $url = rtrim($url, '/'); // borrar cualquier diagonal que se encuentre al final
      $url = explode('/', $url); // divide la url en un arreglo que separa por /
      // user/updatePhoto -> controller/method

      if(empty($url[0])) {
        error_log('APP::Construct-> no hay controlador especificado');
        $archivoController = 'controllers/login.php';
        require_once $archivoController;
        $controller = new Login();
        $controller->loadModel('login');
        $controller->render();
        return false;
      }

      // definimos una ruta pra cargar el controlador que se llame
      $archivoController = 'controllers/' . url[0] . '.php';

      if(file_exists($archivoController)) {
        require_once $archivoController;

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        // validar que exista un metodo para el controlador
        if(isset($url[1])) {
          // validar si existe ese metodo en el controlador
          if(method_exists($controller, $url[1])) {
            // si tiene parametros
            if(isset($url[2])) {
              // nro de parametros
              $nparam = count($url) - 2;
              //arreglo de parametros
              $params = [];
              for($i = 0; $i < $nparam; $i++) {
                array_push($params, $url[$i] + 2);
              }

              // pasamos los parametros al metodo del controlador
              $controller->{$url}($params);
            } else {
              // no tiene parametros, se manda a llamar el metodo tal cual
              $controller->{$url[1]}();  //llamda a un metodo de forma dinamica
            }
          } else {
            // error, no existe el metodo
            $controller = new Errores();
            $controller->render();
          }
        } else {
          // no hay metodo a cargar, se carga el metodo por default
          $controller->render();
        }
      } else {
        // no existe el archivo, se manda un error o pagina 404
        $controller = new Errores();
        $controller->render();
      }
    }
  }
?>