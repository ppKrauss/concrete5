<?php

namespace Concrete\Core\Entity\Attribute\Key\Type;

use Concrete\Core\Entity\Attribute\Value\Value\BooleanValue;


/**
 * @Entity
 * @Table(name="BooleanAttributeKeyTypes")
 */
class BooleanType extends Type
{

    /**
     * @Column(type="boolean")
     */
    protected $isCheckedByDefault = false;

    /**
     * @return mixed
     */
    public function isCheckedByDefault()
    {
        return $this->isCheckedByDefault;
    }

    /**
     * @param mixed $isCheckedByDefault
     */
    public function setIsCheckedByDefault($isCheckedByDefault)
    {
        $this->isCheckedByDefault = $isCheckedByDefault;
    }

    public function getAttributeValue()
    {
        return new BooleanValue();
    }

    public function createController()
    {
        $controller = new \Concrete\Attribute\Boolean\Controller($this->getAttributeType());
        return $controller;
    }

}