<!----------------Slide------------------->
<h3>SÁCH HAY NÊN ĐỌC</h3>
        <div class="owl-carousel owl-theme">
            @foreach($truyen as $key => $row)
            <div class="item">
                <img src="{{ asset('public/uploads/truyen/'. $row->hinhanh) }}" alt="">
                <a href="{{ route('xem-truyen', [$row->slugtruyen]) }}"><h4 class="mt-2">{{ $row->tentruyen }}</h4></a>
                <p><i class="fa fa-eye"></i>2k</p>
                <a href="{{ route('xem-truyen', [$row->slugtruyen]) }}" class="btn btn-danger btn-sm">Đọc ngay</a>
            </div>
            @endforeach
        </div>
        <style>
            .item a{
                text-decoration: none;
                color: #181818;
            }
        </style>