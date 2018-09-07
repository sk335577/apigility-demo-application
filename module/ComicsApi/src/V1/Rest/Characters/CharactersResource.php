<?php

namespace ComicsApi\V1\Rest\Characters;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use ComicsApi\V1\Rest\Characters\CharactersMapper;

class CharactersResource extends AbstractResourceListener {

    public $mapper;

    public function __construct(CharactersMapper $mapper) {
        $this->mapper = $mapper;
    }

    public function create($data) {
        return $this->mapper->insert($data);
    }

    public function delete($id) {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    public function deleteList($data) {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    public function fetch($id) {
        return $this->mapper->fetchOne($id);
    }

    public function fetchAll($params = []) {
        return $this->mapper->fetchAll();
    }

    public function patch($id, $data) {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    public function patchList($data) {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    public function replaceList($data) {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    public function update($id, $data) {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }

}
