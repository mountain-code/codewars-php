<?php

namespace CodewarsPhp\PlayerCommunication;

use stdClass;
use DateTime;

/**
 * Class ResponseBuilder
 *
 * @package CodewarsPhp\PlayerCommunication
 */
class ResponseBuilder
{
    /** @var Response $response */
    private $response;

    /**
     * @param stdClass $object
     * @return Response
     */
    public function build(stdClass $object): Response
    {
        $this->response = new Response();
        $this->response->setType($object->Command);

        if (isset($object->State)) {

            $this->response->setState(Response::STATE_TYPE_SUCCESS);

            if ($object->State == 'error') {

                $this->response->setState(Response::STATE_TYPE_ERROR);
            }
        }

        if (isset($object->Message)) {

            $this->response->setMessage($object->Message);
        }

        if (isset($object->Data)) {

            $this->initDataContainer($object);
        }

        return $this->response;
    }

    /**
     * @param stdClass $object
     * @return void
     */
    private function initDataContainer(stdClass $object): void
    {
        if ($this->response->getType() == Response::TYPE_REGISTER) {

            return;
        }

        if ($this->response->getType() == Response::TYPE_MATCH_INFORMATION) {

            $this->response->getData()->setMatchCountdown($object->Data->Countdown);
            $this->response->getData()->setMatchPlayers($object->Data->Players);
            $this->response->getData()->setMinPlayers($object->Data->MinPlayers);
            $this->response->getData()->setMaxPlayers($object->Data->MaxPlayers);

            return;
        }

        if ($this->response->getType() == Response::TYPE_MATCH_START) {

            $this->response->getData()->setPlayerId($object->Data->PlayerId);

            return;
        }

        if ($this->response->getType() == Response::TYPE_TURN_START) {

            $this->response->getData()->setTurnDeadline(new DateTime($object->Data->TurnDeadline));

            return;
        }
    }
}
