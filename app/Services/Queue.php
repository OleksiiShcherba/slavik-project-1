<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Queue
{
    private static $queue_path = "amqp://user:password@localhost:5672/my_vhost";

    public function sendMessageToQueue(string $message)
    {
        $url_str = self::$queue_path;
        $url = parse_url($url_str);
        $vhost = substr($url['path'], 1);

        $connection = new AMQPStreamConnection($url['host'], 5672, $url['user'], $url['pass'], $vhost);

        $channel = $connection->channel();
        $channel->exchange_declare('test_exchange', 'direct', false, false, false);
        $channel->queue_declare('test_queue', false, false, false, false);
        $channel->queue_bind('test_queue', 'test_exchange', 'test_key');

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'test_exchange', 'test_key');

        echo " [x] Sent 'Hello World!' to test_exchange / test_queue.\n";

        $channel->close();
        $connection->close();
    }

    public function readMessages()
    {
        $url_str = self::$queue_path;
        $url = parse_url($url_str);
        $vhost = substr($url['path'], 1);

        $connection = new AMQPStreamConnection($url['host'], 5672, $url['user'], $url['pass'], $vhost);

        $channel = $connection->channel();

        // Slvik need to read about !!!!!
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->basic_consume('test_queue', '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
