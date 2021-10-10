@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cập nhật truyện') }}</div>
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
                    <form action="{{ route('truyen.update', [$edittruyen->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên truyện</label>
                            <input type="text" name="tentruyen" value="{{ $edittruyen->tentruyen }}" onkeyup="ChangeToSlug();" class="form-control" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="form-group">
                            <label>Tên tác giả</label>
                            <input type="text" name="tacgia" value="{{ $edittruyen->tacgia }}"  class="form-control"  aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="form-group">
                            <label>Slug truyện</label>
                            <input type="text" name="slugtruyen" value="{{ $edittruyen->slugtruyen }}" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt truyện</label>
                            <textarea type="text" name="tomtat"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $edittruyen->tomtat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="danhmuc_id" class="browser-default custom-select">
                                @foreach($danhmuc as $key => $muc)
                                    <option value="{{ $muc->id }}" {{ $edittruyen->danhmuc_id==$muc->id ? 'selected': '' }}>{{ $muc->tendanhmuc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select name="theloai_id" class="browser-default custom-select">
                                @foreach($theloai as $key => $muc)
                                    <option value="{{ $muc->id }}" {{ $edittruyen->theloai_id==$muc->id ? 'selected': '' }}>{{ $muc->tentheloai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh truyện</label>
                            <input type="file" name="hinhanh" class="form-control">
                            <img src="{{ asset('public/uploads/truyen/'.$edittruyen->hinhanh) }}" width="150" height="100" alt="">
                        </div>
                        <div class="form-group">
                            <label>Truyện nổi bật</label>
                            <select name="truyen_noibat" class="browser-default custom-select">
                                @if($edittruyen->truyen_noibat == 0)
                                <option value="0" selected>Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                                @elseif($edittruyen->truyen_noibat == 1)
                                <option value="0" >Truyện mới</option>
                                <option value="1" selected>Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                                @else
                                <option value="0" >Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2" selected>Truyện xem nhiều</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <select name="kichhoat" class="browser-default custom-select">
                                @if($edittruyen->kichhoat == 0)
                                <option value="0" selected>Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option value="1" selected>Không kích hoạt</option>
                                @endif
                                
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