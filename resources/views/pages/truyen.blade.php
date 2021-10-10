@extends('../layout')

@section('content')
<!----------------sachhay------------------->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('danh-muc', [$truyen->danhmuctruyen->slugdanhmuc]) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $truyen->tentruyen }}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3"> <img class="card-img-top" src="{{ asset('public/uploads/truyen/'. $truyen->hinhanh) }}" alt=""></div>
            <div class="col-md-9">
                <style type="text/css">
                    .infotruyen {
                        list-style: none;
                    }

                    .mucluctruyen {
                        list-style: none;
                    }
                </style>
                <ul class="infotruyen">
                    <!------------------Lay bien wistlist --------------->
                    <input type="hidden" class="wishlist_id" value="{{$truyen->id}}">
                    <input type="hidden" class="wishlist_url" value="{{\URL::current()}}">
                    <input type="hidden" class="wishlist_title" value="{{$truyen->tentruyen}}">
                    <!------------------End bien wistlist --------------->
                    <li>Tên truyện: {{ $truyen->tentruyen }}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục truyện: <a class="theloai" href="{{ route('danh-muc', [$truyen->danhmuctruyen->slugdanhmuc]) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a></li>
                    <li>Thể loại truyện: <a class="theloai" href="{{ route('xem-theloai', [$truyen->theloai->slugtheloai]) }}">{{ $truyen->theloai->tentheloai }}</a></li>
                    <li>Số chapter: 5</li>
                    <li>Số lượt xem: 200</li>
                    <li><a href="#">Xem mục lục</a></li>
                    @if($chapter_first)
                    <li><a href="{{ route('xem-chapter', [$chapter_first->slugchapter]) }}" class="btn btn-primary">Đọc Truyện</a>
                        <button class="btn btn-danger btn-thich_truyen"><i class="fa fa-heart" aria-hidden="true"></i> Thích truyện</button>
                    </li>
                    @else
                    <p class="btn btn-danger">Truyện đang cập nhât chapter</p>
                    @endif
                    @if($chapter_moinhat)
                    <li><a href="{{ route('xem-chapter', [$chapter_moinhat->slugchapter]) }}" class="btn btn-success mt-2">Đọc chương mới nhất</a></li>
                    @else
                    <p class="btn btn-danger">Truyện đang cập nhât chapter</p>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>Sau hơn 20 năm xa cách trở lại quê nhà, nhân vật "tôi" trở lại thăm quê lần cuối để đưa cả gia đình đến nơi khác sinh sống. Chuyến thăm quê đã mang đến cho nhân vật "tôi" nhiều cảm xúc đặc biệt, nhiều hơn cả đó chính là sự xót xa, buồn bã trước sự thay đổi của cảnh vật cũng như con người nơi đây. Cảnh quê thanh bình, giản dị nhưng tươi đẹp trong kí ức của nhà thơ nay đã trở nên xơ xác, tiêu điều đến đau lòng, con người cũng đã đổi khác, không còn vẻ thật thà, chân chất mà trở nên thực dụng, trì độn hơn. Nhuận Thổ, người bạn thời thơ ấu của nhân vật "tôi" không còn là cậu bé ngây thơ, nhanh nhẹn mà đã trở thành người đàn ông khắc khổ, thực dụng. Nhân vật "tôi" cùng gia đình rời quê hương vào một buổi chiều muộn, "tôi" hi vọng con người, quê hương của mình sẽ có một tương lai tươi sáng hơn.

            </p>
        </div>
        <hr>
        <h4>Mục lục truyện</h4>
        <ul class="mucluctruyen">
            @foreach($chapter as $key => $chuong)
            <li><a href="{{url('xem-chapter/'. $chuong->slugchapter)}}">{{ $chuong->tenchapter }}</a></li>
            @endforeach
        </ul>
        <div id="fb-root"></div>
        <div class="fb-share-button" data-href="{{ \URL::current() }}" data-layout="button_count" data-size="large"><a target="_blank" href="{{ \URL::current() }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
        <div class="fb-comments" data-href="{{ \URL::current() }}" data-width="100%" data-numposts="10"></div>
        <h4>Sách cùng danh mục</h4>
        <div class="row">
            @foreach($cungdanhmuc as $key => $row)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/' .$row->hinhanh) }}" alt="">
                    <div class="card-body">
                        <a href="{{route('xem-truyen', [$row->slugtruyen])}}">
                            <h5>{{$row->tentruyen}}</h5>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <style>
        li .theloai{
            text-decoration: none;
            color: #eb1ae0;
        }
        .mucluctruyen li a{
            text-decoration: none;
            color: #6918b5;
        }
        .card-body a{
            text-decoration: none;
            color: #181818;
        }
        .col-md-7 a{
            text-decoration: none;
            color: #181818;
        }
    </style>
    <div class="col-md-3">
        <h3>Truyện mới</h3>
        @foreach($truyenmoi as $key => $value_theloai)
        <div class="row mt-3">
            <div class="col-md-5">
                <img class="card-img-top" src="{{ asset('public/uploads/truyen/'. $value_theloai->hinhanh) }}" alt="">
            </div>
            <div class="col-md-7">
                <a href="{{route('xem-truyen', [$value_theloai->slugtruyen])}}">
                    <p>{{$value_theloai->tentruyen}}</p>
                </a>
                <p><i class="fa fa-eye"></i>93943</p>
            </div>
        </div>
        @endforeach
        <h3 class="mt-3">Sách truyện yêu thích</h3>
        <div id="yeu-thich"></div>
    </div>
</div>
@endsection