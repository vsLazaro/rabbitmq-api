<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
  public static function publishMessage(array $message): void 
    {
        $connection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'), env('MQ_VHOST'));
        $channel = $connection->channel();
        $msg = new AMQPMessage(\json_encode($message));
        $channel->basic_publish($msg, 'amq.direct');
        $channel->close();
        $connection->close();
    }
}