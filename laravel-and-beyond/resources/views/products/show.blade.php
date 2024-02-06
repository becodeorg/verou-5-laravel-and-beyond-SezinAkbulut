<h1>Details for {{ $product->name }}</h1>

<p>Price: {{ $product->price }}</p>

@if($product->category)
    <p>Category: {{ $product->category->name }}</p>
@else
    <p>Category not available</p>
@endif
