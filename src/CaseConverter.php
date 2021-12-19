<?php
namespace Bastelbot\Common;

class CaseConverter {

  public static function camelToSnake($str) {
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
  }

  public static function snakeToCamel($str) {
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $str))));
  }

  public static function pascalToSnake($str) {
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
  }

  public static function snakeToPascal($str) {
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
  }

  public static function pascalToCamel($str) {
    return lcfirst($str);
  }

  public static function camelToPascal($str) {
    return ucfirst($str);
  }

}
