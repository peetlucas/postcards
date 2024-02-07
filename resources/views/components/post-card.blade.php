@props(['postcard'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block rounded-l-lg"
      src="{{$postcard->photo ? asset('storage/' . $postcard->photo) : 'https://picsum.photos/400/200?random=' . $postcard->id }}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/postcards/{{$postcard->id}}">{{$postcard->title}}</a>        
      </h3>
      <p class="text-sm font-medium text-gray-500">Available on <time datetime="{{ $postcard->online_at }}">{{ $postcard->online_at }}</time> to <time datetime="{{ $postcard->offline_at }}">{{ $postcard->offline_at }}</time></p>			
      <div class="text-xl font-bold mb-4"><p>Price: R{{ $postcard->price }} </p></div>      
      <div class="text-lg mt-4">
        <p>Author: {{ $postcard->user->name }}</p>
      </div>
    </div>
  </div>
</x-card>

				
						
						
						