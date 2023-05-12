<div class="flex flex-col space-y-4">
    @if ($image)
    <div class="flex items-center">
        <span class="mr-2">Photo Preview:</span>
        <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover">
        <button onclick="removeImage()" class="ml-2 bg-red-500 hover:bg-red-600 text-white rounded py-1 px-2">
            X
        </button>
    </div>
    
@endif
    <form wire:submit.prevent="create">
        <div class="flex flex-col space-y-2">
            <label for="title">Title</label>
            <input type="text" wire:model="title" id="title" class="border border-gray-400 p-2 rounded-lg">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2" wire:ignore >
            <label for="content">Content</label>
            <textarea wire:model="content" id="content" class="border border-gray-400 p-2 rounded-lg"></textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col space-y-2 {{ Request::is('create-blog') ? 'w-full' : 'w-1/8' }} sm:w-full">
            <label for="image">Image</label>
            <div class="relative border border-gray-400 p-2 rounded-lg">
                <span class="text-gray-500">Click to upload blog photo</span>
                <input type="file" wire:model="image" id="image" class="opacity-0 absolute inset-0 z-50">
            </div>
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create</button>
    </form>

    <hr>
    <h2 class="border-b-4 border-green-500 text-black font-bold py-2">Your blogs</h2>

    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td class="border border-gray-400 p-2">{{ $blog->title }}</td>
                    <td class="border border-gray-400 p-2">{!! $blog->content !!}</td>
                    <td class="border border-gray-400 p-2"><img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}" width="100"></td>
                    <td class="border border-gray-400 p-2">
                        <button wire:click="edit({{ $blog->id }})" class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</button>
                        <button wire:click="delete({{ $blog->id }})" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
        @if($blogId)
        <form class="w-full max-w-md p-8 border rounded shadow-lg" wire:submit.prevent="update">
            <input type="hidden" wire:model="blogId">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">Title</label>
                <input class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" wire:model="title" id="title">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4"  wire:ignore>
                <label class="block text-gray-700 font-bold mb-2" for="content">Content</label>
                <textarea class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" wire:model="content" id="content"></textarea>
                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button>
                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" wire:click="resetInputFields">Cancel</button>
            </div>
        </form>
        <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
        <script>
            function removeImage() {
                // Remove the image from the DOM
                var imageElement = document.querySelector('img');
                imageElement.parentNode.removeChild(imageElement);
                
                // Reset the file input field
                var fileInput = document.querySelector('input[type="file"]');
                fileInput.value = '';
                
                // You can also call a Livewire method to remove the image from the server
                // Livewire.emit('removeImage');
            }
        </script>
        @endif
        <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
        <script>
            function removeImage() {
                // Remove the image from the DOM
                var imageElement = document.querySelector('img');
                imageElement.parentNode.removeChild(imageElement);
                
                // Reset the file input field
                var fileInput = document.querySelector('input[type="file"]');
                fileInput.value = '';
                
                // You can also call a Livewire method to remove the image from the server
                // Livewire.emit('removeImage');
            }
        </script>
        
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

        <script>
             ClassicEditor
               .create(document.querySelector('#content'))
               .then(editor => {
                   editor.model.document.on('change:data', () => {
                   @this.set('content', editor.getData());
                  })
               })
               .catch(error => {
                  console.error(error);
               });
        </script>
    </div>
    
  
    

