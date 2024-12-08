<!-- resources/views/home.blade.php -->
<div>
    <h1>Danh sách bài viết</h1>
    @foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
    @endforeach
</div>