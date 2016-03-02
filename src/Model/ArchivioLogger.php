<?php
namespace MvLabs\Chocosite\Model;

class ArchivioLogger implements Archivio
{
    private $archivio;
    private $logger;

    public function __construct(Archivio $archivio)
    {
        $this->archivio = $archivio;
        $this->logger = new Logger();
    }

    public function salva($oggetto)
    {
        $this->archivio->salva($oggetto)
    }
// $id = null è un argomento di date_default_timezone_get
// potrebbe anche non essere null    
    public function recupera($id = null)
    {
        $this->logger->log('recuperiamo l\'id' . $id);
        return $this->archivio->recupera($id);

    }
}
