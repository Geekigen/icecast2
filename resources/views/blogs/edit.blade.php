<x-app-layout>
    <form action="{{ route('blog-posts.update', $blogPost->id) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto border border-blue-500 p-4">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" accept="image/*" onchange="previewImage(event)">
            <img id="image-preview" class="mt-2">
        </div>
    
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-auto block w-24">
           Add image 
        </button>
    </form>
    
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    

</x-app-layout>