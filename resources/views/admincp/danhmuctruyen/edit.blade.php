@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cập nhật danh mục truyện') }}</div>
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
                </div>
                <div style="margin-left: 15px">
                    <form action="{{ route('danhmuc.update', [$danhmuc->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="tendanhmuc" value="{{ $danhmuc->tendanhmuc }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Slug danh mục</label>
                            <input type="text" name="slugdanhmuc" value="{{ $danhmuc->slugdanhmuc }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug danh mục">
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <input type="text" name="mota" value="{{ $danhmuc->mota }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <select name="kichhoat" class="browser-default custom-select">
                                @if($danhmuc->kichhoat == 0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection