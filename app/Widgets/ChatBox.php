<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ChatBox extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $chat;

        return view('widgets.chat_box', [
            'config' => $this->config,
        ]);
    }
}
