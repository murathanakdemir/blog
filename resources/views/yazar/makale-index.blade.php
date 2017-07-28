@extends('layouts.master')
@section('icerik')
    <header class="intro-header mavi-back">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Makalelerim</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Durum</th>
                    <th>Resim</th>
                    <th>Başlık</th>
                    <th>Slug</th>
                    <th>Kategori</th>
                    <th>Yayınlanma</th>
                    <th>Eylem</th>
                </tr>
                </thead>
                <tbody>
                @foreach($makaleler as $makale)
                    <tr>
                        <td>{{($makale->durum==1)?"Yayında":"Yayında Değil"}}</td>
                        <td>{!! $makale->thumb !!}</td>
                        <td>{{$makale->baslik}}</td>
                        <td>{{$makale->slug}}</td>
                        <td>{{$makale->kategori->baslik}}</td>
                        <td>{{$makale->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/makalelerim/{{$makale->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/makalelerim/{{$makale->id}}" data-method="delete" data-confirm="Emin Misiniz?" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">{{$makaleler->links()}}</div>
            </div>
        </div>
    </div>
@endsection

