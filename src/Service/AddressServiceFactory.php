<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/23
 * Time: 18:02:52
 */
namespace ApigilityAddress\Service;

use Zend\ServiceManager\ServiceManager;

class AddressServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new AddressService($services);
    }
}