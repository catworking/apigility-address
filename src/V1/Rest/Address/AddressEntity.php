<?php
namespace ApigilityLogic\Address\V1\Rest\Address;

use ApigilityLogic\Address\DoctrineEntity\Region;
use ApigilityLogic\Address\V1\Rest\Region\RegionEntity;
use ApigilityLogic\Foundation\Base\ApigilityEntity;

class AddressEntity extends ApigilityEntity
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

    public function getProvince()
    {
        if ($this->province instanceof Region) return $this->hydrator->extract(new RegionEntity($this->province));
        else return $this->province;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCity()
    {
        if ($this->city instanceof Region) return $this->hydrator->extract(new RegionEntity($this->city));
        else return $this->city;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
        return $this;
    }

    public function getDistrict()
    {
        if ($this->district instanceof Region) return $this->hydrator->extract(new RegionEntity($this->district));
        else return $this->district;
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
