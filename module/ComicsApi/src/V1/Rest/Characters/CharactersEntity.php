<?php

namespace ComicsApi\V1\Rest\Characters;

class CharactersEntity {

    public $id;
    public $character_name;
    public $real_name;
    public $publisher;

    public function getArrayCopy() {
        return get_object_vars($this);
    }

    public function exchangeArray(array $data) {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->character_name = !empty($data['character_name']) ? $data['character_name'] : null;
        $this->real_name = !empty($data['real_name']) ? $data['real_name'] : null;
    }

    public function populate($data) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

}
