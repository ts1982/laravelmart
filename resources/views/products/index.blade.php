@foreach ($products as $product)
    {{ $product->name }}
    {{ $product->description }}
    {{ $product->price }}
    <a href="{{ route('products.show', $product) }}">Show</a>
    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <form action="{{ route('products.destroy', $product) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
@endforeach

<a href="{{ route('products.create') }}">New</a>
