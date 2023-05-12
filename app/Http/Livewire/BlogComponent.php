<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $content;
    public $image; 
    public $blogId;
    public function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->blogId = null;
    }

    public function render()
    {
        $blogs = BlogPost::all();

        return view('livewire.blog-component', ['blogs' => $blogs]);
        
    }

    public function create()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:1024',
        ]);

        $imageName = time() . '.' . $this->image->extension();
        // $image->storeAs(public_path('images'), $name_gen, 'real_public');

        $this->image->storeAs('public/images', $imageName);

       BlogPost::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imageName,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);

        $this->blogId = $id;
        $this->title = $blog->title;
        $this->content = $blog->content;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = BlogPost::find($this->blogId);

        $blog->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetInputFields();
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
    

    public function delete($id)
    {
        $blog = BlogPost::findOrFail($id);

        $blog->delete();
    }

   
}
