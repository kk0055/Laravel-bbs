@extends('layout')

@section('content')
<header class="header">
  <div class="container mt-3">
    <div class="head-title">
      <h1 class="title"> </h1>
      <h2>相談コーナー</h2>   
      <h4 class="mt-3 head-des"> 相談ごとはここに書こう <span><img  class="img-top" src="https://image.freepik.com/free-vector/cute-siberian-husky-dog-paws-up-wall-cartoon_42750-520.jpg" alt="Smiling shiba inu dog face flat design Premium Vector" width="70px"></span></h4>  
   

       
            {{-- <div class="row">
                <div class="menu ">
                  <button class="btn btn-album btn-sm ">
                    <a href="/">ホーム</a>
                   </button>
                  <button class="btn btn-album btn-sm  ">
             <a href="/albums">アルバム</a>
            </button> --}}
          

             {{-- <button class="btn btn-album btn-sm mr-3">
              <a href="/consultation">相談ごと</a>
             </button> --}}

             <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button " data-text="マレーシア ペットちゃんねる" > </a>
             {{-- <a href="https://twitter.com/share?ref_src=twsrc%5Etfw"target="_blank" >
              <img src="https://noode.info/images/icon_twitter.png" alt="ツイッターでこのサイトをシェアする" title="ツイッターでこのサイトをシェアする" class="twitter-share-button " data-text="マレーシア ペットちゃんねる" width="30" height="30">
             </a>  --}}
             
          </div>
            </div>
          
        </div>
        
  </div>
  
</header>
@include('inc.nav')

    <div class="container-posts">
      <div class="mb-4">
        <div class="container mt-4">
            <div class="border p-4">
                <h1 class="h5 mb-2">
                    相談する
                </h1>
    
                <form method="POST" action="{{ route('consultation.store') }}" enctype="multipart/form-data" >
                    @csrf
    
                    <fieldset class="mb-4">
                        <div class="form-group">
                            <label for="title">
                                タイトル
                            </label>
                            <input
                                id="title"
                                name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('title') }}"
                                type="text"
                            >
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
    
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
                        {{-- <div class="form-group">   
                    
                            <input type="file" name="cover_image"> 
                    
                                </div> --}}
                        <div class="mt-2">
                            <a class="btn btn-secondary" href="{{ route('consultation') }}">
                                キャンセル
                            </a>
                      
                            <button type="submit" class="btn btn-primary"style="color:white;">
                                投稿する
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
      </div>
      {{-- Post --}}
      
      <div class="container mt-4">
        <div class="d-flex justify-content-center mb-2 mt-2">
            {{ $posts->links() }}
        </div>
            @foreach ($posts as $post)
                <div class="card mb-4">
                
              {{-- Body --}}
             
            
           
               

                
                    <div class="card-body box">

                      {{ $post->title }} |
                        投稿日時 : {{ $post->created_at->format('Y/m/d H:i') }}
                        <h6 class="card-text mt-3">
                            @if (strpos($post->body,'http') !== false)
                            <a href="{{$post->body }} " target="_blank">{{$post->body }}</a>   
                        </h6>
                    {{-- <p class="card-text">
                            @elseif (strpos($post->body,'youtube') !== false)
                            <iframe width="560" height="315" src="{{$post->body }}" frameborder="0"  allowfullscreen></iframe>
                        </p> --}}
                      @else
                      <div class="card-text">
                        <h6>{{$post->body }}</h6> 
                    </div>
                        
                @endif
                @if (strpos($post->cover_image,'noimage') !== false)
                <div class="posted-img-div-none"  >
                  
                    </div>
                    @else
           <div class="posted-img-div" >
           <img width="30%" height="30%" class="posted-img" 
                src="{{$post->cover_image}}" alt="">
           </div>
           @endif
                     <button class="btn btn-sm ">
                  <a class="card-link" href="{{  route('consultation.show', ['consultation' => $post]) }}">
                   <span>コメントする</span>   
                </a>
                </button>
                @if ($post->comment_to_consultations->count())
                <span class="badge badge-info ml-2">
                    <a class="card-link" href="{{  route('consultation.show', ['consultation' => $post]) }}" style="color:white;">
                    コメント {{ $post->comment_to_consultations->count() }}件
                 </a>
                </span>
            @endif
                </div>


            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5 mt-3">
            {{ $posts->links() }}
        </div>
       </div>
    
</div>

@include('inc.footer')

@endsection
