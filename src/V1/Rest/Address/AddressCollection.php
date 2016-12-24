<?php
namespace ApigilityAddress\V1\Rest\Address;

use ApigilityCatworkFoundation\Base\ApigilityCollection;

class AddressCollection extends ApigilityCollection
{
    protected $itemType = AddressEntity::class;
}
