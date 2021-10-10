@extends('../layout')

@section('content')
<!----------------sachhay------------------->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $danhmuc_id->tendanhmuc }}</li>
    </ol>
</nav>
<h4>SÁCH HAY MỚI CẬP NHẬT</h4>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @php
                    $count = count($truyen);
                    @endphp
                    @if($count==0)
                        <div class="col-md-12">
                            <div class="card mb-12 box-shadow">
                                <div class="card-body">
                                    Truyen dang cap nhat
                                </div>
                            </div>
                        </div>
                    @else
                    @foreach($truyen as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow"> 
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/' .$value->hinhanh) }}" alt="">
                            <div class="card-body">
                                <h3>{{ $value->tentruyen }}</h3>
                                <p class="cart-text">
                                {{ $value->tomtat }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('xem-truyen', [$value->slugtruyen]) }}" class="btn btn-sm btn-outline-secondary">Doc Ngay</a>
                                        <a href="" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>54444</a>
                                    </div>
                                    <small class="text-muted">9mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   @endif
                </div>
            </div>
            <a href="" class="btn btn-success">Xem tat ca</a>
        </div>

        
         <!----------------BLogs------------------->
         <h4>Blogs</h4>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($truyen as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" src="{{ asset('public/uploads/truyen/'. $value->hinhanh) }}" alt="">
                            <div class="card-body">
                                <h3>{{ $value->tentruyen }}</h3>
                                <p class="cart-text">
                                {{ $value->tomtat }}
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
                    @endforeach
                </div>
            </div>
@endsection