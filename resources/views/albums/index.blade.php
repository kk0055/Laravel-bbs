@extends('layout')

@section('content')


  @include('inc.nav')
 <div class="responsive">
   <div>
  <h1 class="album-title">アルバム</h1>
  <p class="album-title">ペットの かわいい
    画像を共有しよう🐶</p>
  </div>
  <div class="gallery">
    @foreach($albums as $album)
    <div>
    <img class="thumbnail" src="storage/photos/{{$album->photo}}" alt="{{$album->title}}" width="200" height="300">
    <div class="a-title">{{$album->title}}</div>   
    
    <div class="des">posted: {{ $album->created_at->format('Y.m.d') }}</div>   
  </div>
  @endforeach
</div>



@endsection