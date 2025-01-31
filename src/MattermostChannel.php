<?php

namespace NotificationChannels\Mattermost;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Notifications\Notification;
use NotificationChannels\Mattermost\Exceptions\CouldNotSendNotification;

class MattermostChannel
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        try {
            $token = config('services.mattermost.token');
            $mattermostServerUrl = config('services.mattermost.server_url');
            $mattermostChannelId = config('services.mattermost.channel_id');

            $message = $notification->toMattermost($notifiable);

            $msg = $message->message;

            $body = json_encode([
                'channel_id' => $mattermostChannelId,
                'message' => $msg,
            ]);

            $headers = [
                'Authorization' => 'Bearer '.$token,
                'Content-Type' => 'application/json',
            ];

            $request = new Request('POST', $mattermostServerUrl.'/api/v4/posts', $headers, $body);
            $res = $this->client->sendAsync($request)->wait();
        } catch (ClientException $e) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($e);
        }
    }
}
