@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Liệt kê truyện') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Hình ảnh</th>
                                <th style="width: 9%;" scope="col">Tóm tắt</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th style="width: 13%;" scope="col">Truyện nổi bật</th>
                                <th style="width:11%;" scope="col">Kích hoạt</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuc as $key => $row_truyen)
                            <tr>
                                <th scope="row">{{ $row_truyen->id }}</th>
                                <td>{{ $row_truyen->tentruyen }}</td>
                                <td>{{ $row_truyen->tacgia }}</td>
                                <td><img src="{{ asset('public/uploads/truyen/'.$row_truyen->hinhanh) }}" width="150"
                                        height="100" alt=""></td>
                                <td>{{ $row_truyen->tomtat }}</td>
                                <td>{{ $row_truyen->danhmuctruyen->tendanhmuc }}</td>
                                <td>{{ $row_truyen->theloai->tentheloai }}</td>
                                <td>{{ $row_truyen->created_at }} - {{ $row_truyen->created_at->diffForHumans() }}</td>
                                <td>{{ $row_truyen->updated_at }} - {{ $row_truyen->updated_at->diffForHumans() }}</td>
                                <td>
                                    @if($row_truyen->truyen_noibat == 0)
                                    <form>
                                        @csrf
                                        <select name="truyen_noibat" data-truyen_id="{{$row_truyen->id}}"
                                            class="browser-default custom-select truyennoibat">
                                            <option value="0" selected>Truyện mới</option>
                                            <option value="1">Truyện nổi bật</option>
                                            <option value="2">Truyện xem nhiều</option>
                                        </select>
                                    </form>
                                    @elseif($row_truyen->truyen_noibat == 1)
                                    <form>
                                        @csrf
                                        <select name="truyen_noibat" data-truyen_id="{{$row_truyen->id}}"
                                            class="browser-default custom-select truyennoibat">
                                            <option value="0">Truyện mới</option>
                                            <option value="1" selected>Truyện nổi bật</option>
                                            <option value="2">Truyện xem nhiều</option>
                                        </select>
                                    </form>
                                    @else
                                    <form>
                                        @csrf
                                        <select name="truyen_noibat" data-truyen_id="{{$row_truyen->id}}"
                                            class="browser-default custom-select truyennoibat">
                                            <option value="0">Truyện mới</option>
                                            <option value="1">Truyện nổi bật</option>
                                            <option value="2" selected>Truyện xem nhiều</option>
                                        </select>
                                    </form>
                                    @endif
                                    </select>
                                </td>
                                <td>
                                    @if($row_truyen->kichhoat==0)
                                    <form>
                                        @csrf
                                        <select name="kichhoat" data-truyen_id="{{$row_truyen->id}}"
                                            class="browser-default custom-select kichhoat">
                                            <option value="0" selected>Kích hoạt</option>
                                            <option value="1">Không kích hoạt</option>
                                        </select>
                                    </form>
                                    @else
                                    <form>
                                        @csrf
                                        <select name="kichhoat" data-truyen_id="{{$row_truyen->id}}"
                                            class="browser-default custom-select kichhoat">
                                            <option value="0" selected>Kích hoạt</option>
                                            <option value="1">Không kích hoạt</option>
                                        </select>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('truyen.edit', [$row_truyen->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('truyen.destroy', [$row_truyen->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có thực sự muốn xóa truyện này không ?')"
                                            class="btn btn-danger">Delete</button>
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