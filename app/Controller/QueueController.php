<?php

namespace App\Controller;

use App\Services\Queue;
use Symfony\Component\HttpFoundation\Request;

class QueueController
{
    public function sendMessageToQueue(Request $request)
    {
        $html = "<!DOCTYPE html>
        <html>
        <head>
            <title>Sent to QUEUE</title>
        </head>
        <body>
            <form action='http://localhost/queue/test'>
                <input type='text' name='message' />
                <button type='submit'>Send Message</button>
            </form>
        </body>
        </html>";

        if (!empty($request->query->get('message'))) {
            (new Queue)->sendMessageToQueue($request->query->get('message'));
        }

        echo $html;
    }
}
