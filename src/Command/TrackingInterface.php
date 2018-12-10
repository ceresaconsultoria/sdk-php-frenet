<?php

declare(strict_types = 1);

namespace Frenet\Command;

/**
 * Class TrackingInterface
 * @package Frenet\Command
 */
interface TrackingInterface
{
    /**
     * @return mixed
     */
    public function trackingInfo(
        $shippingServiceCode = null,
        $trackingNumber = null,
        $invoiceNumber = null,
        $invoiceSerie = null,
        $recipientDocument = null,
        $orderNumber = null
    );
}
