<!DOCTYPE html>
<html lang="en">
<head>
  @laravelPWA
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sama'kwo' online radio - Listen Live</title>
  <!-- Load Tailwind CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
  <!-- Navbar -->
  <style>
    .bg-gradient-blue {
      background: linear-gradient(45deg, #4f93ce, #00b4db);
    }
    .login-buttons {
      display: flex;
      gap: 10px;
    }
    .login-button {
      background-color: #4f93ce;
      color: white;
      font-weight: bold;
      padding: 4px 8px;
      border-radius:20%;
      border: 2px solid white;
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .login-button:hover {
      background-color: white;
      color: black;
    }
  </style>
  
  <nav class="bg-gradient-blue">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex-shrink-0 flex items-center">
          <a href="{{ url('/') }}">
            <img src="{{ asset('samakwo.jpg') }}" alt="logo" class="h-8 rounded-full">

          </a>
          <a href="#" class="text-white font-bold text-xl ml-2">Sama'kwo' online radio</a>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <button class="btn btn-sm btn-primary" type="submit"><a class="login-button text-sm px-2 py-1" href="/blog-posts">{{ __(' Blogs') }}</a></button>
      </div>
        <div class="flex">
          @guest
          <div class="login-buttons">
            <button class="btn btn-sm btn-primary" type="submit"><a class="login-button text-sm px-2 py-1" href="{{ route('login') }}">{{ __('Login') }}</a></button>
            <button class="btn btn-sm btn-secondary" type="submit"><a class="login-button text-sm px-2 py-1" href="{{ route('register') }}">{{ __('Register') }}</a></button>
        </div>
        
        
          @endguest
          @if (Auth::check())
          @include('layouts.navigation')
          @endif
        </div>
      </div>
    </div>
  </nav>
  
  <script>
    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }
  </script>
  
  <!-- Main Content -->
  <main class="container mx-auto py-8 px-4 md:px-16">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Listen Live</h1>
    <div class="bg-white rounded-lg shadow-md px-4 py-6 md:py-8 md:px-8">
      <!-- Radio Player -->
      <div class="w-full lg:flex lg:justify-center">
        <div class="cc_player" data-username="hillysho">Loading ...</div>
      </div>
      
       
      {{-- blogs  --}}
   
      <div  class="section relative pt-20 pb-8 md:pt-16 bg-white dark:bg-gray-800">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($latestBlogPosts as $blogPost)
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative h-0" style="padding-bottom: 100%">
                        <img class="absolute inset-0 w-full h-full object-cover rounded-full" src="{{ asset('images/' . $blogPost->image) }}" alt="{{ $blogPost->title }}">
                    </div>
                    <h2 class="text-2xl font-bold mt-4">{!! $blogPost->title !!}</h2>
                    <a href="{{ route('blog-posts.show', $blogPost) }}" class="block mt-4 text-blue-600 font-bold">Read More</a>
                </div>
            @endforeach
        </div>  
    </div>
    
    {{-- end blogs --}}
 <div class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
        <div class="flex space-x-3">
          @php
          $ratenumber=number_format($rating_value);
      @endphp
          @for ($i=1;$i<=$ratenumber;$i++)
          <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>

          @endfor

          @for ($j=$ratenumber+1; $j<=5;$j++)
          <svg class="w-12 h-12 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
          @endfor
          @if ($rating->count()>0)
              : By {{ $rating->count() }} ratings.
              @else
              :No ratings
          @endif

        </div>
    </div>
      <!-- WhatsApp Button -->
      <div class="text-center mt-6 mb-3">
        <a href="https://wa.me/whatsappphonenumber" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md focus:outline-none">Send Message on WhatsApp</a>
      </div>
     
     
      
    </div>
  </main>

  <div class="bg-gray-200 w-full flex flex-col items-center">
    <div class="flex flex-col items-center py-6 space-y-3">
      <span class="text-lg text-gray-800">How was quality of the stream?</span>
   
      <style>
     form.rating .flex {
  display: flex;
  align-items: center;
  background: linear-gradient(to right, #FBBF24 0%, #FBBF24 var(--Rate), #ddd var(--Rate), #ddd 100%);
  padding: 10px;
  border-radius: 10px;
  overflow: hidden;
}

.stars {
  display: flex;
  flex-direction: row-reverse;
  font-size: 30px;
  justify-content: center;
  position: relative;
}

.stars input {
  display: none;
}

.stars label {
  display: inline-block;
  color: lightgrey;
  margin: 0 5px;
  text-shadow: 1px 1px #bbb;
  cursor: pointer;
}

.stars label:before {
  content: '★';
}

.stars input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px #c60;
}

.stars:not(:checked) > label:hover,
.stars:not(:checked) > label:hover ~ label {
  color: gold;
}

.stars input:checked > label:hover,
.stars input:checked > label:hover ~ label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}

