<?php

namespace App\MyLibrary;

class Moni
{
    private $myid;
    public function __construct($id)
    {
        $this->myid=$id;
    }
    public function fun()
    {
        echo $this->myid;
    }
}
