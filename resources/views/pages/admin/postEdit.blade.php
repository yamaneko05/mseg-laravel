<x-admin.layout>
  <div class="subpage-h2">
    <div>
      <h2 class="section-h2"><var>{{ $post->title }}</var>
        <div><span></span><p>edit</p></div>
      </h2>
    </div>
  </div>
  <div class="admin-mansions-edit">
    <div class="back-to-index">
      <a href="{{ url("/admin/posts") }}">← 投稿一覧に戻る</a>
    </div>
    <div class="mansion-stmt">
      <p>
        <span>公開日: </span>
        {{ $post->published_at->format("Y n/d"). " | " . $post->published_at->diffForHumans() }}
        <span>マンションID: </span>
        {{ $post->id }}
        <span>公開URL: </span>
        <a href="{{ url("/posts/{$post->id}") }}" target="_blank">
          {{ url("/posts/{$post->id}") }}
        </a>
      </p>
    </div>
    <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <x-admin.postForm :post="$post" />
      <div class="admin-mansion-footer">
        <button type="button" onclick="submitOnClick()"><span>更新</span></button>
      </div>
    </form>
  </div>
  <script defer>
    const h2 = document.querySelector('.section-h2 var');
    const input = document.getElementById('mansionTitle');
    input.addEventListener('input', function(e) {
      h2.textContent = e.target.value;
    });
  </script>
</x-admin.layout>
