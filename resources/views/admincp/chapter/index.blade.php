@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Liệt kê chapter truyện') }}</div>

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
                                <th scope="col">Tên chapter</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Tóm tăt</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chaptertruyen  as $key => $chapter)
                            <tr>
                                <th scope="row">{{ $chapter->id }}</th>
                                <td>{{ $chapter->tenchapter }}</td>
                                <td>{{ $chapter->truyen->tentruyen }}</td>
                                <td>{{ $chapter->tomtat }}</td>
                                <td>{!! $chapter->noidung!!}</td>
                                <td>
                                    @if($chapter->kichhoat == 0)
                                        <span>Kích hoạt</span>   
                                    @else
                                        <span>Chưa kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                <a href="{{ route('chapter.edit', [$chapter->id]) }}" class="btn btn-primary" >Edit</a>
                                    <form action="{{ route('chapter.destroy', [$chapter->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có thực sự muốn xóa Chapter truyện này không ?')" class="btn btn-danger" >Delete</button>
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