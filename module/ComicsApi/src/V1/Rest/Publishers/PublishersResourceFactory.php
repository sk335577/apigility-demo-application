<?php

namespace ComicsApi\V1\Rest\Publishers;

class PublishersResourceFactory {

    public function __invoke($services) {
        return new PublishersResource();
    }

}
