@extends('layout.main')
@section('content')
    <div class="row">
        @forelse($products->chunk(4) as $chunk)
        @foreach($chunk as $product)

            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.edit',$product->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="{{route('products.show',$product->id)}}">
                            <img src="{{url($product->image)}}"/>
                        </a>
                    </div>
                    <a href="{{route('products.index')}}">
                        <h3>
                           {{$product->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$product->price}}
                    </h5>
                    <p>
                        {{$product->description}}
                    </p>
                </div>
            </div>
             @endforeach
            @empty
            <h3>No products</h3>
        @endforelse
    </div>
  @endsection