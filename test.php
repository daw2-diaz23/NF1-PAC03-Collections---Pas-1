<?php
require_once('class.collection.php');
require_once('observable.php');
require_once('abstract_widget.php');
require_once('Casa.php');


class Foo{

  private $_name;
  private $_number;

  public function __construct($name, $number){
    $this->_name = $name;
    $this->_number = $number;
  }

  public function __toString() {
    return $this->_name . ' is number ' . $this->_number;
  }

}

$colFoo = new Collection();
$colFoo->addItem(new Foo("Steve", 14), "steve");
$colFoo->addItem(new Foo("Ed", 37), "ed");
$colFoo->addItem(new Foo("Bob", 49));

$objSteve = $colFoo->getItem("steve");

print $objSteve; //prints "Steve is number 14"
$colFoo->removeItem("steve"); //deletes the "steve" object

try {
  $objSteve = $colFoo->getItem("steve"); //throws KeyInvalidException
} catch (KeyInvalidException $kie) {
  print "Thec collection doesn't contain anything called 'steve'";
}

$dat = new DataSource();
$dat2 = new DataSource();

class DataCollection extends Collection{
    /*public function addItem(Widget $obj, $key = null){
        parent::addItem($obj, $key);

    }*/
}

//Creamos un nuevo objeto de DataCollection
$dades = new DataCollection();


//Añadimos objetos a la coleccion
$dades->addItem($dat, 'Data1');
$dades->addItem($dat2, 'Data2');

$wid1 = new BasicWidget();
$wid2 = new FancyWidget();

class WidgetCollection extends Collection{
   /* public function addItem(DataSource $obj, $key = null){
        parent::addItem($obj, $key);

    }*/

}

$widgets = new WidgetCollection();

$widgets->addItem($wid1, 'Wid1');
$widgets->addItem($wid2, 'Wid2');



$da3=$dades->getItem('Data1');
$da4=$dades->getItem('Data2');


$wid1=$widgets->getItem('Wid1');
$wid2=$widgets->getItem('Wid2');


$da3->addObserver($wid1);
$da4->addObserver($wid2);


$da3->addRecord("drum", "$12.95", 1955);
$da3->addRecord("guitar", "$13.95", 2003);
$da4->addRecord("banjo", "$100.95", 1945);
$da4->addRecord("piano", "$120.95", 1999);



$wid1->draw();
$wid2->draw();



$hab1 = new Habitacion("1 habitacion", 50);
$hab2 = new Habitacion("2 habitaciones de", 140);

class HabitacionCollection extends Collection{
    /*public function addItem(Widget $obj, $key = null){
        parent::addItem($obj, $key);

    }*/
}


$hn = new HabitacionCollection();



$hn->addItem($hab1, 'Habitacion1');
$hn->addItem($hab2, 'Habitacion2');

$p1 = new Puerta("Puerta comedor ", 3);
$p2 = new Puerta("Puerta baño ", 4);


class PuertaCollection extends Collection{

}


$puer = new PuertaCollection();

$puer->addItem($p1, 'Puerta1');
$puer->addItem($p2, 'Puerta2');


$ven1 = new Ventana("Ventana de Habitacion1 ", 4);
$ven2 = new Ventana("Ventana de habitacion2 ", 5);

class ventanaCollection extends Collection{

}

$ve = new ventanaCollection();

$ve->addItem($ven1, 'Ventana1');
$ve->addItem($ven2, 'Ventana2');

//Conseguir items

$hab3=$hn->getItem('Habitacion1');
$hab4=$hn->getItem('Habitacion2');

$puer3=$puer->getItem('Puerta1');
$puer4=$puer->getItem('Puerta2');

$ven3=$ve->getItem('Ventana1');
$ven4=$ve->getItem('Ventana2');

$hab3->add($puer3);

$hab3->getDescription();
echo "<br>";
$hab4->getDescription();
echo "<br>";
$puer3->getDescription();
echo "<br>";
$puer4->getDescription();
echo "<br>";
$ven3->getDescription();
echo "<br>";
$ven4->getDescription();
