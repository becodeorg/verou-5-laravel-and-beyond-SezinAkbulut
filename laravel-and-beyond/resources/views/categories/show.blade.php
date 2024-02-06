
<h1>Products in {{ $category->name }}</h1>
@foreach($products as $product)
    <a href="{{ route('products.show', ['category' => $category->id, 'product' => $product->id]) }}">{{ $product->name }}</a>
@endforeach


