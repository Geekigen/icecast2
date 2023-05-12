<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {!! $blogPost->title !!}
        </h2>
    </x-slot>

     {{-- blogs  --}}
   
     <div class="max-w-lg mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <img class="w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] " src="{{ asset('storage/images/' . $blogPost->image) }}" alt="{{ $blogPost->title }}">
        <h2 class="text-2xl font-bold mb-4">{!! $blogPost->title !!}</h2>
        <div class="mb-5">
            
            <p class="text-gray-700">{!! $blogPost->content !!}</p>
        </div>
            
    </div>
    
    {{-- end blogs --}}
    {{-- read more blogs button --}}

<div class="max-w-lg mx-auto mt-8 px-4 sm:px-6 lg:px-8 flex justify-center mb-4">
    <a href="{{ route('blog-posts.index') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Read More Blogs</a>
</div>

{{-- end read more blogs button --}}
    
</x-app-layout>