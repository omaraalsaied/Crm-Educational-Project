<?php

namespace Crm\Project\Events;

use Crm\Project\Models\Project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Project $project;

    public function __construct(Project $project)
    {
        $this->setProject($project) ;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): void
    {
        $this->project = $project;
    }



    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
