<x-sidebar>
  <div class="board_area w-100 m-auto d-flex">
    <div class="post_view w-70 mt-5">
      @foreach($posts as $post)
      <div class="post_area border w-75 m-auto p-3">
        <p style="color:#9e9e9e;"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
        <p><a href="{{ route('post.detail', ['id' => $post->id]) }}" style="color: inherit; text-decoration: none; font-weight:bold;">{{ $post->post_title }}</a></p>
        <div class="post_bottom_area">
          <div class="post_bottom">
            @foreach($post->subCategories as $subCategory)
            <div class="post_category">
              {{ $subCategory->sub_category }}
            </div>
            @endforeach
            <div class="post_status d-flex">
              <i class="fa fa-comment" style="color:#9e9e9e;"></i>
              <span>{{ $post->post_comments_count }}</span>
              @if(Auth::user()->is_Like($post->id))
              <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $post->likes_count }}</span></p>
              @else
              <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $post->likes_count }}</span></p>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="other_area">
      <div class="">
        <a href="{{ route('post.input') }}" class="post-btn">投稿</a>
      </div>
      <div class="search-box d-flex w-100">
        <input type="text"
          placeholder="キーワードを検索"
          name="keyword"
          form="postSearchRequest"
          class="flex-grow-1 p-2 search-input">
        <input type="submit"
          value="検索"
          form="postSearchRequest"
          class="search-button text-white">
      </div>
      <div class="posts-box d-flex w-100">
        <input type="submit" name="like_posts" class="w-50 like_posts_btn" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="w-50 my_posts_btn" value="自分の投稿" form="postSearchRequest">
      </div>
      <ul class="list-unstyled category-list">
        <p>カテゴリー検索</p>
        @foreach($categories as $category)
        <li class="main_categories">
          <div class="main-header d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse"
            data-bs-target="#category{{ $category->id }}"
            aria-expanded="false"
            style="cursor: pointer; border-bottom: 1px solid #ccc;">
            <span>{{ $category->main_category }}</span>
            <i class="arrow-icon fa fa-chevron-down"></i>
          </div>

          <ul class="collapse sub-list mt-2" id="category{{ $category->id }}">
            @foreach($category->subCategories as $sub)
            <li class="sub-item">
              <a href="{{ route('post.show') }}?sub_category_id={{ $sub->id }}" class="text-decoration-none text-dark">
                {{ $sub->sub_category }}
              </a>
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
    <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</x-sidebar>
