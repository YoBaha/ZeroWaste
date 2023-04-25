<?php


class article {
    private $reference=null ;
    private $name=null;

    private $description=null;
    private $price=null;
   

    public function __construct($reference=null , $name = null , $description = null, $price = null) {
        $this->reference  = $reference ;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
      
    }
   

    // Getters and setters for each property
public function getreference (){
    return $this->reference ;
}


    public function setreference($reference ){
        $this->reference  = $reference ;
    }
   
    public function getname(){
        return $this->name;
    }
    
    public function setname($name){
        $this->name = $name;
    }
    public function getdescription() {
        return $this->description;
    }

    public function setdescription($description) {
        $this->description = $description;
    }

    public function getprice() {
        return $this->price;
    }

    public function setprice($price) {
        $this->price = $price;
    }

    
}
?>