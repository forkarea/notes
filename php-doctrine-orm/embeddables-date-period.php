<?php

/**
 * @Entity
 */
class Reservation
{
    // ...

    /**
     * @Embedded(class="DatePeriod", columnPrefix="reservation_")
     */
    private $reservation;
}

/**
 * @Embeddable
 */
class DatePeriod
{
    /**
     * @Column(type="date")
     */
    private $start;

    /**
     * @Column(type="date")
     */
    private $end;
}