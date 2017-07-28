@extends('layouts.master')
@section('icerik')
    <header class="intro-header mavi-back">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Makale Ekle</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::open(['url'=>'/makalelerim','method'=>'post', 'files'=>'true']) !!}
                        {!! Form::bsText("baslik","Başlık") !!}
                        {!! Form::bsSelect("kategori_id","Kategori",null,$kategoriler,'Lütfen kategori seçiniz') !!}
                        {!! Form::bsFile("resim","Resim") !!}
                        {!! Form::bsTextarea("icerik","İçerik",null,['class'=>'summernote']) !!}
                        {!! Form::bsSubmit("Kaydet") !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

