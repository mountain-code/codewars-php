<?php

namespace CodewarsPhp\PlayerCommunication;

use DateTime;

/**
 * Class ResponseData
 *
 * @package CodewarsPhp\PlayerCommunication
 */
class ResponseData
{
    /**
     * @var int $playerId
     */
    private $playerId;

    /**
     * @var bool $matchStarted
     */
    private $matchStarted;

    /***
     * @var int $matchPlayers
     */
    private $matchPlayers;

    /**
     * @var int $matchCountdown
     */
    private $matchCountdown;

    /***
     * @var int $minPlayers
     */
    private $minPlayers;

    /***
     * @var int $maxPlayers
     */
    private $maxPlayers;

    /**
     * @var int $turnType
     */
    private $turnType;

    /**
     * @var DateTime $turnDeadline
     */
    private $turnDeadline;

    /**
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    /**
     * @param int $playerId
     */
    public function setPlayerId(int $playerId): void
    {
        $this->playerId = $playerId;
    }

    /**
     * @return bool
     */
    public function isMatchStarted(): bool
    {
        return $this->matchStarted;
    }

    /**
     * @param bool $matchStarted
     */
    public function setMatchStarted(bool $matchStarted): void
    {
        $this->matchStarted = $matchStarted;
    }

    /**
     * @return int
     */
    public function getMatchPlayers(): int
    {
        return $this->matchPlayers;
    }

    /**
     * @param int $matchPlayers
     */
    public function setMatchPlayers(int $matchPlayers): void
    {
        $this->matchPlayers = $matchPlayers;
    }

    /**
     * @return int
     */
    public function getMatchCountdown(): int
    {
        return $this->matchCountdown;
    }

    /**
     * @param int $matchCountdown
     */
    public function setMatchCountdown(int $matchCountdown): void
    {
        $this->matchCountdown = $matchCountdown;
    }

    /**
     * @return int
     */
    public function getMinPlayers(): int
    {
        return $this->minPlayers;
    }

    /**
     * @param int $minPlayers
     */
    public function setMinPlayers(int $minPlayers): void
    {
        $this->minPlayers = $minPlayers;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * @param int $maxPlayers
     */
    public function setMaxPlayers(int $maxPlayers): void
    {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return int
     */
    public function getTurnType(): int
    {
        return $this->turnType;
    }

    /**
     * @param int $turnType
     */
    public function setTurnType(int $turnType): void
    {
        $this->turnType = $turnType;
    }

    /**
     * @return DateTime
     */
    public function getTurnDeadline(): DateTime
    {
        return $this->turnDeadline;
    }

    /**
     * @param DateTime $turnDeadline
     */
    public function setTurnDeadline(DateTime $turnDeadline): void
    {
        $this->turnDeadline = $turnDeadline;
    }
}
