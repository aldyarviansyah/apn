<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class MessageAction extends Component
{
    public $title, $message, $model, $routeAnother, $emitAction, $modelId;
    public function mount($data)
    {
        $this->title = $data['title'];
        $this->message = $data['message'];
        $this->model = $data['model'];
        $this->routeAnother = isset($data['routeAnother'])?$data['routeAnother']:null;
        $this->emitAction = $data['emitAction'];
        $this->modelId = $data['modelId'];
    }
    public function render()
    {
        return view('livewire.components.message-action');
    }
}
