<x-layout>
    @include('partials._hero')   
  <div class="min-h-full">
    <!-- Page heading -->
    <header class="bg-gray-50 py-8">
      
      @if(isset($postcards))
        @if($postcards->currentPage() > 1)                        
          <link rel="prev" href="{{ $postcards->previousPageUrl() }}" />             
        @endif
                      
        @if($postcards->hasMorePages())
          <link rel="next" href="{{ $postcards->nextPageUrl() }}" /> 
        @endif
      @endif  

      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
        <div class="min-w-0 flex-1">
          <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
              <li>
                <div>
                  <a href="/" class="text-sm font-medium text-gray-500 hover:text-gray-700">Home   </a>
                </div>
              </li>
              <li>
                @if(isset($postcards))
                  @if($postcards->currentPage() > 1)  
                    <a href="{{ $postcards->previousPageUrl() }}" class="text-sm font-medium text-gray-400 hover:text-gray-700">| Previous</a>
                  @endif
                                
                  @if($postcards->hasMorePages())                                    
                    <a href="{{ $postcards->nextPageUrl() }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">| Next</a>
                  @endif
                @endif  
                
              </li>              
            </ol>
          </nav>          
        </div>

      </div>
    </header>
    
    <!-- Search bar -->
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($postcards) == 0)

    @foreach($postcards as $postcard)
      <x-post-card :postcard="$postcard" />
    @endforeach

    @else
      <p>No Postcards Found!</p>
    @endunless

    <!-- Pagination -->
        <nav aria-label="Pagination">
          {{ $postcards->links() }}
        </nav>

  </div>
  </div>
</x-layout>
