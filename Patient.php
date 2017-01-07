<?php
/**
 * Created by PhpStorm.
 * User: Service Account
 * Date: 10/29/2016
 * Time: 12:14 PM
 */

namespace PCGLIS;


class Patient
{
    private $FirstName;
    private $LastName;
    private $DOB;

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}