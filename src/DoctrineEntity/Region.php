<?php
/**
 * Created by PhpStorm.
 * User: figo-007
 * Date: 2016/12/23
 * Time: 17:22:50
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
 * Class Region
 * @package ApigilityLogic\ApigilityAddress\DoctrineEntity
 * @Entity @Table(name="apigilityaddress_region")
 */
class Region
{
    const TYPE_PROVINCE = 'province';
    const TYPE_CITY = 'city';
    const TYPE_DISTRICT = 'district';

    const STATUS_NONE = 1;     // 未审核
    const STATUS_ENABLE = 2;   // 允许
    const STATUS_DISABLE = 3;  // 禁止

    /**
     * @Id @Column(type="integer")
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
     * @OneToMany(targetEntity="Region", mappedBy="parent")
     */
    protected $children;

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


    public function __construct() {
        $this->children = new ArrayCollection();
        $this->addresses = new ArrayCollection();
    }

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

    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return Region
     */
    public function getParent()
    {
        return $this->parent;
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
