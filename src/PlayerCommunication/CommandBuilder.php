<?php

namespace CodewarsPhp\PlayerCommunication;

/**
 * Class CommandBuilder
 *
 * @package CodewarsPhp\PlayerCommunication
 */
class CommandBuilder
{
    /**
     * @param string $type
     * @param array $data
     * @return Command
     */
    public function build(string $type, array $data): Command
    {
        $command = new Command();
        $command->setType($type);
        $command->setData($data);

        return $command;
    }
}
