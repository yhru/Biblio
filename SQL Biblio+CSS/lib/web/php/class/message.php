<?php
  class Commentary {

    const LIMIT_USERNAME = 2;
    const LIMIT_MESSAGE = 5;
    private $username;
    private $message;

    public function __construct (string $username, string $message)
    {
      $this->username = $username;
      $this->message = $message;

    }

    public function CheckValidBoolean (): bool
    {
      //Si on a pas d'erreurs, ça renvoie true = formulaire valide sinon ça renvoie false
      return empty($this->GetErrorsCommentary());
    }

    public function GetErrorsCommentary (): array
    {
      $error = [];
      if (strlen($this->username) <= self::LIMIT_USERNAME){
        $error['username'] = 'Votre pseudo est trop court';
      }

      if (strlen($this->message) < self::LIMIT_MESSAGE){
        $error['message'] = 'Votre message est trop court';
      }
      return $error;
    }

  }
 ?>