.stars .result:before {
  position: absolute;
  content: "";
  width: 100%;
  left: 50%;
  transform: translateX(-50%);
  top: -30px;
  font-size: 30px;
  font-weight: 500;
  color: gold;
  font-family: 'Poppins', sans-serif;
  display: none;
}

.stars input:checked ~ .result:before {
  display: block;
}

.stars #five:checked ~ .result:before {
  content: "I love it ";
}

.stars #four:checked ~ .result:before {
  content: "I like it ";
}

.stars #three:checked ~ .result:before {
  content: "It's good ";
}

.stars #two:checked ~ .result:before {
  content: "I don't like it ";
}

.stars #one:checked ~ .result:before {
  content: "I hate it ";
}

      
      </style>
      <form action="/save-rating" method="POST">
@csrf
      <div class="stars-container">
        <div class="stars">
          <input type="radio" id="one" name="Rate" value="5">
          <label for="one" class="star"></label>
          <input type="radio" id="two" name="Rate" value="4">
          <label for="two" class="star"></label>
          <input type="radio" id="three" name="Rate" value="3">
          <label for="three" class="star"></label>
          <input type="radio" id="four" name="Rate" value="2">
          <label for="four" class="star"></label>
          <input type="radio" id="five" name="Rate" value="1">
          <label for="five" class="star"></label>
        </div>
        
      </div>
      <div class="w-3/4 flex flex-col">
        <textarea rows="3" class="p-4 text-gray-500 rounded-xl resize-none" name="comment">Reason for Rating</textarea>
        <button class="py-3 my-8 text-lg bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white">....Rate....</button>
      </div>
    </form>
           
      
      
    </div>
  
  </div>
  
</div>


