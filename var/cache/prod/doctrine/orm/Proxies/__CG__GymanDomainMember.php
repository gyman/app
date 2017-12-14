<?php

namespace Proxies\__CG__\Gyman\Domain;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Member extends \Gyman\Domain\Member implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', 'id', 'email', 'details', 'sections', 'vouchers', 'currentVoucher', 'lastEntry', 'entries', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'nameSlug', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'createdAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'updatedAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'deletedAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'password', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'salt'];
        }

        return ['__isInitialized__', 'id', 'email', 'details', 'sections', 'vouchers', 'currentVoucher', 'lastEntry', 'entries', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'nameSlug', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'createdAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'updatedAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'deletedAt', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'password', '' . "\0" . 'Gyman\\Domain\\Member' . "\0" . 'salt'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Member $proxy) {
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
    public function hasOpenedEntry(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasOpenedEntry', []);

        return parent::hasOpenedEntry();
    }

    /**
     * {@inheritDoc}
     */
    public function isMale(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isMale', []);

        return parent::isMale();
    }

    /**
     * {@inheritDoc}
     */
    public function email(): \Gyman\Domain\Member\EmailAddress
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'email', []);

        return parent::email();
    }

    /**
     * {@inheritDoc}
     */
    public function details(): \Gyman\Domain\Member\Details
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'details', []);

        return parent::details();
    }

    /**
     * {@inheritDoc}
     */
    public function vouchers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'vouchers', []);

        return parent::vouchers();
    }

    /**
     * {@inheritDoc}
     */
    public function lastEntry(): ?\Gyman\Domain\Entry
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'lastEntry', []);

        return parent::lastEntry();
    }

    /**
     * {@inheritDoc}
     */
    public function entries(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'entries', []);

        return parent::entries();
    }

    /**
     * {@inheritDoc}
     */
    public function sections(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'sections', []);

        return parent::sections();
    }

    /**
     * {@inheritDoc}
     */
    public function removeEntry(\Gyman\Domain\Entry $entry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEntry', [$entry]);

        return parent::removeEntry($entry);
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
    public function addVoucher(\Gyman\Domain\Voucher $newVoucher)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addVoucher', [$newVoucher]);

        return parent::addVoucher($newVoucher);
    }

    /**
     * {@inheritDoc}
     */
    public function currentVoucher(): ?\Gyman\Domain\Voucher
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'currentVoucher', []);

        return parent::currentVoucher();
    }

    /**
     * {@inheritDoc}
     */
    public function hasCurrentVoucher(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasCurrentVoucher', []);

        return parent::hasCurrentVoucher();
    }

    /**
     * {@inheritDoc}
     */
    public function enter(\Gyman\Domain\Entry $entry)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'enter', [$entry]);

        return parent::enter($entry);
    }

    /**
     * {@inheritDoc}
     */
    public function exitLastEntry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'exitLastEntry', []);

        return parent::exitLastEntry();
    }

    /**
     * {@inheritDoc}
     */
    public function hasLastEntry(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasLastEntry', []);

        return parent::hasLastEntry();
    }

    /**
     * {@inheritDoc}
     */
    public function updateCurrentVoucher()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateCurrentVoucher', []);

        return parent::updateCurrentVoucher();
    }

    /**
     * {@inheritDoc}
     */
    public function updateDetails(\Gyman\Domain\Member\Details $details)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateDetails', [$details]);

        return parent::updateDetails($details);
    }

    /**
     * {@inheritDoc}
     */
    public function updateEmail(\Gyman\Domain\Member\EmailAddress $email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateEmail', [$email]);

        return parent::updateEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function unsetCurrentVoucher()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'unsetCurrentVoucher', []);

        return parent::unsetCurrentVoucher();
    }

    /**
     * {@inheritDoc}
     */
    public function setSections($sections)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSections', [$sections]);

        return parent::setSections($sections);
    }

    /**
     * {@inheritDoc}
     */
    public function checkIfAlreadyEntered(\Gyman\Domain\Calendar\Event\Occurrence $occurrence = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'checkIfAlreadyEntered', [$occurrence]);

        return parent::checkIfAlreadyEntered($occurrence);
    }

    /**
     * {@inheritDoc}
     */
    public function filterCreditEntries()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'filterCreditEntries', []);

        return parent::filterCreditEntries();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentVoucher(\Gyman\Domain\Voucher $voucher)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentVoucher', [$voucher]);

        return parent::setCurrentVoucher($voucher);
    }

    /**
     * {@inheritDoc}
     */
    public function password(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'password', []);

        return parent::password();
    }

    /**
     * {@inheritDoc}
     */
    public function salt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'salt', []);

        return parent::salt();
    }

}
