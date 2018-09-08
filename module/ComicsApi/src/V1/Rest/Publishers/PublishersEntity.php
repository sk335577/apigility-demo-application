<?php

namespace ComicsApi\V1\Rest\Publishers;

class PublishersEntity {

    public $publisher_id;
    public $publisher_name;

    public function getArrayCopy() {
        return get_object_vars($this);
    }

    public function exchangeArray(array $data) {
        $this->publisher_id = !empty($data['publisher_id']) ? $data['publisher_id'] : null;
        $this->publisher_name = !empty($data['publisher_name']) ? $data['publisher_name'] : null;
    }

    public function populate($data) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

}
