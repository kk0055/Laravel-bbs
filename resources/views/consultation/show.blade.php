@extends('layout')

@section('content')

    <div class="container mt-4">
        <div class="border p-4">
            <div class=" mb-4 ">
                {{-- <div class="mb-4 text-right">
                    <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
                        編集する
                    </a>
                    <form
    style="display: inline-block;"
    method="POST"
    action="{{ route('posts.destroy', ['post' => $post]) }}"
>
    @csrf
    @method('DELETE')

    <button class="btn btn-danger">削除する</button>
</form>
                </div> --}}
                <div class="show-text mb-3">
               タイトル : {{ $post->title }}
             
            </div>
            </div>

            <div class="show-text mb-3">
                {!! nl2br(e($post->body)) !!}
            </div>

            <section>

                <h4 class=" mb-2">
                    
                </h4>
<form class="mb-4" method="POST" action="{{ route('CommentsConsul.store') }}">
    @csrf

    <input
        name="post_id"
        type="hidden"
        value="{{ $post->id }}"
    >

    <div class="form-group">
        <label for="body">
            コメント
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
        <a class="btn btn-secondary" href="{{ route('consultation') }}">
            キャンセル
        </a>
        <button type="submit" class="btn btn-primary">
            コメントする
        </button>
    </div>
</form>
                @forelse($post->comment_to_consultations as $comment)
                    <div class="border-top ">
                        <time class="text-secondary">
                         
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <div class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </div>
                    </div>
                @empty
                    <div>コメントはまだありません。</div>
                @endforelse
            </section>
        </div>
    </div>
@endsection