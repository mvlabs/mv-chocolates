<?php
namespace MvLabs\Chocosite\Model;
//la classe è costruita per determinare se il magazzino deve essere caricato o scaricato
//inoltre per evitare che il magazzino venga movimentato in modo improprio (vedi setGiacenza in db,php)
class Segno {
    private $segno;
    public function __construct($segno) {
      if ($segno == '+') {
          $this->segno = 1;
      } else if ($segno == '-') {
          $this->segno = -1;
      }
    }
    public function getSegno(){
      return $this->segno;
    }
}
