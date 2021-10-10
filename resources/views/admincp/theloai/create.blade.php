@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm thể loại truyện') }}</div>
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
                    <form action="{{ route('theloai.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên thể loại</label>
                            <input type="text" name="tentheloai" value="{{old('tentheloai') }}" onkeyup="ChangeToSlug();" class="form-control" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="form-group">
                            <label>Slug thể loại</label>
                            <input type="text" name="slugtheloai" value="{{old('slugtheloai') }}" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại">
                        </div>
                        <div class="form-group">
                            <label>Mô tả thể loại</label>
                            <input type="text" value="{{old('mota') }}" name="mota"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
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