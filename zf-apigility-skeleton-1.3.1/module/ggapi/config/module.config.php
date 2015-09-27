<?php
return array(
    'controllers' => array(
        'factories' => array(
            'ggapi\\V1\\Rpc\\Ping\\Controller' => 'ggapi\\V1\\Rpc\\Ping\\PingControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'ggapi.rpc.ping' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ping',
                    'defaults' => array(
                        'controller' => 'ggapi\\V1\\Rpc\\Ping\\Controller',
                        'action' => 'ping',
                    ),
                ),
            ),
            'ggapi.rest.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/user[/:user_id]',
                    'defaults' => array(
                        'controller' => 'ggapi\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'ggapi.rest.profile' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/profile[/:profile_id]',
                    'defaults' => array(
                        'controller' => 'ggapi\\V1\\Rest\\Profile\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'ggapi.rpc.ping',
            1 => 'ggapi.rest.user',
            2 => 'ggapi.rest.profile',
        ),
    ),
    'zf-rpc' => array(
        'ggapi\\V1\\Rpc\\Ping\\Controller' => array(
            'service_name' => 'Ping',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'ggapi.rpc.ping',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'ggapi\\V1\\Rpc\\Ping\\Controller' => 'Json',
            'ggapi\\V1\\Rest\\User\\Controller' => 'HalJson',
            'ggapi\\V1\\Rest\\Profile\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'ggapi\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'ggapi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'ggapi\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'ggapi\\V1\\Rpc\\Ping\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/json',
            ),
            'ggapi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/json',
            ),
            'ggapi\\V1\\Rest\\Profile\\Controller' => array(
                0 => 'application/vnd.ggapi.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'ggapi\\V1\\Rpc\\Ping\\Controller' => array(
            'input_filter' => 'ggapi\\V1\\Rpc\\Ping\\Validator',
        ),
        'ggapi\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'ggapi\\V1\\Rest\\User\\Validator',
        ),
        'ggapi\\V1\\Rest\\Profile\\Controller' => array(
            'input_filter' => 'ggapi\\V1\\Rest\\Profile\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'ggapi\\V1\\Rpc\\Ping\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'ack',
                'description' => 'Acknowledge the request with a timestamp',
            ),
        ),
        'ggapi\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'username',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'password',
            ),
        ),
        'ggapi\\V1\\Rest\\Profile\\Validator' => array(
            0 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'birthday',
            ),
            1 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'photo',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'gender',
            ),
            3 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'email',
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'ggapi\\V1\\Rest\\User\\UserResource' => 'ggapi\\V1\\Rest\\User\\UserResourceFactory',
            'ggapi\\V1\\Rest\\Profile\\ProfileResource' => 'ggapi\\V1\\Rest\\Profile\\ProfileResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'ggapi\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'ggapi\\V1\\Rest\\User\\UserResource',
            'route_name' => 'ggapi.rest.user',
            'route_identifier_name' => 'user_id',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'ggapi\\V1\\Rest\\User\\UserEntity',
            'collection_class' => 'ggapi\\V1\\Rest\\User\\UserCollection',
            'service_name' => 'User',
        ),
        'ggapi\\V1\\Rest\\Profile\\Controller' => array(
            'listener' => 'ggapi\\V1\\Rest\\Profile\\ProfileResource',
            'route_name' => 'ggapi.rest.profile',
            'route_identifier_name' => 'profile_id',
            'collection_name' => 'profile',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PUT',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'ggapi\\V1\\Rest\\Profile\\ProfileEntity',
            'collection_class' => 'ggapi\\V1\\Rest\\Profile\\ProfileCollection',
            'service_name' => 'Profile',
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'ggapi\\V1\\Rest\\User\\UserEntity' => array(
                'entity_identifier_name' => 'id_user',
                'route_name' => 'ggapi.rest.user',
                'route_identifier_name' => 'user_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'ggapi\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id_user',
                'route_name' => 'ggapi.rest.user',
                'route_identifier_name' => 'user_id',
                'is_collection' => true,
            ),
            'ggapi\\V1\\Rest\\Profile\\ProfileEntity' => array(
                'entity_identifier_name' => 'id_user',
                'route_name' => 'ggapi.rest.profile',
                'route_identifier_name' => 'profile_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'ggapi\\V1\\Rest\\Profile\\ProfileCollection' => array(
                'entity_identifier_name' => 'id_user',
                'route_name' => 'ggapi.rest.profile',
                'route_identifier_name' => 'profile_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'ggapi\\V1\\Rest\\User\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
