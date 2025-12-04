<x-sidebar>
  <div class="vh-100 d-flex">
    <div class="w-50 mt-5">
      <div class="m-3 detail_container">
        <div class="p-3">
          <div class="detail_inner_head">
            <div>
              @foreach($post->subCategories as $subCategory)
              <div class="post_category">
                {{ $subCategory->sub_category }}
              </div>
              @endforeach
            </div>
            <div>
              @if(Auth::id() === $post->user_id)
              <span class="edit-modal-open btn btn-primary" post_id="{{ $post->id }}" post_title="{{ $post->post_title }}" post_body="{{ $post->post }}">編集</span>
              <button type="button" class="js-delete-btn btn btn-danger" data-id="{{ $post->id }}">削除</button>
              @endif

            </div>
          </div>

          <div class="contributor d-flex">
            <p style="font-size:14px; margin-top:12px;">
              <span>{{ $post->user->over_name }}</span>
              <span>{{ $post->user->under_name }}</span>
              さん
            </p>
            <span class="ml-5">{{ $post->created_at }}</span>
          </div>
          <div class="detail_post_title">{{ $post->post_title }}</div>
          <div class="mt-3 detail_post">{{ $post->post }}</div>
        </div>
        <div class="p-3">
          <div class="comment_container">
            <span class="">コメント</span>
            @foreach($post->postComments as $comment)
            <div class="comment_area border-top">
              <p>
                <span>{{ $comment->commentUser($comment->user_id)->over_name }}</span>
                <span>{{ $comment->commentUser($comment->user_id)->under_name }}</span>さん
              </p>
              <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="w-50 p-3">
      <div class="comment_container border m-5">
        <div class="comment_area p-3">
          @error('comment')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <p class="m-0">コメントする</p>
          <form action="{{ route('comment.create') }}" method="post" id="commentRequest">
            {{ csrf_field() }}
            <textarea class="w-100" name="comment"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="submit" class="btn btn-primary" value="投稿">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal js-modal" style="{{ ($errors->has('post_title') || $errors->has('post_body')) ? 'display:block;' : 'display:none;' }}">
    <div class=" modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="{{ route('post.edit') }}" method="post">
        <div class="w-100">
          <div class="modal-inner-title w-50 m-auto">
            @error('post_title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" name="post_title" placeholder="タイトル" class="w-100">
          </div>
          <div class="modal-inner-body w-50 m-auto pt-3 pb-3">
            @error('post_body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea placeholder="投稿内容" name="post_body" class="w-100"></textarea>

          </div>
          <div class="w-50 m-auto edit-modal-btn d-flex">
            <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
            <input type="hidden" class="edit-modal-hidden" name="post_id" value="">
            <input type="submit" class="btn btn-primary d-block" value="編集">
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>

  <div class="modal js-delete-modal delete-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content delete-modal__content" style="margin:1rem;">
      <p>この投稿を削除します。よろしいでしょうか？</p>

      <div class="modal-button" style="display: flex;justify-content: space-between;">
        <form id="deleteForm" method="GET">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary btn-modal" style="padding:6px 2rem;">OK</button>
        </form>
        <button type="button" class="btn btn-outline-secondary btn-modal js-modal-close">キャンセル</button>
      </div>
    </div>
  </div>

  @if ($errors->any())
  <script>
    $(window).on('load', function() {
      // 編集モーダルを強制的に開く
      $('.js-modal').fadeIn();
    });
  </script>
  @endif
</x-sidebar>
