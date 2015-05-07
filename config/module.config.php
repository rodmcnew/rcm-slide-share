<?php

/**
 * ZF2 Plugin Config file
 *
 * This file contains all the configuration for the Module as defined by ZF2.
 * See the docs for ZF2 for more information.
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @author    Westin Shafer <wshafer@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 */

return [

    'rcmPlugin' => [
        'RcmSlideShare' => [
            'type' => 'Social Media',
            'display' => 'Slide Share',
            'tooltip' => 'Slide Share',
            'icon' => '',
            'defaultInstanceConfig' => include
                    __DIR__ . '/defaultInstanceConfig.php',
            'canCache' => true
        ],
    ],
    'router' => [
        'routes' => [
            '/rcm-slide-share/api/slide-shows' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route' => '/rcm-slide-share/api/slide-shows',
                    'defaults' => [
                        'controller' => 'Reliv\RcmSlideShare\ApiController',
                        'action' => 'index'
                    ],
                ],
            ],
        ]
    ],
    'controllers' => [
        'config_factories' => [
            'Reliv\RcmSlideShare\ApiController' => [
                'arguments' => [
                    'RcmSlideShare\SlideShareApi'
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'RcmSlideShare\SlideShareApi' => 'Reliv\RcmSlideShare\SlideShareApiFactory'
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'asset_manager' => [
        'resolver_configs' => [
            'aliases' => [
                'modules/rcm-call-to-action-box/' => __DIR__ . '/../public/',
            ],
            'collections' => [
                // required for admin edit //
                'modules/rcm-admin/js/rcm-admin.js' => [
                    'modules/rcm-call-to-action-box/call-to-action-box-edit.js',
                ],
            ],
        ],
    ],
];