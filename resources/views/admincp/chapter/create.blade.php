@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm Chapter truyện') }}</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
                <div style="margin-left: 15px">
                    <form action="{{ route('chapter.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Chapter</label>
                            <input type="text" name="tenchapter" value="{{old('tenchapter') }}" onkeyup="ChangeToSlug();" class="form-control" id="slug" aria-describedby="emailHelp" placeholder="Tên chapter">
                        </div>
                        <div class="form-group">
                            <label>Slug truyện</label>
                            <input type="text" name="slugchapter" value="{{old('slugchapter') }}" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chapter">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt </label>
                            <textarea type="text" name="tomtat"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{old('tomtat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label> Nội dung </label>
                            <textarea type="text" id="noidung_chapter" name="noidung"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{old('noidung') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Truyện</label>
                            <select name="truyen_id" class="browser-default custom-select">
                                @foreach($truyen as $key => $story)
                                <option value="{{ $story->id }}">{{ $story->tentruyen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <select name="kichhoat" class="browser-default custom-select">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection