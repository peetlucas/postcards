@push('head')
    @if($canonicalUrl)
        <link rel="canonical" href="{{ $canonicalUrl }}">
    @endif
@endpush

<div wire:ignore>
    <!-- Content of the Livewire component -->
</div>
