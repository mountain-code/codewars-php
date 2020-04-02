<?php

namespace CodewarsPhp;

use CodewarsPhp\PlayerCommunication\Response;
use CodewarsPhp\PlayerCommunication\ResponseBuilder;
use Exception;
use CodewarsPhp\PlayerCommunication\Command;
use CodewarsPhp\PlayerCommunication\CommandBuilder;

/**
 * Class Codewars
 *
 * @package CodewarsPhp
 */
class Codewars
{
    /** @var resource $socket */
    private $socket;

    /** @var CommandBuilder $commandBuilder */
    private $commandBuilder;

    /** @var ResponseBuilder $responseBuilder */
    private $responseBuilder;

    /**
     * Codewars constructor.
     */
    public function __construct()
    {
        $this->commandBuilder = new CommandBuilder();
        $this->responseBuilder = new ResponseBuilder();
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        socket_close($this->socket);
    }

    /**
     * @param string $address
     * @param int $port
     * @throws Exception
     */
    public function connect(string $address, int $port): void
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if ($this->socket === false) {

            throw new Exception(socket_strerror(socket_last_error()));
        }

        if (socket_connect($this->socket, $address, $port) === false) {

            throw new Exception(socket_strerror(socket_last_error($this->socket)));
        }
    }

    /**
     * @return Response
     * @throws Exception
     */
    public function awaitInformation(): Response
    {
        return $this->listen();
    }

    /**
     * @param string $name
     * @return Response
     * @throws Exception
     */
    public function registerPlayer(string $name)
    {
        return $this->sendCommand(
            $this->commandBuilder->build(Command::TYPE_REGISTER, ['Name' => $name])
        );
    }

    /**
     * @param Command $command
     * @return Response
     * @throws Exception
     */
    private function sendCommand(Command $command): Response
    {
        if (socket_write($this->socket, $command->getSerialized()) === false) {

            throw new Exception(socket_strerror(socket_last_error($this->socket)));
        }

        return $this->listen();
    }

    /**
     * @throws Exception
     * @return Response
     */
    private function listen(): Response
    {
        $socketOutput = socket_read($this->socket, 1024);

        if ($socketOutput === false) {

            throw new Exception(socket_strerror(socket_last_error($this->socket)));
        }

        $object = json_decode($socketOutput);

        if ($object === null) {

            throw new Exception(json_last_error_msg());
        }

        return $this->responseBuilder->build($object);
    }
}
