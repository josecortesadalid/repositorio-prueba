<?php

namespace App\Listeners;

use App\Events\ProjectSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class OptimizeProjectImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProjectSaved  $event
     * @return void
     */
    public function handle(ProjectSaved $event) 
    {
        $image = Image::make(Storage::get($event->project->imagen)); 
        $image
        ->widen(400)
        ->limitColors(255)
        ->encode();

        Storage::put($event->project->imagen, (string) $image);
    }
}
