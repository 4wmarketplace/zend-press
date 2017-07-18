<?php
return array(
    'zendpress' =>
        array(
            'api' =>
                array(
                    'uri' => 'http://local.wordpress.it/wp-json',
                ),
        ),
    'service_manager' => array(
        'invokables' => array(
            'ZendPress\Entity\Author' => 'ZendPress\Entity\Author',
            'ZendPress\Entity\Media' => 'ZendPress\Entity\Media',
            'ZendPress\Service\Hydrator' => 'ZendPress\Service\Hydrator',

        ),
        'factories' => array(
            'ZendPress\Api\EntityManager' => 'ZendPress\Factory\EntityManagerFactory',
            'ZendPress\Api\Filter' => 'ZendPress\Factory\FilterFactory',
            'ZendPress\Entity\Post' => 'ZendPress\Factory\PostFactory',
            'ZendPress\Service\Client' => 'ZendPress\Factory\ClientFactory',
            'ZendPress\Service\HttpAdapter' => 'ZendPress\Factory\HttpAdapterFactory',
            'ZendPress\Api\CollectionManager' => 'ZendPress\Factory\CollectionManagerFactory',
        ),

    )
);