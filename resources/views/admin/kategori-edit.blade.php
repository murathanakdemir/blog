@extends('layouts.master')
@section('icerik')
    <header class="intro-header mavi-back">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Kategori Düzenle</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="m-b-40 text-center">
                            {!! $kategori->thumb !!}
                        </div>
                        {!! Form::model($kategori,['route' => ['kategori.update', $kategori->id],'method'=>'put','files'=>'true']) !!}
                        {!! Form::bsText("baslik","Başlık") !!}
                        {!! Form::bsFile("resim","Resim") !!}
                        {!! Form::bsSubmit("Kaydet") !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

