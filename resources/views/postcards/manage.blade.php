<x-layout>
  <x-card class="p-10">
    <header>      
       <table class="w-full table-auto rounded-sm">
        <tbody>
          <tr class="border-gray-300">
              <td >
                <h1 class="text-3xl text-left font-bold my-6 uppercase">
                  Manage Postcards
                </h1>
              </td>          
              <td class="text-end">
                <a href="/postcards/create" class="mr-1 bg-black text-right text-white py-2 px-5 uppercase">Add New Postcard</a>
              </td>
          </tr>
        </tbody>
      </table>
    </header>
    <!-- Search bar -->
    @include('partials._search')
    <table class="w-full table-auto rounded-sm">
      <tbody>
        
        @unless($postcards->isEmpty())
        @foreach($postcards as $postcard)
        <tr class="border-gray-300">          
          <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
            <div class="flex">
              <div><img class="hidden w-48 mr-6 md:block rounded-l-lg"
              src="{{$postcard->photo ? asset('storage/' . $postcard->photo) : 'https://picsum.photos/400/200?random=' . $postcard->id }}" alt="" />
              </div>
              <div>
              <a href="/postcards/{{$postcard->id}}"> {{$postcard->title}} </a>
            </div>
          </div>
          </td>
          <td class="px-4 py-4 border-t border-b border-gray-300 text-lg">
            <a href="/postcards/{{$postcard->id}}/edit" class="text-blue-600 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>
              Edit</a>
          </td>
          <td class="px-4 py-4 border-t border-b border-gray-600 text-lg">
            <form method="POST" action="/postcards/{{$postcard->id}}">
              @csrf
              @method('DELETE')

              <button class="text-blue-500"><i class="fa-solid fa-trash"></i> Delete</button>

            </form>
          </td>
        </tr>       
        @endforeach

         <tr>
          <td>
            <div class="mt-6 p-4">
              {{$postcards->links()}}
            </div>
          </td>
        </tr>
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Postcards Found!</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
  </x-card>
</x-layout>
