<?php

namespace ComicsApi\V1\Rest\Characters;

class CharactersEntity {

    public $character_id;
    public $character_name;
    public $real_name;
    public $publisher = [];

    public function getArrayCopy() {
        return get_object_vars($this);
    }

    public function exchangeArray(array $data) {
        $this->character_id = !empty($data['character_id']) ? $data['character_id'] : null;
        $this->character_name = !empty($data['character_name']) ? $data['character_name'] : null;
        $this->character_real_name = !empty($data['character_real_name']) ? $data['character_real_name'] : null;
        $this->publisher['publisher_id'] = !empty($data['character_publisher_id']) ? $data['character_publisher_id'] : null;
        $this->publisher['publisher_name'] = !empty($data['publisher_name']) ? $data['publisher_name'] : null;
    }

    public function populate($data) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

}
