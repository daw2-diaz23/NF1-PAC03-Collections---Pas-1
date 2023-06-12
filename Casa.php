<html>
<body>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>

<?php

abstract class Construccion {
  
  private $nombre;
  private $superficie;
  private $Construccion = array();
  
  public function add(Construccion $Construccion) {
     array_push($this->Construccion, $Construccion);
  }
  
  public function remove(Construccion  $Construccion) {
     array_pop($this->Construccion);
  }
        
  public function hasChildren() {
    return (bool)(count($this->Construccion) > 0);
  }
    
  public function getChild($i) {
    return $this->Construccion[i];

  }
    
  public function getDescription() {
    echo "- " . $this->getNombre();
    echo " de " . $this->getSuperficie() . " metros";
    if ($this->hasChildren()) {
      echo " <br>";
      foreach($this->Construccion as $Construccion) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $Construccion->getDescription();
         echo "</td></tr></table>";
      }        
    }
  }

  public function getSuma() {
    $superficieTotal=0;
    if($this->hasChildren()){
        foreach($this->Construccion as $Construccion){
            $superficieTotal= $superficieTotal + $Construccion->getSuma();
        }
    }
    return $superficieTotal + $this->superficie;
  }

  
 public function setNombre($nombre) {
   $this->nombre = $nombre;
 }
  
 public function getNombre() {
   return $this->nombre;
 }
         
 public function setSuperficie($superficie) {
    $this->superficie = $superficie;
 }

 public function getSuperficie() {
   return $this->superficie;
  }
}

class Habitacion extends Construccion {
    function __construct($nombre, $superficie) {
    parent::setNombre($nombre);
    parent::setSuperficie($superficie);
  }      
}

class Puerta extends Construccion {
  function __construct($nombre, $superficie) {
   parent::setnombre($nombre);
   parent::setSuperficie($superficie);
  }
}

class Ventana extends Construccion {
    function __construct($nombre, $superficie) {
    parent::setnombre($nombre);
    parent::setSuperficie($superficie);
  }
}


$Habitacion = new Habitacion("1 comedor de ", 60);
$p=new Puerta("Primera puerta", 2);
$p->add(new Habitacion("Habitación de juegos", 15));
$p->add(new Ventana("Ventana ", 2));
$p2=new Puerta("Segunda puerta", 2);
$p2->add(new Habitacion("Cocina", 40));
$p2->add(new Ventana("Mini Balcon", 6));
$p3=new Puerta("Tercera puerta", 2);
$p3->add(new Habitacion("Habitación de matrimonio", 30));
$p3->add(new Ventana("Ventana ", 2));
$p3->add(new Ventana("Vestidor", 10));
$p4=new Puerta("Cuarta Puerta", 2);
$p4->add(new Habitacion("Lavabo", 8));
$p5=new Puerta("Quinta Puerta", 2);
$p5->add(new Habitacion("Habitación ", 15));
$p5->add(new Habitacion("Ventana ", 2));
$p6=new Puerta("Sexta Puerta", 2);
$p6->add(new Habitacion("Habitación ", 15));
$p6->add(new Habitacion("Ventana ", 2));

/*
$Habitacion->add($p);
$Habitacion->add($p2);
$Habitacion->add($p3);
$Habitacion->add($p4);
$Habitacion->add($p5);
$Habitacion->add($p6);

echo "Mi casa: <p>";
$Habitacion->getDescription();

echo "Tiene una superficie total de ";
echo $Habitacion->getSuma();

echo "Metros"

*/


?>

</body>
</html>
