<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'tx-conpassione-stafflist' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cpstafflist.svg',
    ],

    'tx-conpassione-staff' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cpstaff.svg',
    ],

    'tx-conpassione-cp-event' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-event.svg',
    ],

    'tx-conpassione-cp-1col' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-1col.svg',
    ],

    'tx-conpassione-cp-2cols5050' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-2cols5050.svg',
    ],

    'tx-conpassione-cp-2cols3366' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-2cols3366.svg',
    ],

    'tx-conpassione-cp-2cols6633' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-2cols6633.svg',
    ],

    'tx-conpassione-cp-3cols' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/cp-3cols.svg',
    ],

    //  Im BackendLayout wird das Icon direkt vom File geladen, damit das Icon grösser dargestellt werden kann
    'tx-conpassione-backendlayout' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/backendlayout.svg',
    ],

    'tx-conpassione-content-beside-text-img-left' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-left.svg',
    ],
    'tx-conpassione-content-beside-text-img-left-middle' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-left-middle.svg',
    ],
    'tx-conpassione-content-beside-text-img-left-bottom' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-left-bottom.svg',
    ],
    'tx-conpassione-content-beside-text-img-right' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-right.svg',
    ],
    'tx-conpassione-content-beside-text-img-right-middle' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-right-middle.svg',
    ],
    'tx-conpassione-content-beside-text-img-right-bottom' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:kuhdist/Resources/Public/Icons/content-beside-text-img-right-bottom.svg',
    ],

    /*    'tx-myext-bitmapicon' => [
            'provider' => BitmapIconProvider::class,
            'source' => 'EXT:my_extension/Resources/Public/Icons/mybitmap.png',
            // All icon providers provide the possibility to register an icon that spins
            'spinning' => true,
        ],*/

];
