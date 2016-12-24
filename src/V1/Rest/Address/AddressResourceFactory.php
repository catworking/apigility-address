<?php
namespace ApigilityAddress\V1\Rest\Address;

class AddressResourceFactory
{
    public function __invoke($services)
    {
        return new AddressResource($services);
    }
}
