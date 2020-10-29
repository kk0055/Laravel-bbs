@extends('layout')

@section('content')
@include('inc.nav')
 
        <div class="row d-flex justify-content-center">
            <div class="col-xs">
             
              <a class="twitter-timeline " href="https://twitter.com/malaysia_pet?ref_src=twsrc%5Etfw">Tweets </a>   
    </div> 
    </div> 

{{-- @foreach ($results as $item)
    
{{ $item }}
@endforeach --}}
    

        {{-- @if (!empty($result))
        @foreach ($result as $key => $tweet)
        <div class="well">
        <h3>{{$tweet->id}}</h3>
          
        
        @endforeach
      @else
          <p>No Tweet found</p>
     
          
      @endif
            <div class="card mb-2">
                <div class="card-body">
                    <div class="media">
                        <img src="https://placehold.jp/70x70.png" class="rounded-circle mr-4">
                        <div class="media-body">
                         
                       <h5 class="d-inline mr-3"><strong> {{ $tweet->user->name }} </strong></h5>
                             <h6 class="d-inline text-secondary">{{ date('Y/m/d', strtotime($tweet->created_at)) }}</h6>
                            <p class="mt-3 mb-0">{{ $tweet->text }}</p>    --}}

                         {{-- </div>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0">
                    <div class="d-flex flex-row justify-content-end">
                        <div class="mr-5"><i class="far fa-comment text-secondary"></i></div>
                        <div class="mr-5"><i class="fas fa-retweet text-secondary"></i></div>
                        <div class="mr-5"><i class="far fa-heart text-secondary"></i></div>
                    </div>
                </div>
            </div>
          
        
        @endforeach 
    </div> --}} 

@endsection
