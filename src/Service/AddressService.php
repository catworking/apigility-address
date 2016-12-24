<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/23
 * Time: 18:02:41
 */
namespace ApigilityAddress\Service;

use Zend\ServiceManager\ServiceManager;
use Zend\Hydrator\ClassMethods as ClassMethodsHydrator;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrineToolPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrinePaginatorAdapter;
use ApigilityAddress\DoctrineEntity;

class AddressService
{
    protected $classMethodsHydrator;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var RegionService
     */
    protected $regionService;

    public function __construct(ServiceManager $services)
    {
        $this->classMethodsHydrator = new ClassMethodsHydrator();
        $this->em = $services->get('Doctrine\ORM\EntityManager');
        $this->regionService = $services->get('ApigilityAddress\Service\RegionService');
    }

    /**
     * 创建一个地址
     *
     * @param $data
     * @return DoctrineEntity\Address
     */
    public function createAddress($data)
    {
        $address = new DoctrineEntity\Address();

        if (isset($data->province)) $address->setProvince($this->regionService->getRegion($data->province));
        if (isset($data->city)) $address->setCity($this->regionService->getRegion($data->city));
        if (isset($data->district)) $address->setDistrict($this->regionService->getRegion($data->district));
        if (isset($data->detail)) $address->setDetail($data->detail);

        $this->em->persist($address);
        $this->em->flush();

        return $address;
    }

    /**
     * 获取一个地址
     *
     * @param $address_id
     * @return DoctrineEntity\Address
     * @throws \Exception
     */
    public function getAddress($address_id)
    {
        $address = $this->em->find('ApigilityAddress\DoctrineEntity\Address', $address_id);
        if (empty($address)) throw new \Exception('地址不存在', 404);
        else return $address;
    }

    /**
     * 获取地址列表
     *
     * @param $params
     * @return DoctrinePaginatorAdapter
     */
    public function getAddresses($params)
    {
        $qb = new QueryBuilder($this->em);
        $qb->select('a')->from('ApigilityAddress\DoctrineEntity\Address', 'a');

        $where = '';

        if (isset($params->province_region_id)) {
            $qb->innerJoin('a.province', 'ap');
            if (!empty($where)) $where .= ' AND ';
            $where .= 'ap.id = :province_region_id';
        }

        if (isset($params->city_region_id)) {
            $qb->innerJoin('a.city', 'ac');
            if (!empty($where)) $where .= ' AND ';
            $where .= 'ac.id = :city_region_id';
        }

        if (isset($params->district_region_id)) {
            $qb->innerJoin('a.district', 'ad');
            if (!empty($where)) $where .= ' AND ';
            $where .= 'ad.id = :district_region_id';
        }

        if (!empty($where)) {
            $qb->where($where);
            if (isset($params->province_region_id)) $qb->setParameter('province_region_id', $params->province_region_id);
            if (isset($params->city_region_id)) $qb->setParameter('city_region_id', $params->city_region_id);
            if (isset($params->district_region_id)) $qb->setParameter('district_region_id', $params->district_region_id);
        }

        $doctrine_paginator = new DoctrineToolPaginator($qb->getQuery());
        return new DoctrinePaginatorAdapter($doctrine_paginator);
    }

    /**
     * 修改地址
     *
     * @param $address_id
     * @param $data
     * @return DoctrineEntity\Address
     * @throws \Exception
     */
    public function updateAddress($address_id, $data)
    {
        $address = $this->getAddress($address_id);

        if (isset($data->province)) $address->setProvince($this->regionService->getRegion($data->province));
        if (isset($data->city)) $address->setCity($this->regionService->getRegion($data->city));
        if (isset($data->district)) $address->setDistrict($this->regionService->getRegion($data->district));
        if (isset($data->detail)) $address->setDetail($data->detail);
        $this->em->flush();

        return $address;
    }

    /**
     * 删除一个地址
     *
     * @param $address_id
     * @return bool
     * @throws \Exception
     */
    public function deleteAddress($address_id)
    {
        $address = $this->getAddress($address_id);

        $this->em->remove($address);
        $this->em->flush();

        return true;
    }
}