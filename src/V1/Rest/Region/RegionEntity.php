<?php
namespace ApigilityAddress\V1\Rest\Region;

use ApigilityAddress\DoctrineEntity\Region;
use ApigilityCatworkFoundation\Base\ApigilityEntity;

class RegionEntity extends ApigilityEntity
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * 位置代码
     *
     * @Column(type="string", length=50, nullable=false)
     */
    protected $code;

    /**
     * 名称
     *
     * @Column(type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     * 类型
     *
     * @Column(type="string", length=50, nullable=false)
     */
    protected $type;

    /**
     * @ManyToOne(targetEntity="Region", inversedBy="children")
     * @JoinColumn(name="region_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * 审核状态
     *
     * @Column(type="smallint", nullable=true)
     */
    protected $status;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    public function getParent()
    {
        if ($this->parent instanceof Region) return $this->hydrator->extract(new RegionEntity($this->parent));
        else return $this->parent;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
