@extends('layout')

@section('title')
    Items listing
@endsection

@section('content')
    <main class="px-3 py-2">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-3 my-3">
                    <div class="container">
                        <h2 class="text-primary">{{ $item->name }}</h2>
                        <p>{{ __('price') }}: {{ number_format($item->price, 2) }} $</p>
                        <p>{{ $item->seller }}</p>
                        <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex  justify-content-center my-4">
            {!! $items->links() !!}
        </div>

        @if ($items->isEmpty())
            <p class="text-center alert alert-warning">{{ __('No Items Found') }}</p>
        @endif
    </main>
@endsection
