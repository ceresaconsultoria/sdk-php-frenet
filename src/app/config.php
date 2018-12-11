<?php

declare(strict_types = 1);

use function \DI\autowire;
use Frenet\ObjectType\Entity;
use Frenet\Framework;
use Frenet\Service;
use Frenet\Command;

return [
    /** Api Object */
    \Frenet\ApiInterface::class => autowire(\Frenet\Api::class),
    
    /** Entity Objects */
    Entity\AddressInterface::class => autowire(Entity\Address::class),

    /** Commands */
    Command\TrackingInterface::class => autowire(Command\Tracking::class),
    Command\ShippingInterface::class => autowire(Command\Shipping::class),
    Command\PostcodeInterface::class => autowire(Command\Postcode::class),

    /** Command Methods */
    Command\Postcode\AddressInterface::class => autowire(Command\Postcode\Address::class),

    /** Service Objects */
    Service\ConnectionInterface::class => autowire(Service\Connection::class),
    Service\ResultInterface::class => autowire(Service\Result::class),
    Framework\Http\Response\ResponseSuccessInterface::class => autowire(Service\Response\Success::class),
    Framework\Http\Response\ResponseExceptionInterface::class => autowire(Service\Response\Exception::class),
    
    /** Framework Objects */
    Framework\Data\SerializerInterface::class => autowire(Framework\Data\Serializer::class),
    Framework\Data\DataObjectInterface::class => autowire(Framework\Data\DataObject::class),
    
    /** Other Objects */
    \GuzzleHttp\ClientInterface::class => autowire(\GuzzleHttp\Client::class),
];
