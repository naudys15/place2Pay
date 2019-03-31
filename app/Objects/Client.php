<?php
namespace App\Objects;

class Client
{

    var $name;
    var $surName;
    var $email;
    var $address;

    public function __construct($name, $email, $surName = null, $address = null)
    {
        $this->name = $name;
        $this->surName = $surName;
        $this->email = $email;
        $this->address = $address;
    }

    public function getClient()
    {
        if ($this->surName != null && $this->address != null) {
            $client = array(
                'name' => $this->name,
                'surName' => $this->surName,
                'email' => $this->email,
                'address' => $this->address
            );
            return $client;
        }
        $client = array(
            'name' => $this->name,
            'email' => $this->email
        );
        return $client;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurName()
    {
        return $this->surName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }
}