</div>
  <!-- Footer -->
  <footer class="bg-gray-800 py-6 text-gray-300">
    <div class="container mx-auto text-center">
      <div class="flex justify-center space-x-6">
        <a href="https://www.facebook.com"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48c27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg></a>
        <a href="https://twitter.com"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645c0 138.72-105.583 298.558-298.558 298.558c-59.452 0-114.68-17.219-161.137-47.106c8.447.974 16.568 1.299 25.34 1.299c49.055 0 94.213-16.568 130.274-44.832c-46.132-.975-84.792-31.188-98.112-72.772c6.498.974 12.995 1.624 19.818 1.624c9.421 0 18.843-1.3 27.614-3.573c-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319c-28.264-18.843-46.781-51.005-46.781-87.391c0-19.492 5.197-37.36 14.294-52.954c51.655 63.675 129.3 105.258 216.365 109.807c-1.624-7.797-2.599-15.918-2.599-24.04c0-57.828 46.782-104.934 104.934-104.934c30.213 0 57.502 12.67 76.67 33.137c23.715-4.548 46.456-13.32 66.599-25.34c-7.798 24.366-24.366 44.833-46.132 57.827c21.117-2.273 41.584-8.122 60.426-16.243c-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg></a>
        <a href="https://www.tiktok.com"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 290"><path fill="#FF004F" d="M189.72 104.421c18.678 13.345 41.56 21.197 66.273 21.197v-47.53a67.115 67.115 0 0 1-13.918-1.456v37.413c-24.711 0-47.59-7.851-66.272-21.195v96.996c0 48.523-39.356 87.855-87.9 87.855c-18.113 0-34.949-5.473-48.934-14.86c15.962 16.313 38.222 26.432 62.848 26.432c48.548 0 87.905-39.332 87.905-87.857v-96.995h-.002Zm17.17-47.952c-9.546-10.423-15.814-23.893-17.17-38.785v-6.113h-13.189c3.32 18.927 14.644 35.097 30.358 44.898ZM69.673 225.607a40.008 40.008 0 0 1-8.203-24.33c0-22.192 18.001-40.186 40.21-40.186a40.313 40.313 0 0 1 12.197 1.883v-48.593c-4.61-.631-9.262-.9-13.912-.801v37.822a40.268 40.268 0 0 0-12.203-1.882c-22.208 0-40.208 17.992-40.208 40.187c0 15.694 8.997 29.281 22.119 35.9Z"/><path d="M175.803 92.849c18.683 13.344 41.56 21.195 66.272 21.195V76.631c-13.794-2.937-26.005-10.141-35.186-20.162c-15.715-9.802-27.038-25.972-30.358-44.898h-34.643v189.843c-.079 22.132-18.049 40.052-40.21 40.052c-13.058 0-24.66-6.221-32.007-15.86c-13.12-6.618-22.118-20.206-22.118-35.898c0-22.193 18-40.187 40.208-40.187c4.255 0 8.356.662 12.203 1.882v-37.822c-47.692.985-86.047 39.933-86.047 87.834c0 23.912 9.551 45.589 25.053 61.428c13.985 9.385 30.82 14.86 48.934 14.86c48.545 0 87.9-39.335 87.9-87.857V92.85h-.001Z"/><path fill="#00F2EA" d="M242.075 76.63V66.516a66.285 66.285 0 0 1-35.186-10.047a66.47 66.47 0 0 0 35.186 20.163ZM176.53 11.57a67.788 67.788 0 0 1-.728-5.457V0h-47.834v189.845c-.076 22.13-18.046 40.05-40.208 40.05a40.06 40.06 0 0 1-18.09-4.287c7.347 9.637 18.949 15.857 32.007 15.857c22.16 0 40.132-17.918 40.21-40.05V11.571h34.643ZM99.966 113.58v-10.769a88.787 88.787 0 0 0-12.061-.818C39.355 101.993 0 141.327 0 189.845c0 30.419 15.467 57.227 38.971 72.996c-15.502-15.838-25.053-37.516-25.053-61.427c0-47.9 38.354-86.848 86.048-87.833Z"/></svg></a>
        <a href="https://www.instagram.com"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 448 512"><path fill="currentColor" d="M224 202.66A53.34 53.34 0 1 0 277.36 256A53.38 53.38 0 0 0 224 202.66Zm124.71-41a54 54 0 0 0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31 6.43a54 54 0 0 0-30.41 30.41c-8.28 21-6.43 71.05-6.43 94.33s-1.85 73.27 6.47 94.34a54 54 0 0 0 30.41 30.41c21 8.29 71 6.43 94.31 6.43s73.24 1.93 94.3-6.43a54 54 0 0 0 30.41-30.41c8.35-21 6.43-71.05 6.43-94.33s1.92-73.26-6.43-94.33ZM224 338a82 82 0 1 1 82-82a81.9 81.9 0 0 1-82 82Zm85.38-148.3a19.14 19.14 0 1 1 19.13-19.14a19.1 19.1 0 0 1-19.09 19.18ZM400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h352a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48Zm-17.12 290c-1.29 25.63-7.14 48.34-25.85 67s-41.4 24.63-67 25.85c-26.41 1.49-105.59 1.49-132 0c-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61 0-132c1.29-25.63 7.07-48.34 25.85-67s41.47-24.56 67-25.78c26.41-1.49 105.59-1.49 132 0c25.63 1.29 48.33 7.15 67 25.85s24.63 41.42 25.85 67.05c1.49 26.32 1.49 105.44 0 131.88Z"/></svg></a>
        <a href="/blog"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M3 3v18h18V3H3m15 15H6v-1h12v1m0-2H6v-1h12v1m0-4H6V6h12v6Z"/></svg></a>
      </div>
      <p>&copy; 2023 Sama'kwo' online radio. All rights reserved.</p>
    </div>
  </footer>
  
  <script language="javascript" type="text/javascript" src="https://cast5.asurahosting.com/system/player.js"></script>   
</body>
</html>
