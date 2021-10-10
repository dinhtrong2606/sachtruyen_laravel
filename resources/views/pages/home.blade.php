@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')
<!----------------sachhay------------------->
<h4 class="mt-3">SÁCH HAY MỚI CẬP NHẬT</h4>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($truyen as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow"> 
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/' .$value->hinhanh) }}" alt="">
                            <div class="card-body">
                                <h5>{{ $value->tentruyen }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('xem-truyen', [$value->slugtruyen]) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>2k</a>
                                    </div>
                                    <small class="text-muted ml-2">{{ $value->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
            <a href="" class="btn btn-success">Xem tat ca</a>
        </div>
        <style>
            .align-items-center small{
                font-size: 10px;
                padding: 5px;
                border-radius: 3px;
                background-color: #83e69d;
            }
        </style>
        
         <!----------------BLogs------------------->
         <h4>Blogs</h4>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                            <div class="card-body">
                                <h3>This is the title story</h3>
                                <p class="cart-text">
                                    Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                                    Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">Doc Ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>54444</a>
                                    </div>
                                    <small class="text-muted">9mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                            <div class="card-body">
                                <h3>This is the title story</h3>
                                <p class="cart-text">
                                    Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                                    Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">Doc Ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>54444</a>
                                    </div>
                                    <small class="text-muted">9mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                            <div class="card-body">
                                <h3>This is the title story</h3>
                                <p class="cart-text">
                                    Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                                    Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">Doc Ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>54444</a>
                                    </div>
                                    <small class="text-muted">9mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/186653-truyen-co-tich47.jpg') }}" alt="">
                            <div class="card-body">
                                <h3>This is the title story</h3>
                                <p class="cart-text">
                                    Tóm tắt truyện ngắn Cố Hương của Lỗ Tấn
                                    Học Tập - Giáo dục » Văn mẫu » Bài văn hay lớp 9
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-outline-secondary">Doc Ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>2k</a>
                                    </div>
                                    <small class="text-muted">9mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection