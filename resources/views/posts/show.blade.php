@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
 	    <div class="mb-4 text-right">
		{{-- 投稿の編集 --}}
    		<a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
     		   編集
    		</a>
		{{-- 投稿削除--}}
                <form
                  style="display: inline-block;"
                  method="POST"
                  action="{{ route('posts.destroy', ['post' => $post]) }}"
                >
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">削除</button>
                </form>

	    </div>
	    {{-- 投稿のタイトル --}}
            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>
	    {{-- 投稿の本文 --}}
            <p class="mb-5">
                {!! nl2br(e($post->body)) !!}
            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
		</h2>
		{{-- コメント投稿フォーム --}}
		<form class="mb-4" method="POST" action="{{ route('comments.store') }}">
		   @csrf

    		  <input
		    name="post_id"
  	            type="hidden"
	            value="{{ $post->id }}"
		  >	
	          <div class="form-group">
	            <label for="body">
          	      本文
	            </label>

	          <textarea
        	      id="body"
	              name="body"
        	      class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
	              rows="4"
	          >{{ old('body') }}</textarea>
	          @if ($errors->has('body'))
	              <div class="invalid-feedback">
        	          {{ $errors->first('body') }}
	              </div>
	          @endif
	        </div>

	        <div class="mt-4">
               	  <button type="submit" class="btn btn-primary">
	            コメントする
	          </button>
	        </div>
		</form>

		{{-- コメント一覧を表示する --}}
		@forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection
