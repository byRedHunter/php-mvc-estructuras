<?php
  class ErrorMessages {
    // ERROR_CONTROLLER_METHOD_ACCION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "c06fb39bbcb53eaa27593bec1282f275";

    private $errorList = [];

    public function __construct() {
      $this->errorList = [
        ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'El nombre de la categoría ya existe.'
      ];
    }

    public function get($hash) {
      return $this->errorList[$hash];
    }

    public function existeKey($key) {
      if(array_key_exists($key, $this->errorList)) {
        return true;
      } else {
        return false;
      }
    }
  }
?>