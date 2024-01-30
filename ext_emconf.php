<?php
defined('TYPO3') or die();

$EM_CONF[$_EXTKEY] = [
    'title'          => 'CHF Object',
    'description'    => 'Create and manage location- and time-based research data in TYPO3',
    'category'       => 'misc',
    'author'         => 'Jonatan Jalle Steller',
    'author_email'   => 'jonatan.steller@adwmainz.de',
    'author_company' => 'Academy of Sciences and Literature Mainz',
    'state'          => 'beta',
    'version'        => '0.6.0',
    'constraints'    => [
        'depends'   => [
            'typo3' => '12.0.0-12.99.99'
        ],
        'conflicts' => [
        ],
        'suggests'  => [
        ],
    ],
    'autoload'       => [
        'psr-4' => [
           'Digicademy\\CHFObject\\' => 'Classes/'
        ]
     ]
];
