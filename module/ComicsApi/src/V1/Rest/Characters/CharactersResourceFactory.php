<?php

namespace ComicsApi\V1\Rest\Characters;

use ComicsApi\V1\Rest\Characters\CharactersMapper;
use ComicsApi\V1\Rest\Characters\CharactersService;

class CharactersResourceFactory {

    public function __invoke($services) {
        return new CharactersResource($services->get(CharactersMapper::class), $services->get(CharactersService::class));
    }

}
