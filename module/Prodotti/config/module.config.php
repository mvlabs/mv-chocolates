<?php

namespace Prodotti;

return array(
    'router' => array(
        'routes' => array(
            'prodotti' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/tavolette',
                    'defaults' => array(
                        'controller' => 'Prodotti\Controller\Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:codice',
                            'constraints' => array(
                                'codice' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'prodotto',
                            ),
                        ),
                    ),
                ),
            ),

            // rotte area Admin
            'zfcadmin' => array(
                'child_routes' => array(
                    'prodotti' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/prodotti',
                            'defaults' => array(
                                'controller' => 'Prodotti\Controller\Admin',
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
                            'modifica' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/modifica/:codice',
                                    'constraints' => array(
                                        'codice' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'action' => 'modifica',
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
            'Prodotti\Controller\Index' => Controller\IndexControllerFactory::class,
            'Prodotti\Controller\Admin' => Controller\AdminControllerFactory::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Prodotti\Service\ProdottiService' => Service\ProdottiServiceFactory::class,
            'Prodotti\Form\ProdottoForm' => Form\ProdottoFormFactory::class,
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
                ['controller' => 'Prodotti\Controller\Admin', 'roles' => ['admin']],

            ],
        ],
    ],

    // navigation area admin
    'navigation' => array(
        'admin' => array(
            'prodotti' => array(
                'label' => 'Prodotti',
                'route' => 'zfcadmin/prodotti',
            ),
        ),
    ),
);
