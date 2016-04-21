<?php

namespace Anagrafica;

return array(
    'router' => array(
        'routes' => array(

            // rotte area Admin
            'zfcadmin' => array(
                'child_routes' => array(
                    'Anagrafica' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/anagrafica',
                            'defaults' => array(
                                'controller' => 'Anagrafica\Controller\Admin',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'nuovo' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/nuovo',
                                    'defaults' => array(
                                        'action' => 'nuovo',
                                    ),
                                ),
                            ),
                            'elimina' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/elimina/:codice',
                                    'constraints' => array(
                                        'codice' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'action' => 'elimina',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),

        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Anagrafica\Controller\Index' => Controller\IndexControllerFactory::class,
            'Anagrafica\Controller\Admin' => Controller\AdminControllerFactory::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Anagrafica\Service\AnagraficaService' => Service\AnagraficaServiceFactory::class,
            'Anagrafica\Form\AnagraficaForm' => Form\AnagraficaFormFactory::class,
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity']
            ],
            'orm_default'             => [
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ],
        ],
    ],

    // ACL
    'bjyauthorize' => [
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [

                // Pagine fornite dal controller Index: accesso consentito a tutti
                ['controller' => 'Anagrafica\Controller\Admin', 'roles' => ['admin']],

            ],
        ],
    ],

    // navigation area admin
    'navigation' => array(
        'admin' => array(
            'Anagrafica' => array(
                'label' => 'Anagrafica',
                'route' => 'zfcadmin/Anagrafica',
            ),
        ),
    ),
);
