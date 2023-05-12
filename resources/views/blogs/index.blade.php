<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Our blogs') }}
        </h2>
    </x-slot>

     {{-- blogs  --}}
   
     <div  class="section relative pt-20 pb-8 md:pt-16 bg-white dark:bg-gray-800">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($blogPosts as $blogPost)
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative h-0" style="padding-bottom: 100%">
                        <img class="absolute inset-0 w-full h-full object-cover rounded-full" src="{{ asset('storage/images/' . $blogPost->image) }}" alt="{{ $blogPost->title }}">
                    </div>
                    <h2 class="text-2xl font-bold mt-4">{!! $blogPost->title !!}</h2>
                    <a href="{{ route('blog-posts.show', $blogPost) }}" class="block mt-4 text-blue-600 font-bold">Read More</a>
                </div>
            @endforeach
        </div>  
    </div>
    
    {{-- end blogs --}}
    
</x-app-layout>