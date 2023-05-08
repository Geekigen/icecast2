<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image; 
    public function render()
    {
        return view('livewire.blog-component');
    }

    public function removeImage()
    {
        if ($this->image) {
            // Delete the image file from the storage
            Storage::delete($this->image->temporaryUrl());
    
            // Reset the image property to null
            $this->image = null;
        }
    }
    

    public function save()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:1024', // Maximum file size of 1MB
        ]);

        // Save the blog post to the database
        // ...

        // Upload the image file to the server
        $imagePath = $this->image->store('public/images');

        // ...

        // Reset the input fields
        $this->reset();
    }
}
