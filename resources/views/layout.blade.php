<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        .switch_color{
            background-color: #181818 !important;
            color: #fff;
        }
        .switch_color_light{
            background-color: #181818 !important;
            color: #000;
        }
        .noidung_color{
            background: #fff !important;
            color: #000;
        }
        .navbar-brand b{
            font-size: 33px;
            color: blueviolet;
        }
    </style>

    <!-- Styles -->
</head>

<body>
    <div class="container">
        <!------------Menu-------------->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}"><b>Sachtruyen.com</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="color: chocolate;" class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a style="color: chocolate;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($danhmuc as $key => $row_danhmuc)
                            <a class="dropdown-item" href="{{ route('danh-muc', [$row_danhmuc->slugdanhmuc]) }}">{{ $row_danhmuc->tendanhmuc }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: chocolate;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($theloai as $key => $row_theloai)
                            <a class="dropdown-item" href="{{ route('xem-theloai', [$row_theloai->slugtheloai]) }}">{{ $row_theloai->tentheloai }}</a>
                            @endforeach
                        </div>
                    </li>
                    <select class="custom-select mr-sm-2" id="switch_color">
                        <option value="xam">Xám</option>
                        <option value="den">Đen</option>
                    </select>
                </ul>
                <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{ route('tim-kiem') }}" method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="tukhoa" id="keywords" placeholder="Tìm kiếm tác giả, truyện..." aria-label="Search">
                    <div id="search_ajax"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </nav>

        <!----------------Slide------------------->
        @yield('slide')
        <!----------------sach hay------------------->
        @yield('content')
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a href="#">Back to top</a>
                </p>
                <p>Album are example...</p>
                <p>sadasdsaa<a href="#">asdasdsad</a></p>
            </div>
        </footer>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="MHX0G19e"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="Ay9SGpph"></script>
    <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            if(localStorage.getItem('switch_color')!==null){
                const data = localStorage.getItem('switch_color');
                const data_obj = JSON.parse(data);
                $(document.body).addClass(data_obj.class_1);
                $('.album').addClass(data_obj.class_2);
                $('.btn-outline-secondary').addClass(data_obj.class_1);
                $('.navbar').addClass(data_obj.class_1);
                $('.mt-2').addClass(data_obj.class_1);
                $('.card-body').addClass(data_obj.class_1);
                $('ul.mucluctruyen > li > a').css('color', '#3280e6');
                $('.sidebar > a').css('color', '#fff');

                $("select option[value='den']").attr("selected", "selected");
            }

            $('#switch_color').change(function(){
                
                $(document.body).toggleClass('switch_color');
                $('.album').toggleClass('switch_color_light');
                $('.card-body').toggleClass('switch_color');
                $('.navbar').toggleClass('switch_color');
                $('.mt-2').toggleClass('switch_color');
                $('.btn-outline-secondary').toggleClass('switch_color');
                $('.noidungchuong').addClass('noidung_color');
                $('ul.mucluctruyen > li > a').css('color', '#3280e6');

                if($(this).val() == 'den'){
                    
                    var item = {
                        'class_1': 'switch_color',
                        'class_2': 'switch_color_light'
                    }
                    localStorage.setItem('switch_color', JSON.stringify(item));
                }else if($(this).val() == 'xam'){
                    localStorage.removeItem('switch_color');
                    $('ul.mucluctruyen > li > a').css('color', '#3280e6');
                }
            });
        });
    </script>
    <script>
        show_wishlist();
        function show_wishlist(){
            if(localStorage.getItem('wishlist_truyen')!=null){
                var data = JSON.parse(localStorage.getItem('wishlist_truyen'));

                data.reverse();

                for(i=0;i<data.length;i++){

                    var title = data[i].title;
                    var img = data[i].img;
                    var id = data[i].id;
                    var url = data[i].url;

                    $('#yeu-thich').append(`
                    <div class="row mt-2">
                        <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`"></div>

                        <div class="col-md-7 sidebar">
                            <a href="`+url+`">
                            <p style="color:#666">`+title+`</p>
                            </a>
                        </div>
                    </div>
                `);
                }
            }
        }

        $('.btn-thich_truyen').click(function(){
            
            $('.fa.fa-heart').css('color', '#fac');

            const id = $('.wishlist_id').val();
            const title = $('.wishlist_title').val();
            const img = $('.card-img-top').attr('src');
            const url = $('.wishlist_url').val();

            const item = {
                'id': id,
                'title': title,
                'img' : img,
                'url' : url
            }
            
            if(localStorage.getItem('wishlist_truyen')==null){
                localStorage.setItem('wishlist_truyen', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })
            if(matches.length){
                alert('Truyện đã có trong danh sách yêu thích !');
            }else{
                if(old_data.length<=10){
                    old_data.push(item);
                }else{
                    alert('Đã đạt tới giới hạn lưu truyện yêu thích');
                }
                $('#yeu-thich').append(`
                    <div class="row mt-2">
                        <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`"></div>

                        <div class="col-md-7 sidebar">
                            <a href="`+url+`">
                            <p style="color:#666">`+title+`</p>
                            </a>
                        </div>
                    </div>
                `);

                localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                alert('Đã lưu vào danh sách truyện yêu thích');

            }
            localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                // nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var keywords = $(this).val();
            if (keywords != '') {

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "POST",
                    data: {
                        keywords: keywords,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script type="text/javascript">
        $('#select-chuong').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.location = url;
            } else {
                return false;
            }
        });

        current_chapter();

        function current_chapter() {
            var url = window.location.href;

            $('.custom-select').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>

</body>

</html>
<script src="{{ url('js/app.js') }}" defer></script>
<script type="text/javascript" src="{{ url('js/owl.carousel.min.js') }} " defer></script>