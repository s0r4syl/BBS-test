@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="mb-4">
          <a href="{{ route('posts.create') }}" class="btn btn-primary">
	    新規作成
          </a>
        </div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->body, 200))) !!} <br>
                    </p>
		    {{--  投稿の詳細画面へのリンク --}}
		    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        続きを読む
	            </a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        Created by {{ $post->user_name }} at {{ $post->created_at->format('Y.m.d H:m:s') }}
                    </span>

                    @if ($post->comments->count())
                    <span class="badge badge-primary">
                        コメント {{ $post->comments->count() }}件
                    </span>
                    @endif
                </div>
            </div>
	@endforeach
	  <div class="d-flex justify-content-center mb-5">
              {{ $posts->links() }}
          </div>
      </div>
@endsection
