<?php

namespace CodewarsPhp\PlayerCommunication;

/**
 * Class Response
 *
 * @package CodewarsPhp\PlayerCommunication
 */
class Response
{
    /** @var int */
    const STATE_TYPE_SUCCESS = 1;

    /** @var int */
    const STATE_TYPE_ERROR = 2;

    /** @var string */
    const TYPE_REGISTER = 'register';

    /** @var string */
    const TYPE_MATCH_INFORMATION = 'match_info';

    /** @var string */
    const TYPE_MATCH_START = 'match_start';

    /** @var string */
    const TYPE_TURN_START = 'turn_start';

    /** @var string $type */
    private $type;

    /** @var int $state */
    private $state;

    /** @var string $message */
    private $message;

    /** @var ResponseData $data */
    private $data;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->data = new ResponseData();
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return ResponseData
     */
    public function getData(): ResponseData
    {
        return $this->data;
    }

    /**
     * @param ResponseData $data
     */
    public function setData(ResponseData $data): void
    {
        $this->data = $data;
    }
}