<?php

class Character {

    private $punchPower;
    private $legPower;
    private $name;
    private $health;

    public function __construct()
    {
        $this->punchPower = 5;
        $this->legPower = 10;
        $this->name = "name";
        $this->health = 100;
    }

    public function setter($data){
        $this->punchPower = $data['punchPower'];
        $this->legPower = $data['legPower'];
        $this->name = $data['name'];
    }

    public function punchhit(){

    }

    public function leghit(){

    }

    public function __destruct()
    {
        print_r( $this->name . " has been defeated");
    }


}

class SuperCharacter extends Character{
    private $combo = 300;
}


$ken = new Character();
$jun_hoon = new Character();
$pandit = new Character();

$cris = new SuperCharacter();
print_r($cris);

