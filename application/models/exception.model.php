<?php

class Exception_Model extends Model {
  private $exception;

  public function __construct( $exception ) {
    $this->exception = $exception;
  }

  public function getExceptionHeader() {
    switch (get_class($this->exception) ) {
            case 'PDOException':
                return 'Database error';
                break;
            case 'Exception':
            default:
                return 'Application error';
                break;
        } // end switch
  }

  public function getExceptionMessage() {
    $content  = 'Message: <b>' . $this->exception->getMessage() . '</b> <br />';
    $content .= 'An error (<b>code ' . $this->exception->getCode() . '</b>) occure in file <b>' . $this->exception->getFile() . '</b> at line <b>' . $this->exception->getLine() . '</b>';

    return $content;
  }

  public function getExceptionTraces() {
    $content = array();

    foreach( $this->exception->getTrace() as $trace ) {
      $content[] = $trace;
    }

    return $content;
  }
}

?>
