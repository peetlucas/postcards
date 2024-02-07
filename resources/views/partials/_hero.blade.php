
<section class="relative h-32 bg-pink-900 flex flex-col justify-center align-center text-center space-y-4 mb-4">
  <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/laravel-logo.png')"></div>

  <div class="z-10">   
    <p class="text-2xl text-white font-bold my-1">
      SEARCH FOR EXCLUSIVE POSTCARDS
    </p>
    <div>
      @auth
      @else
      <a href="/register"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-1 hover:text-black hover:border-black">Sign
        Up to List a Postcard</a>
      @endauth
    </div>
  </div>
</section>
