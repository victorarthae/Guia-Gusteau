<?php
return array(
    'ggapi\\V1\\Rpc\\Ping\\Controller' => array(
        'description' => 'Ping the API',
        'GET' => array(
            'response' => '{
   "ack": "Acknowledge the request with a timestamp"
}',
            'description' => 'Ping the APi for acknowledge',
        ),
    ),
    'ggapi\\V1\\Rest\\User\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/user"
       },
       "first": {
           "href": "/user?page={page}"
       },
       "prev": {
           "href": "/user?page={page}"
       },
       "next": {
           "href": "/user?page={page}"
       },
       "last": {
           "href": "/user?page={page}"
       }
   }
   "_embedded": {
       "user": [
           {
               "_links": {
                   "self": {
                       "href": "/user[/:user_id]"
                   }
               }
              "username": "",
              "password": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'request' => '{
   "username": "",
   "password": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/user[/:user_id]"
       }
   }
   "username": "",
   "password": ""
}',
            ),
        ),
    ),
    'ggapi\\V1\\Rest\\Profile\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/profile"
       },
       "first": {
           "href": "/profile?page={page}"
       },
       "prev": {
           "href": "/profile?page={page}"
       },
       "next": {
           "href": "/profile?page={page}"
       },
       "last": {
           "href": "/profile?page={page}"
       }
   }
   "_embedded": {
       "profile": [
           {
               "_links": {
                   "self": {
                       "href": "/profile[/:profile_id]"
                   }
               }
              "birthday": "",
              "photo": "",
              "gender": "",
              "email": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'request' => '{
   "birthday": "",
   "photo": "",
   "gender": "",
   "email": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/profile[/:profile_id]"
       }
   }
   "birthday": "",
   "photo": "",
   "gender": "",
   "email": ""
}',
            ),
        ),
    ),
);
