<?php

namespace MediaManager\Model;

use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Media {

    public $media_id;
    public $media_title;
    public $media_path;

    public function exchangeArray(array $data) {
        $this->media_id = !empty($data['media_id']) ? $data['media_id'] : null;
        $this->media_title = !empty($data['media_title']) ? $data['media_title'] : null;
        $this->media_path = !empty($data['media_path']) ? $data['media_path'] : null;
    }

    public function getArrayCopy() {
        return [
            'media_id' => $this->media_id,
            'media_title' => $this->media_title,
            'media_path' => $this->media_path,
        ];
    }

}
