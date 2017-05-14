<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/11/21
 * Time: 11:20
 */
namespace ApigilityLogic\ApigilityAddress\DoctrineEntity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Address
 * @package ApigilityLogic\Address\DoctrineEntity
 * @Entity @Table(name="apigilityaddress_address")
 */
class Address
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * 省
     *
     * @ManyToOne(targetEntity="Region")
     * @JoinColumn(name="province_region_id", referencedColumnName="id")
     */
    protected $province;

    /**
     * 市
     *
     * @ManyToOne(targetEntity="Region")
     * @JoinColumn(name="city_region_id", referencedColumnName="id")
     */
    protected $city;

    /**
     * 区
     *
     * @ManyToOne(targetEntity="Region")
     * @JoinColumn(name="district_region_id", referencedColumnName="id")
     */
    protected $district;

    /**
     * 详细地址
     *
     * @Column(type="string", length=800, nullable=true)
     */
    protected $detail;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return Region
     */
    public function getProvince()
    {
        return $this->province;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return Region
     */
    public function getCity()
    {
        return $this->city;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
        return $this;
    }

    /**
     * @return Region
     */
    public function getDistrict()
    {
        return $this->district;
    }

    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }

    public function getDetail()
    {
        return $this->detail;
    }
}
