<?php
namespace ggapi\V1\Rest\Profile;

class ProfileResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('ggapi\V1\Rest\Profile\ProfileMapper');
        return new ProfileResource($mapper);

    }
}
