@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Edit Postcard</h2>
      <p class="mb-4">Edit: {{$postcard->title}}</p>
    </header>

    <form method="POST" action="/postcards/{{$postcard->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Postcard Title</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Example: Kilimani Apartments" value="{{$postcard->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2">Postcard Title</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
          placeholder="Example: Westlands Apartments" value="{{$postcard->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="online_at" class="inline-block text-lg mb-2">
          Online at:
        </label>
        <input type="datetime-local" class="border border-gray-200 rounded p-2 w-full" name="online_at">

        @error('online_at')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="offline_at" class="inline-block text-lg mb-2">
          Offline at:
        </label>         
          <input type="datetime-local" class="border border-gray-200 rounded p-2 w-full" name="offline_at">           

        @error('offline_at')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="is_draft" class="inline-block text-lg mb-2">
          Draft
        </label>
          <select name="is_draft" id="is_draft" class="border border-gray-200 rounded p-2 w-full">
            <option value=1>Yes</option>
            <option value=0>No</option>            
          </select>

        @error('is_draft')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2">
          Photo
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="photo" />

        <img class="w-48 mr-6 mb-6"
          src="{{$postcard->logo ? asset('storage/' . $postcard->logo) : asset('/images/no-image.png')}}" alt="" />
        @error('photo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="price" class="inline-block text-lg mb-2">
          Price
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
           value="{{$postcard->price}}" />

        @error('price')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Update Postcard
        </button>

        <a href="/postcards/manage" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
