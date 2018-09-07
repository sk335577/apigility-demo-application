<?php
return [
    'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/characters"
       },
       "first": {
           "href": "/characters?page={page}"
       },
       "prev": {
           "href": "/characters?page={page}"
       },
       "next": {
           "href": "/characters?page={page}"
       },
       "last": {
           "href": "/characters?page={page}"
       }
   }
   "_embedded": {
       "characters": [
           {
               "_links": {
                   "self": {
                       "href": "/characters[/:character_id]"
                   }
               }
              "character_name": "Name of the character",
              "real_name": "Real name of the character"
           }
       ]
   }
}',
            ],
            'POST' => [
                'request' => '{
   "character_name": "Name of the character",
   "real_name": "Real name of the character"
}',
            ],
        ],
    ],
];
