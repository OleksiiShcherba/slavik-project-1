<?php

require '../../vendor/autoload.php';

use App\Services\Queue;

(new Queue)->readMessages();
