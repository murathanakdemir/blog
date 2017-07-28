@extends('layouts.master')
@section('icerik')
    <header class="intro-header" style="background-image:url('{{asset('uploads/'.$kategori->resim->isim)}}'); background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1>{{$kategori->baslik}}</h1>
                        <span class="meta">Makaleler</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($makaleler as $makale)
                    <div class="post-preview">
                        <a href="/yayinlanan-makale/{{$makale->slug}}">
                            <h2 class="post-title">
                                {{$makale->baslik}}
                            </h2>
                        </a>

                        <p class="post-meta">{{$makale->user->name}} tarafından {{$makale->created_at->formatLocalized('%A %d %B %Y - %H:%M')}} tarihinde yayınlandı.</p>
                    </div>
                    <hr>
            @endforeach
            <!-- Paginate -->
                <div class="text-center">
                    {{$makaleler->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection