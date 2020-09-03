@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                {{ $album->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($album->body)) !!}
            </p>
            <img class="thumbnail" src="{{$album->photo}}" alt="" width="50%" height="50%">
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
                <form
                style="display: inline-block;"
                method="POST"
                action="{{ route('albums.destroy', ['album' => $album]) }}"
            >
                @csrf
                @method('DELETE')
            
                <button class="btn btn-danger">削除する</button>
            </form>
            </section>
        </div>
    </div>
@endsection