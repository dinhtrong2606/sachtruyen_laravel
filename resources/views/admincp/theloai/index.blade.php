@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liệt kê thể loại truyện') }}</div>

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
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $key => $row_theloai)
                            <tr>
                                <th scope="row">{{ $row_theloai->id }}</th>
                                <td>{{ $row_theloai->tentheloai }}</td>
                                <td>{{ $row_theloai->mota }}</td>
                                <td>
                                    @if($row_theloai->kichhoat == 0)
                                        <span>Kích hoạt</span>   
                                    @else
                                        <span>Chưa kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('theloai.edit', [$row_theloai->id]) }}" class="btn btn-primary" >Edit</a>
                                    <form action="{{ route('theloai.destroy', [$row_theloai->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có thực sự muốn xóa thể loại này không ?')" class="btn btn-danger" >Delete</button>
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