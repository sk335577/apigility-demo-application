<?php

namespace ComicsApi\V1\Rest\Characters;

class CharactersService {

    public $characters_mapper;

    public function __construct(CharactersMapper $characters_mapper) {
        $this->characters_mapper = $characters_mapper;
    }

    public function getCharacters($columns = [], $filters = []) {
        $characters = $this->characters_mapper->fetchAll();
    }

}
