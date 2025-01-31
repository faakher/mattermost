<?php

namespace NotificationChannels\Mattermost\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response)
    {
        return new static('Mattermost responded with an error: `'.$response->getBody()->getContents().'`');
    }
}
