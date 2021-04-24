<?php
  class SuccessMessages {
    // SUCCESS_CONTROLLER_METHOD_ACCION
    const PRUEBA = "c06fb39bbcb53eaa27593bec1282f275";

    private $successList = [];

    public function __construct() {
      
      $this->successList = [
        SuccessMessages::PRUEBA => 'Mensaje de exito.'
      ];
    }

    public function get($hash) {
      return $this->successList[$hash];
    }

    public function existeKey($key) {
      if(array_key_exists($key, $this->successList)) {
        return true;
      } else {
        return false;
      }
    }
  }
?>