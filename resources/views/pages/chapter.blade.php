@extends('../layout')

@section('content')
<!----------------sachhay------------------->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('xem-theloai', [$danhmuc_new->theloai->slugtheloai]) }}">{{ $danhmuc_new->theloai->tentheloai }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('danh-muc', [$danhmuc_new->danhmuctruyen->slugdanhmuc]) }}">{{ $danhmuc_new->danhmuctruyen->tendanhmuc }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('xem-truyen', [$chapter->truyen->slugtruyen]) }}">{{ $chapter->truyen->tentruyen }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $chapter->tenchapter }}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ $chapter->truyen->tentruyen }}</h3>
                <p>Chương hiện tại: {{ $chapter->tenchapter }}</p>
            </div>
            <style type="text/css">
                .isDisabled {
                    color: currentColor;
                    pointer-events: none;
                    opacity: 0.5;
                    text-decoration: none;
                }
            </style>
            <div class="col-md-5">
                <div class="form-group">
                    <p><a href="{{ url('xem-chapter/'. $previous_chapter) }}" class="btn btn-primary {{ $chapter->id==$min_id->id ? 'isDisabled' : ''}}">Tập trước</a></p>
                    <label>Chon Chuong</label><br>
                    <select id="select-chuong" class="custom-select" name="" id="">
                        @foreach($all_chapter as $key => $chuong)
                        <option value="{{ route('xem-chapter', [$chuong->slugchapter]) }}">{{ $chuong->tenchapter }}</option>
                        @endforeach
                    </select>
                    <p><a href="{{ url('xem-chapter/'. $next_chapter) }}" class="btn btn-primary {{ $chapter->id==$max_id->id ? 'isDisabled' : '' }} mt-4">Tập sau</a></p>
                </div>
            </div>
        </div>
        <div class="noidungchuong">
            <p>{!! $chapter->noidung !!}</p>
        </div>
        <div class="form-group">
            <label>Chon Chuong</label><br>
            <select style="width: 20.5rem;" id="select-chuong" class="custom-select" name="" id="">
                @foreach($all_chapter as $key => $chuong)
                <option value="{{ route('xem-chapter', [$chuong->slugchapter]) }}">{{ $chuong->tenchapter }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <h4>Sach cung danh muc</h4>
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                    <div class="card-body">
                        <h5>This is the title story</h5>
                        <p class="cart-text">
                            Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                            Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                    <div class="card-body">
                        <h5>This is the title story</h5>
                        <p class="cart-text">
                            Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                            Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection