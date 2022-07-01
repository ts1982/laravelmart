<div class="container shadow-sm pt-3 pb-5 h-auto">
    @foreach ($major_category_names as $major_category_name)
        <h4 class="fw-bold">{{ $major_category_name }}</h4>
        @foreach ($categories as $category)
            @if ($category->major_category_name == $major_category_name)
                <label class="d-block"><a
                        href="{{ route('products.index', compact('category')) }}">{{ $category->name }}</a></label>
            @endif
        @endforeach
    @endforeach
</div>
