<?php
namespace MvLabs\Chocosite\Model;

interface Archivio
{
// puoi anche chiamare senza identificativo
    public function recupera($id = null);
    public function salva(\StdClass $object);
}
