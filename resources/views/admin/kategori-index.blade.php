@extends('layouts.master')
@section('icerik')
    <header class="intro-header mavi-back">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Kategoriler</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="/kategori/create" class="btn btn-success">
                        <i class="fa fa-plus"></i> Kategori Ekle
                    </a>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Slug</th>
                        <th>Eylem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kategoriler as $kategori)
                        <tr>
                            <td>{!! $kategori->thumb !!}</td>
                            <td>{{$kategori->baslik}}</td>
                            <td>{{$kategori->slug}}</td>
                            <td>
                                <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="/kategori/{{$kategori->id}}" data-method="delete" data-confirm="Emin Misiniz?" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">{{$kategoriler->links()}}</div>
            </div>
        </div>
    </div>
@endsection

