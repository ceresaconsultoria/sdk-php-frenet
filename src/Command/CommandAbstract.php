<?php

declare(strict_types = 1);

namespace Frenet\Command;

use Frenet\Framework\Data\DataObject;

/**
 * Class MethodAbstract
 * @package Frenet\Command
 */
abstract class CommandAbstract extends DataObject implements CommandInterface
{
    /**
     * @var string
     */
    protected $urlPath = null;
    
    /**
     * @var boolean
     */
    protected $exportMultipart = false;

    /**
     * @var string
     */
    protected $contentType = 'json';
    
    /**
     * @var string
     */
    protected $requestMethod = self::REQUEST_METHOD_POST;

    /**
     * @var array
     */
    protected $optionalConfig = [];

    /**
     * @var \Frenet\Framework\Data\SerializerInterface
     */
    private $serializer;
    
    /**
     * CommandAbstract constructor.
     *
     * @param \Frenet\Service\ConnectionInterface        $connection
     * @param \Frenet\Framework\Data\SerializerInterface $serializer
     */
    public function __construct(
        \Frenet\Service\ConnectionInterface $connection,
        \Frenet\Framework\Data\SerializerInterface $serializer
    ) {
        $this->serializer = $serializer;
    }
    
    /**
     * @return string
     */
    public function getUrlPath()
    {
        return $this->urlPath;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
    
    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptionalConfig(array $optionalConfig = [])
    {
        $this->optionalConfig = $optionalConfig;
        
        /**
         * @var string $key
         * @var mixed  $value
         */
        foreach ($this->optionalConfig as $key => $value) {
            if (null === $key || false === $key) {
                continue;
            }
            
            $this->setData($key, $value);
        }
        
        return $this;
    }

    /**
     * @return array
     */
    public function prepareBody()
    {
        return $this->export();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->export();
    }

    /**
     * {@inheritdoc}
     */
    public function toJson()
    {
        return $this->serializer->serialize($this->toArray());
    }
    
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this;
    }
}
