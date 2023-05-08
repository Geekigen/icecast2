<div class="flex justify-center">
    @if ($image)
    <div class="flex items-center">
        <span class="mr-2">Photo Preview:</span>
        <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover">
        <button onclick="removeImage()" class="ml-2 bg-red-500 hover:bg-red-600 text-white rounded py-1 px-2">
            X
        </button>
    </div>
    
@endif
    <form class="w-full max-w-md p-8 border rounded shadow-lg" wire:submit.prevent="save">
       
        <div class="mb-4">
            <label class="block mb-2">Title</label>
            <input class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" wire:model="title">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2">Content</label>
            <textarea id="editor" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" wire:model="content"></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2">Image</label>
            <input class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="file" wire:model="image">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button class="w-full py-2 px-4 bg-green-500 text-white font-semibold rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50" type="submit">Save</button>
    </form>
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
    
    <script>
         
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
               
    </script>
</div>
