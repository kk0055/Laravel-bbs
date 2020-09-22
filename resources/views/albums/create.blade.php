@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                写真の投稿
            </h1>

            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" >
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            ひとこと
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

                    {{-- <div class="form-group">
                        <label for="description">
                            本文
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div> --}}
                    <div class="form-group">   
                       
                        <input type="file" name="photo"> 
                
                            </div>
                    <div class="mt-5">
                        <a class="btn" href="/albums" style="color:white;">
                            キャンセル
                        </a>
                  
                        <button type="submit" class="btn">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection