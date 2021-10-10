@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm danh mục truyện') }}</div>
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
                    <form action="{{ route('truyen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên truyện</label>
                            <input type="text" name="tentruyen" value="{{old('tentruyen') }}" onkeyup="ChangeToSlug();" class="form-control" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input type="text" name="tacgia" value="{{old('tacgia') }}"  class="form-control"  aria-describedby="emailHelp" placeholder="Tên tác giả">
                        </div>
                        <div class="form-group">
                            <label>Slug truyện</label>
                            <input type="text" name="slugtruyen" value="{{old('slugtruyen') }}" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện">
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <textarea type="text" value="{{old('tomtat') }}" name="tomtat"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="danhmuc_id" class="browser-default custom-select">
                                @foreach($listdanhmuc as $key => $danhmuc)
                                <option value="{{ $danhmuc->id }}">{{ $danhmuc->tendanhmuc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select name="theloai_id" class="browser-default custom-select">
                                @foreach($listtheloai as $key => $theloai)
                                <option value="{{ $theloai->id }}">{{ $theloai->tentheloai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh truyện</label>
                            <input type="file" name="hinhanh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Truyện nổi bật</label>
                            <select name="truyen_noibat" class="browser-default custom-select">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
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