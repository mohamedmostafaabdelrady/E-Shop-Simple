 @extends('layout.main')
 @section('content')
 <section class="hero text-center">
            <br/>
            <br/>
            <br/>
            <br/>
            <h2 >
                <strong>
                    Hey! Welcome To My Store
                </strong>
            </h2>
            <br>
            @if(\Auth::user())
                @if(\Auth::user()->type=='admin')
                <a href="{{url('/products')}}">
                    <button class="button large">Check out My Products</button></a>
                @else
                <a href="{{url('/productsU')}}">
                    <button class="button large">Check out My Products</button></a>
                @endif
            @else
                <a href="{{url('/productsU')}}">
                    <button class="button large">Check out My Products</button></a>
            @endif
        </section>
        <br/>
        <div class="subheader text-center">
             <h2>
            Top Sales Products
        </h2>
        </div>
       
        <!-- Latest SHirts -->
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
        <!-- Footer -->
        <br>
        @endsection