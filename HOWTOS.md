# HOW TO'S

## Creazione nuovo progetto

Quando si intende avviare i lavori su un nuovo progetto &egrave; necessario predisporre adeguatamente la propria macchina di sviluppo:

- cartella in cui verranno posizionati tutti i file: &egrave; necessario identificare nella propria macchina di lavoro (probabilmente una macchina virtuale) la posizione in cui verranno posizionati i file del progetto. Supponiamo di chiamare `C` questa cartella.

- da dove si parte? Se si tratta di un progetto in Zend Framework 2 (o in qualsiasi altro framework) &egrave; consigliabile partire da una [skeleton app](https://github.com/zendframework/ZendSkeletonApplication). In tal caso &egrave; sufficiente clonare questa skeleton app all'interno di `C`. Trattandosi di un repo git, facendo il `clone` ci porteremo dietro tutto il lavoro svolto dagli sviluppatori che l'hanno creata. Per questo motivo &egrave; consigliabile rimuovere la cartella `.git` che si trova al suo interno, cos&igrave; abbiamo un ambiente di lavoro vergine su cui possiamo iniziare a lavorare.

- se usiamo delle dipendenze esterne caricate via `composer` &egrave; necessario, se non gi&agrave; presente, scaricare `composer` (vedere le istruzioni a [https://getcomposer.org/download/](https://getcomposer.org/download/)) e andare a scaricarle le dipendenze eseguendo `php composer.phar install`.

- repository git: tutto il nostro codice deve essere gestito con un tool di gestione del codice sorgente, ad es. git. Inizializziamo quindi un nuovo repo git (eseguendo `git init`), aggiungiamo tutti i file (`git add .`) e creiamo il primo commit (`git commit`). E' conveniente caricare il proprio lavoro su un repo git remoto (ad es. su [github](https://github.com/)). Per fare questo creiamo l&igrave; un nuovo repo e, tornando sulla cartella del nostro progetto, aggiungiamo i relativi riferimenti (`git remote add origin [indirizzo repo su github]`). Fatto questo &egrave; necessario eseguire un push (`git push origin master`) per caricare tutto il codice sul repo remoto.

- configurazione del Web Server: &egrave; necessario configurare il Web Server in modo che sia in grado di servire le pagine che abbiamo creato. Per fare questo &egrave; sufficiente creare un nuovo virtual host che contenga i riferimenti (path, nome a dominio) del sito che abbiamo creato. Nel caso usassimo un framework &egrave; necessario inserire alcune direttive di configurazione specifiche (es. per gestire il `rewrite` degli url). Conviene in questo caso prendere spunto da uno esistente o affidarsi alla documentazione del framwork. Ricordarsi di riavviare il Web Server una volta completata la confiurazione.

- raggiungere il sito presente all'interno della macchina di sviluppo: in fase di sviluppo &egrave; conveniente nominare il sito con un nome a dominio specifico, es. `www.dev.miosito.it`. Questo nome &egrave; ovviamente inesistente, ma possiamo renderlo comunque funzionante dalla nostra macchina di sviluppo andando ad aggiungere nel relativo file hosts (`/etc/hosts`) una nuova riga, facendo puntare l'indirizzo alla macchina stessa (`127.0.0.1`)

## Gestione di un nuovo URI in Zend Framework 2

Per gestire un nuovo URI eseguire i passi seguenti:

- posizionarsi nel modulo che ha senso contenga il codice della nuova pagina.

- aggiungere una nuova rotta (file `/config/module.config.php`).

- la rotta fa riferimento ad un nuovo controller? Creare il nuovo controller (in `/src/[nome_modulo]/Controller`) e registrarlo sul `Service Manager` aggiungendo una nuova riga nella sezione `controller_config` (sempre in `/config/module.config.php`). Aggiungere nel controller la action corrispondente alla nuova rotta.

- la rotta fa riferimento ad un controller esistente? Richiamarlo nella definizione della rotta e aggiungere all'interno del controller stesso la action corrispondente alla nuova rotta.

- aggiungere il file `.phtml` relativo alla vista. Ricordo che, a meno che non sia diversamente specificato, il path in cui si trovano le action corrisponde al namespace (tutto minuscolo) del relativo controller.

## Configurazione di Doctrine e creazione di un'entit&agrave;

Per integrare `Doctrine` nella nostra applicazione Zend Framework 2 procediamo in questo modo:

- aggiungiamo al nostro progetto il modulo `DoctrineOrmModule` via composer eseguendo `php composer.phar require doctrine/doctrine-orm-module`.

- includiamo i moduli di Doctrine nel nostro progetto; in `config/application.config.php` aggiungiamo, in quest'ordine `DoctrineModule` e `DoctrineORMModule`.

- creiamo la cartella `/data/DoctrineORMModule/Proxy` e assicuriamoci che l'applicazione abbia diritti di scrittura.

- in un file di configurazione `config/autoload/doctrine.local.php` configuriamo doctrine perch&egrave; si connetta al database che stiamo utilizzando

```php
<?php

return [
    'doctrine' => [
        'connection' => [
            // default connection name
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver', // o quello relativo al database che state utilizzando
                'params' => [
                    'host'     => '', // probabilmente localhost
                    'port'     => '', // per MySql il default &egrave; 3306
                    'user'     => '',
                    'password' => '',
                    'dbname'   => '',
                ]
            ]
        ]
    ]
];
```

- Aggiungere la seguente configurazione nel `module.config.php` di ogni modulo in cui siano presenti entit&agrave;

```php
'doctrine' => [
    'driver' => [
        __NAMESPACE__ . '_driver' => [
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => [
                __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
            ]
        ],
        'orm_default' => [
            'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
            'drivers' => [
                __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
            ]
        ],
    ]
]
```

- Adesso possiamo creare le nostre entit&agrave;, all'interno della cartella `src/[nome modulo]/Entity`. Per ogni entit&agrave; ricordiamoci di aggiungere `use Doctrine\ORM\Mapping as ORM` subito dopo il namespace, e, prima dell'inizio della classe, un docblock del tipo

```php
/**
 * @ORM\Table(name="nome_della_tabella_a_database")
 * @ORM\Entity
 */
```

e, per ogni propriet&agrave; dell'entit&agrave; che corrisponder&agrave; ad una colonna in database, un'annotazione del tipo

```php
@ORM\Column(name="nome_della_colonna_a_database", type="string/integer/boolean/...", nullable=true/false)
```

ed eventuali altre annotazioni se la colonna &egrave; una chiave primaria o una chiave esterna per il database.

- volendo, &egrave; possibile chiedere a Doctrine di aggiornare il database rispetto alle nostre dichiarazioni nelle entit&agrave; lanciando il comando `php vendor/bin/doctrine-module orm:schema-tool:update`
