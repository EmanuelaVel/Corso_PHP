<?php

class validateGender {
    public function isValid(string $gender) : bool {
        if ($gender == 'on') {
            return true;
        }else {
            return false;
        }
            }
}
