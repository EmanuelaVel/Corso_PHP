<?php


class ValidateMail implements Validable {

    private $message;
    private $valid;
    

    public function isValid(mixed $email) : bool {
        // $strip_tag = strip_tags($value);
        // $valueWidoutSpace = trim($strip_tag);
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }



    public function getMessage()
{
  return $this->message;
}

public function getValid()
{
  return $this->valid;
}


}

?>