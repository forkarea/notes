<?php

/**
 * @Entity
 */
class Order
{
    // ...

    /**
     * @Embedded(class="Address", columnPrefix="delivery_")
     */
    private $delivery;
}

/**
 * @Embeddable
 */
class Address
{
    /**
     * @Column(type="string")
     */
    private $street;

    /**
     * @Column(type="string")
     */
    private $postalCode;

    /**
     * @Column(type="string")
     */
    private $city;

    /**
     * @Column(type="string")
     */
    private $country;
}