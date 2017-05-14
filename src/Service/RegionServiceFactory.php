<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/23
 * Time: 18:02:16
 */
namespace ApigilityAddress\Service;

use Zend\ServiceManager\ServiceManager;

class RegionServiceFactory
{
    public function __invoke(ServiceManager $services)
    {
        return new RegionService($services);
    }
}