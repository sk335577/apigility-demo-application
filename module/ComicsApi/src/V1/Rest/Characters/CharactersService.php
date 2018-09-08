<?php

namespace ComicsApi\V1\Rest\Characters;

use Zend\Crypt\Password\Bcrypt;
use MediaManager\Service\MediaService;

class CharactersService {

    public $characters_mapper;
    public $media_service;

    public function __construct(CharactersMapper $characters_mapper, MediaService $media_service) {
        $this->characters_mapper = $characters_mapper;
        $this->media_service = $media_service;
    }

    public function getCharacters($columns = [], $filters = []) {
        $characters = $this->characters_mapper->fetchAll();
    }

    public function createCharacter($data) {
        $data = (array) $data;
        $prepared_data = array();

        if (isset($data['character_name'])) {
            $prepared_data['character_name'] = $data['character_name'];
        }

        if (isset($data['character_real_name'])) {
            $prepared_data['character_real_name'] = $data['character_real_name'];
        }

        if (isset($data['number_of_employees'])) {
            $prepared_data['number_of_employees'] = $data['number_of_employees'];
        }

        if (isset($data['password'])) {
            $bcrypt = new Bcrypt();
            $prepared_data['password'] = $bcrypt->create($data['password']);
        }

        if (isset($data['character_picture']) && !empty($data['character_picture'])) {
            $media = $this->media_service->create($data['character_picture']);
            if (!empty($media)) {
                $prepared_data['character_picture_media_id'] = $media['media_id'];
            }
        }

        return $this->characters_mapper->insert($prepared_data);
    }

}
