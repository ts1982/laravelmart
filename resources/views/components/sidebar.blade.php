<div class="container shadow-sm pt-4 pb-5 h-auto">
    @foreach ($major_categories as $major_category)
        <h4 class="fw-bold">{{ $major_category->name }}</h4>
        @foreach ($categories as $category)
            @if ($category->major_category->name == $major_category->name)
                <label class="d-block"><a
                        href="{{ route('products.index', compact('category')) }}">{{ $category->name }}</a></label>
            @endif
        @endforeach
    @endforeach
</div>
