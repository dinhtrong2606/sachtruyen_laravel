@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liệt kê danh mục truyện') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuc as $key => $row_danhmuc)
                            <tr>
                                <th scope="row">{{ $row_danhmuc->id }}</th>
                                <td>{{ $row_danhmuc->tendanhmuc }}</td>
                                <td>{{ $row_danhmuc->mota }}</td>
                                <td>
                                    @if($row_danhmuc->kichhoat == 0)
                                        <span>Kích hoạt</span>   
                                    @else
                                        <span>Chưa kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('danhmuc.edit', [$row_danhmuc->id]) }}" class="btn btn-primary" >Edit</a>
                                    <form action="{{ route('danhmuc.destroy', [$row_danhmuc->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không ?')" class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection