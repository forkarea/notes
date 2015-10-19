<?php

/**
 * @Entity
 */
class Product
{
    // ...

    /**
     * @Embedded(class="Money", columnPrefix="price_")
     */
    private $price;
}

/**
 * @Embeddable
 */
class Money
{
    /**
     * @Column(type="decimal")
     */
    private $value;

    /**
     * @Column(type="string")
     */
    private $currency;
}