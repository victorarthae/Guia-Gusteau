<?php
namespace ggapi\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {
    	$mapper = $services->get('ggapi\V1\Rest\User\UserMapper');
        return new UserResource($mapper);
    }
}
