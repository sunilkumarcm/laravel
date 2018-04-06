<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ticket extends Eloquent
{
    
    protected $fillable = ['user_id', 'title', 'description'];

    public function saveTicket($data)
    {
        $this->user_id = auth()->user()->id;
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->save();
        return 1;
    }

    public function updateTicket($data)
    {
        $ticket = $this->find($data['id']);
        $ticket->user_id = auth()->user()->id;
        $ticket->title = $data['title'];
        $ticket->description = $data['description'];
        $ticket->save();            
        return 1;
    }

}
