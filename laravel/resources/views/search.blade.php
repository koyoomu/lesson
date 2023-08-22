<x-layout>
    <a href="{{ route('index.posts') }}" class="re">戻る</a>
    <h1>検索画面</h1>
    <form action="{{ route('search.posts') }}" method="get">
        @csrf

        <label>
            Title検索
            <input type="text" name="title" value="{{ $keyword }}">
            <div class="search_btn"><button type="submit">検索</button></div>
        </label>
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror
    </form>

    <h2>検索結果</h2>
    @if($keyword)
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('text.posts', $post->id) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
    @endif
</x-layout>
