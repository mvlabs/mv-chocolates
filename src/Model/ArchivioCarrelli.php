<?php
namespace MvLabs\Chocosite\Model;

class ArchivioCarrelli
{
    public function salva(Carrello $carrello)
    {
        $_SESSION['carrello'] = serialize($carrello);
    }

    public function recupera()
    {
        if (!isset($_SESSION['carrello'])) {
            return new Carrello();
        }

        $carrello = unserialize($_SESSION['carrello']);

        if ($carrello instanceof Carrello) {
            return $carrello;
        }

        return new Carrello();
    }
}
