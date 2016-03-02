<?php

namespace MvLabs\Chocosite\Entity;


class Ordine {

      private $id;

      private $clienteId;

      private $data;

      private $totale;

      private $stato;

      private $note;

      private $numProdotti;

      public function id(){
        return $this->id;
      }

      public function clienteId() {
        return $this->clienteId;
      }

      public function data() {
        return $this->data;
      }

      public function totale() {
        return $this->totale;
      }

      public function stato() {
        return $this->stato;
      }

      public function note() {
        return $this->note;
      }

      public function numProdotti() {
        return $this->numProdotti;
      }

      public function __set($name, $value)
      {
          if ($name === 'cliente_id') {
              $this->clienteId = $value;
          }
          else if ($name === 'num_prodotti') {
              $this->numProdotti = $value;
          }
      }

}
