<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishMessage;
use App\Services\RabbitMQService;
use Illuminate\Http\Request;

class RabbitMQController extends Controller
{
    public function send(PublishMessage $request)
    {
        $data = $request->all();
        RabbitMQService::publishMessage($data["message"]);
        return response('', 201);
    }
}
