<?php

namespace Proxies\__CG__\Gyman\Domain;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Entry extends \Gyman\Domain\Entry implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', 'id', 'member', 'startDate', 'endDate', 'price', 'type', 'voucher', 'occurrence', 'createdAt', 'updatedAt', 'deletedAt'];
        }

        return ['__isInitialized__', 'id', 'member', 'startDate', 'endDate', 'price', 'type', 'voucher', 'occurrence', 'createdAt', 'updatedAt', 'deletedAt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Entry $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function startDate(): \DateTime
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'startDate', []);

        return parent::startDate();
    }

    /**
     * {@inheritDoc}
     */
    public function endDate(): ?\DateTime
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'endDate', []);

        return parent::endDate();
    }

    /**
     * {@inheritDoc}
     */
    public function price(): ?\Gyman\Domain\Entry\Price
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'price', []);

        return parent::price();
    }

    /**
     * {@inheritDoc}
     */
    public function type(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'type', []);

        return parent::type();
    }

    /**
     * {@inheritDoc}
     */
    public function closeEntry(\DateTime $date): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'closeEntry', [$date]);

        parent::closeEntry($date);
    }

    /**
     * {@inheritDoc}
     */
    public function isOpened(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isOpened', []);

        return parent::isOpened();
    }

    /**
     * {@inheritDoc}
     */
    public function isType($type): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isType', [$type]);

        return parent::isType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function assignToVoucher(\Gyman\Domain\Voucher $voucher): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'assignToVoucher', [$voucher]);

        parent::assignToVoucher($voucher);
    }

    /**
     * {@inheritDoc}
     */
    public function payOffWithVoucher(\Gyman\Domain\Voucher $voucher): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'payOffWithVoucher', [$voucher]);

        parent::payOffWithVoucher($voucher);
    }

    /**
     * {@inheritDoc}
     */
    public function voucher(): ?\Gyman\Domain\Voucher
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'voucher', []);

        return parent::voucher();
    }

    /**
     * {@inheritDoc}
     */
    public function member(): \Gyman\Domain\Member
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'member', []);

        return parent::member();
    }

    /**
     * {@inheritDoc}
     */
    public function id(): \Ramsey\Uuid\UuidInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'id', []);

        return parent::id();
    }

    /**
     * {@inheritDoc}
     */
    public function assignToMember(\Gyman\Domain\Member $member): void
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'assignToMember', [$member]);

        parent::assignToMember($member);
    }

    /**
     * {@inheritDoc}
     */
    public function occurrence(): \Gyman\Domain\Calendar\Event\Occurrence
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'occurrence', []);

        return parent::occurrence();
    }

}
