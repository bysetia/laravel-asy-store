@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-group m-auto">
                    @foreach ($products as $product)
                    <div class="card m-3" style="width: 10rem;">
                        <img class="card-img-top" src="{{ url('storage/' . $product->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $product->name }}</p>
                            <form action="{{ route('show_product', $product) }}" method="get">
                                <button type="submit" class="btn btn-primary" style="font-size: 14px;">Show detail</button>
                            </form>
                            @if (Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('delete_product', $product) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2" style="font-size: 14px;">Delete product</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection