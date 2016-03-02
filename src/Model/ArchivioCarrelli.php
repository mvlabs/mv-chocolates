<?php
namespace MvLabs\Chocosite\Model;
// questa classe ha la possibilità di salvare un carrello
// e recupera un carrello da un archivio
// non è una struttura dati perchè non ha proprietà (fields)
// è una classe concreta!
// ha anche l'implementazione dei metodi per l'archiviazione e il recupero di un
// carrello
// senza usare il metodo serialize quando si mettevano degli oggetti custom
// in sessione a php non piace.
// qualcunque oggetto può essere convertito in testo e quindi messo in sessione
// sarà poi possibile fare il percorso inverso con il metodo unserialize()
// questa non è una scappatoia. Si può benissimo fare così.
// il formato è leggibile e c'è tutto quello che serve per ricostruire
// l'oggetto.
// ArchivioCarelli non archivia solamente ma è anche in grado di generare
// ovvero ritornare un'istanza della classe Carrello

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

// così mi assicuro che l'oggetto in sessione sia un'istanza della classe
// Carrello
        if ($carrello instanceof Carrello) {
            return $carrello;
        }
// se l'oggetto in sessione non è un'istanza della classe Carrello restituisco
// un nuovo carrello vuoto        
        return new Carrello();
    }
}
