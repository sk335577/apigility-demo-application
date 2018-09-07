<?php

namespace ComicsApi\V1\Rest\Characters;

use ComicsApi\V1\Rest\Characters\CharactersMapper;

class CharactersResourceFactory {

    public function __invoke($services) {
        return new CharactersResource($services->get(CharactersMapper::class));
    }

}
