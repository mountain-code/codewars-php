<?php

namespace CodewarsPhp\PlayerCommunication;

use JsonSerializable;

/**
 * Class Command
 *
 * @package CodewarsPhp\PlayerCommunication
 */
class Command implements JsonSerializable
{
    /** @var string */
    const TYPE_REGISTER = 'register';

    /** @var string $type */
    private $type;

    /** @var array $data */
    private $data;

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
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getSerialized(): string
    {
        return json_encode($this)."\n";
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'Command' => $this->getType(),
            'Data' => $this->getData(),
        ];
    }
}
