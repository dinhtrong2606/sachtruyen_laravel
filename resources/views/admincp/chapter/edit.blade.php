@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cập nhật Chapter truyện') }}</div>
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
                    <form action="{{ route('chapter.update', [$chapter->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên Chapter</label>
                            <input type="text" name="tenchapter" value="{{ $chapter->tenchapter }}" onkeyup="ChangeToSlug();" class="form-control" id="slug" aria-describedby="emailHelp" placeholder="Tên chapter">
                        </div>
                        <div class="form-group">
                            <label>Slug chapter</label>
                            <input type="text" name="slugchapter" value="{{ $chapter->slugchapter }}" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug chapter">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt </label>
                            <textarea type="text" name="tomtat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $chapter->tomtat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label> Nội dung </label>
                            <textarea type="text" id="noidung_chapter" name="noidung" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{ $chapter->noidung }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Truyện</label>
                            <select name="truyen_id" class="browser-default custom-select">
                                @foreach($truyen as $key => $story)
                                <option value="{{ $story->id }}" {{ $story->id==$chapter->truyen_id ? 'selected' : '' }}>{{ $story->tentruyen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kích hoạt</label>
                            <select name="kichhoat" class="browser-default custom-select">
                                @if($chapter->kichhoat == 0)
                                <option value="0" selected >Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option value="1" selected>Không kích hoạt</option>
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