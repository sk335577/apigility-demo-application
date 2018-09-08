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
              "character_real_name": ""
           }
       ]
   }
}',
            ],
            'POST' => [
                'request' => '{
   "character_name": "Name of the character",
   "character_real_name": ""
}',
            ],
        ],
        'entity' => [
            'PATCH' => [
                'request' => '{
   "character_name": "Name of the character",
   "character_real_name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/characters[/:character_id]"
       }
   }
   "character_name": "Name of the character",
   "character_real_name": ""
}',
            ],
            'DELETE' => [
                'request' => '{
   "character_name": "Name of the character",
   "character_real_name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/characters[/:character_id]"
       }
   }
   "character_name": "Name of the character",
   "character_real_name": ""
}',
            ],
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/characters[/:character_id]"
       }
   }
   "character_name": "Name of the character",
   "character_real_name": ""
}',
            ],
        ],
    ],
];
