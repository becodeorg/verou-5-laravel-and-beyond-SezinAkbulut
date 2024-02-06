
<h1>Products in {{ $category->name }}</h1>
@foreach($products as $product)
    <a href="{{ route('products.show', ['category' => $category->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach

{{--


<h1>Products in {{ $categoryWithProducts->name }}</h1>

@foreach($categoryWithProducts->products as $product)
    <a href="{{ route('products.show', ['category' => $categoryWithProducts->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach


<h1>Products in {{ $categoryWithProducts->name }}</h1>

@foreach($categoryWithProducts->products as $product)
    <a href="{{ route('products.show', ['category' => $categoryWithProducts->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach
--}}
