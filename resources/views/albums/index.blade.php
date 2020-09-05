@extends('layout')

@section('content')


  @include('inc.album-nav')
 <div class="responsive">
   <div>
  <h1 class="album-title-main">アルバム</h1>
  <p class="album-title">ペットの かわいい
    画像を共有しよう🐶</p>
    
    </div>




  </div>
  <div class="gallery">
    @foreach($albums as $album)
    <div>
      {{-- heroku以外 --}}
    {{-- <img class="thumbnail" src="storage/photos/{{$album->photo}}" alt="{{$album->title}}" width="200" height="300"> --}}

    <img class="thumbnail" src="{{$album->photo}}" alt="" width="200" height="300">
  
    <div class="a-title">{{$album->title}}</div>   
    
    <div class="des">posted: {{ $album->created_at->format('Y.m.d') }}</div>   
  </div>

  {{-- /* 削除ボタン
    
  <a class="card-link" href="{{ route('albums.show', ['album' => $album->id]) }}">
    削除する
  </a>
  */ --}}

  @endforeach
</div>



@endsection