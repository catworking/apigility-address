<?php
return [
    'service_manager' => [
        'factories' => [
            \ApigilityAddress\V1\Rest\Region\RegionResource::class => \ApigilityAddress\V1\Rest\Region\RegionResourceFactory::class,
            \ApigilityAddress\V1\Rest\Address\AddressResource::class => \ApigilityAddress\V1\Rest\Address\AddressResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'apigility-address.rest.region' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/address/region[/:region_id]',
                    'defaults' => [
                        'controller' => 'ApigilityAddress\\V1\\Rest\\Region\\Controller',
                    ],
                ],
            ],
            'apigility-address.rest.address' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/address/address[/:address_id]',
                    'defaults' => [
                        'controller' => 'ApigilityAddress\\V1\\Rest\\Address\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'apigility-address.rest.region',
            1 => 'apigility-address.rest.address',
        ],
    ],
    'zf-rest' => [
        'ApigilityAddress\\V1\\Rest\\Region\\Controller' => [
            'listener' => \ApigilityAddress\V1\Rest\Region\RegionResource::class,
            'route_name' => 'apigility-address.rest.region',
            'route_identifier_name' => 'region_id',
            'collection_name' => 'region',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'type',
                1 => 'region_id',
            ],
            'page_size' => '100',
            'page_size_param' => null,
            'entity_class' => \ApigilityAddress\V1\Rest\Region\RegionEntity::class,
            'collection_class' => \ApigilityAddress\V1\Rest\Region\RegionCollection::class,
            'service_name' => 'Region',
        ],
        'ApigilityAddress\\V1\\Rest\\Address\\Controller' => [
            'listener' => \ApigilityAddress\V1\Rest\Address\AddressResource::class,
            'route_name' => 'apigility-address.rest.address',
            'route_identifier_name' => 'address_id',
            'collection_name' => 'address',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'province_region_id',
                1 => 'city_region_id',
                2 => 'district_region_id',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApigilityAddress\V1\Rest\Address\AddressEntity::class,
            'collection_class' => \ApigilityAddress\V1\Rest\Address\AddressCollection::class,
            'service_name' => 'Address',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApigilityAddress\\V1\\Rest\\Region\\Controller' => 'HalJson',
            'ApigilityAddress\\V1\\Rest\\Address\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'ApigilityAddress\\V1\\Rest\\Region\\Controller' => [
                0 => 'application/vnd.apigility-address.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApigilityAddress\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.apigility-address.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'ApigilityAddress\\V1\\Rest\\Region\\Controller' => [
                0 => 'application/vnd.apigility-address.v1+json',
                1 => 'application/json',
            ],
            'ApigilityAddress\\V1\\Rest\\Address\\Controller' => [
                0 => 'application/vnd.apigility-address.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ApigilityAddress\V1\Rest\Region\RegionEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-address.rest.region',
                'route_identifier_name' => 'region_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \ApigilityAddress\V1\Rest\Region\RegionCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-address.rest.region',
                'route_identifier_name' => 'region_id',
                'is_collection' => true,
            ],
            \ApigilityAddress\V1\Rest\Address\AddressEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-address.rest.address',
                'route_identifier_name' => 'address_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \ApigilityAddress\V1\Rest\Address\AddressCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'apigility-address.rest.address',
                'route_identifier_name' => 'address_id',
                'is_collection' => true,
            ],
        ],
    ],
];
