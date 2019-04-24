<?php
//Sur cette page php, on a réalisé le message en orienté objet, à l'image du C++ afin de bien prendre comprendre comment fonctionne la POO
  class Commentary {

    const LIMIT_COMMENTARY = 5;
    private $username;
    private $message;

    public function __construct (string $username, string $message)
    {
      $this->username = $_SESSION['User'];
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
      if (strlen($this->message) < self::LIMIT_COMMENTARY){
        $error['message'] = 'Votre message est trop court';
      }
      return $error;
    }

  }
 ?>
