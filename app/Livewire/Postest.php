<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use App\Models\Post;
 
class Postest extends Component
{
    public $message;
 
    public function render()
    {
        return view('livewire.postest', [
            'message' => $this->message
        ]);
    }
}