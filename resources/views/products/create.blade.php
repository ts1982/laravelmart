<h1>New Products</h1>

<form action="/products" method="post">
    @csrf
    <input type="text" name="name">
    <textarea name="description"></textarea>
    <input type="numer" name="price">
    <select name="category_id">
        <option value="">カテゴリを選択してください</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create</button>
</form>

<a href="/products">Back</a>
