@extends('layout.main')
 @section('title','Products')
 @section('content')
        <!-- products listing -->
         <!-- Latest SHirts -->
    <div class="row">
        @forelse($products as $product)
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{route('cart.edit',$product->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="{{route('products.show',$product->id)}}">
                            <img src="{{$product->image}}"/>
                        </a>
                    </div>
                   
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
            @empty
            <h3>No Shirts</h3>
        @endforelse
    </div>
@endsection
