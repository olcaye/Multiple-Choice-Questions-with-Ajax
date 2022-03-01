<!doctype html>
<html lang="tr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="HandheldFriendly" content="true"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex">
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://kit.fontawesome.com/6174b7fffd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>
<body{{-- data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-offset="165" tabindex="0"--}}>
<div style="max-width: 1620px;margin: auto;padding-bottom: 150px;">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 g-0">
                    <div id="header-content">
                        <div id="header-content-left" style="margin-left: 9%;">
                            <a class="navbar-brand" href="{{ route('home') }}" >
                                <img src="{{asset("images/logo.png")}}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div id="header-content-right">
                            <div class="ui-menu position-relative">
                                <ul class="nav justify-content-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Rakiplerimiz</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Profesyoneller İçin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">İletişim</a>
                                    </li>
                                    <li class="nav-item dropdown" id="language-item">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">TR</a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">EN</a></li>
                                            <li><a class="dropdown-item" href="#">DE</a></li>
                                            <li><a class="dropdown-item" href="#">FR</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" id="profileIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{asset('images/login.png')}}" alt="">
                                        </a>
                                        @guest
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileIcon">
                                                <li><a class="dropdown-item" href="">Giriş Yapın</a></li>
                                            </ul>
                                        @endguest
                                        @auth
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileIcon">
                                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                                <li><a class="dropdown-item" href="#">Çıkış</a></li>
                                            </ul>
                                        @endauth
                                    </li>
                                </ul>
                                <div id="searchButton" class="position-absolute" style="">
                                    <img src="{{asset('images/search.png')}}" alt="" class="img-fluid" style="margin-bottom: 10px">
                                    <form action="">
                                        <input class="form-control d-inline" type="text" id="searchArea" name="keyword" placeholder="Ne aramak istiyorsunuz?" >
                                    </form>
                                </div>
                                {{-- <div id="searchInput" class="position-absolute" style="right: -95px; top: 55px;">

                                 </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div>
        <section class="container-fluid" id="item-1">
            <section class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide)
                        <div class="swiper-slide">
                            <div class="swiper-carousel">
                                <div class="slide-content col-3">
                                    <div class="slide-content-wrapper d-flex h-100">
                                        <div class="slide-left-side">
                                            <div class="slide-title">
                                                <span>{{ $slide->title }}</span>
                                            </div>
                                            <div class="slide-social-share">
                                                <ul class="nav justify-content-end nav-fill">
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link" href="#"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                                                    </li>
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link" href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                                                    </li>
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="slide-right-side" style="">
                                            <div class="slide-huge-slogan" id="huge-slogan">
                                                <span>{{ $slide->slogan }}</span>
                                            </div>
                                            <div class="slide-description">
                                                {{ $slide->description }}
                                            </div>
                                        </div>
                                        <div class="position-absolute" style="right: 35px;bottom: 80px;">
                                            <img src="{{ asset('images/ico_art.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    @if($slide->type == "image")
                                    <div  class="slide-image" style="width: 100%;
                                        height: 100%;
                                        background-position: center center;
                                        background-repeat: no-repeat;
                                        background-size: 100% 100%; background-image: url({{ $slide->url }})">
                                    </div>
                                    @endif
                                    @if($slide->type == "youtube")
                                        <div class="slide-video" style="position: relative">
                                            <iframe id="youtube-iframe" src="https://www.youtube.com/embed/{{ $slide->url }}?enablejsapi=1&controls=0&autoplay=1" frameborder="0" enablejsapi="true"></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </section>
            <div class="survive-pagination"></div>
        </section>
        <section id="item-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h1 style="font-size: 60px">Popüler Testler</h1>
                            </div>
                        </div>
                        @foreach ($posts as $post)
                            <div class="card mb-5" style="">
                                <div class="row no-gutters g-0 align-items-center">
                                    <div class="col-md-5">
                                        <img src="{{ $post->image }}" class="img-fluid rounded" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h5 class="card-title" data-post-id="{{ $post->id }}">{{ $post->title }}</h5>
                                            <p class="card-text mt-3">{{ $post->description }}</p>
                                            <p class="card-text withLink"><a class="text-decoration-none" href="javascript:void(0)" data-post-id='{{ $post->id }}' onclick="checkPost({{ $post->id }});">
                                                    <img src="{{ asset('images/cross.png') }}" alt="" class="me-3">
                                                     SINANMAK İÇİN TIKLA</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="offset-1 col-4">
                        <div class="card singleArticle">
                            <div class="articleTop" style="position: relative">
                                <img src="{{asset('images/shoes.png')}}" class="card-img-top" alt="...">
                                <span class="huge-title">DAYANIKLILIK</span>
                                <span class="beauty-text">Test</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 60px;font-weight: 600;">Görev</h5>
                                <p class="card-text" style="font-family:'Teko';font-size: 36px; font-weight: 600; line-height: 1">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy tempor.</p>
                                <p class="card-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                <p class="card-text withLink"><a class="text-decoration-none" href="javascript:void(0)" onclick="fetchTest({{ $post->id }});">
                                        <img src="{{ asset('images/cross.png') }}" alt="" class="me-3"> SINANMAK İÇİN TIKLA</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid d-none" style="padding-bottom: 120px" id="questionArea">
            <div id="post-title">
                <h3></h3>
            </div>
            <form class="clearfix questions-form">
                @csrf
                <input type="hidden" value="" name="post-id" id="post-id">
                <div class="swiper swiperQuestions" id="fetch-questions">
                    <div class="swiper-wrapper">
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <button type="submit" class="btn btn-outline-success float-end" style="width: 25%;height: 60px;font-size: 26px;">Testi Tamamla</button>
            </form>

        </div>
        <div class="container-fluid d-none" id="testResult">
            <div class="row">
                <div class="col-4 position-relative">
                    <div class="d-flex flex-column justify-content-center h-100" style="line-height: 1;padding: 0 40px;">
                        <p style="font-size: 35px; font-weight: 600;text-transform: uppercase">hayatta kalma ihtimalin</p>
                        <p style="font-size:230px; font-weight: 600;color:#E4003B"><span id="textResultAsPercentage"></span>%</p>
                        <p style="font-size: 60px; font-weight: 600"><span id="numberOfCorrectAnswers" style="color:#E4003B"></span> soruyu</p>
                        <p style="font-size: 60px; font-weight: 600">doğru bildin</p>
                    </div>
                    <div class="position-absolute" style="top: 80px;right: 0;z-index: -9;">
                        <div style="font-size: 160px; font-weight: 600; color: white;text-transform: uppercase;-ms-writing-mode: tb-lr;
    writing-mode: vertical-lr;
    -webkit-transform: rotate(180deg);">test sonucun</div>
                    </div>

                </div>
                <div class="col-8">
                    <div id="result-image" style="width: 100%;
                        height: 100%;
                        border-radius: 10px;
                        min-height: 1000px;
                        background-position: center center;
                        background-repeat: no-repeat;
                        background-size: 100% 100%;">
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bu Testi Zaten Tamamladınız.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"></li>
                            <li class="list-group-item">Başarı Oranınız: <span id="successRate"></span> </li>
                            <li class="list-group-item">Doğru Cevap Sayınız: <span id="correctAnswers"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="https://www.youtube.com/player_api"></script>
<script>
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: true
    });

    $(document).delegate('form', 'submit', function(event) {
        $.ajax({
            type : 'POST',
            data: $(this).serialize(),
            url :  "{{ route('checkAnswers')}}",
            success: function(response) {
                $('#textResultAsPercentage').html(response['successRate']);
                $('#numberOfCorrectAnswers').html(response['totalCorrect']);
                $('#result-image').css('background-image', 'url("' + response['resultImage'] + '")');
                $("#questionArea").addClass('d-none');
                $("#testResult").removeClass('d-none');
            }
        });
        return false;
    });

    function checkPost(id) {
        $.ajax({
            type: "GET",
            dataType : "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url : "{{ route('isCompleted', '')}}" + "/" +id,
            success: function(response) {
                console.log(response);
                let isCompleted = false;
                if(response['data']) {
                    const dataLength = response['data'].length;
                    for(let i = 0; i < dataLength; i++) {
                        if(id === response['data'][i]['postID']) {
                            $('#successRate').html(response['data'][i]['successRate']);
                            $('#correctAnswers').html(response['data'][i]['totalCorrect']);
                            isCompleted = true;
                            myModal.show();
                        }
                    }
                }

                if(!isCompleted) {
                    fetchTest(id);
                }
            }
        });
        return false;
    }


    let settings = {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + "</span>";
            },
        },
    }

    let mySwiper = new Swiper(".swiperQuestions", settings);

    function fetchTest(id) {
        $.ajax({
            type: "GET",
            dataType : "json",
            async: false,
            contentType: "application/json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('questions', '')}}" + "/" +id,
            success: function (response) {

                if(!$('#testResult').hasClass('d-none')) {
                    $("#testResult").addClass('d-none')
                }

                let swiperWrapper = $('.swiperQuestions .swiper-wrapper');
                let pagination = $('.swiperQuestions .swiper-pagination');
                pagination.html('');
                mySwiper.destroy();

                swiperWrapper.attr('style', '');
                swiperWrapper.empty();

                mySwiper = new Swiper('.swiperQuestions', settings);



                $('input#post-id').val(id);
                $('#post-title h3').html($('*[data-post-id="'+id+'"]').text());

                $("#questionArea").removeClass('d-none')


                if (!$('#fetch-questions').isInViewport()) {
                    $('html, body').stop().animate({
                        scrollTop: $("#fetch-questions").offset().top
                    }, 'fast');
                }


                let num_rows = response['questions'].length;
                let answersArr = [];
                let answers = [];
                let questionID, question, content, answers_num_rows, questionEl;
                function uniqueName(questionID, answerID) {
                    return "p"+id+"-q"+questionID+"-a"+answers[j].id+"";
                }
                for(var i = 0; i < num_rows ; i++) {

                    questionID = response['questions'][i]['id'];

                    answers = response['questions'][i]['answers'];

                    answers_num_rows = answers.length;

                    question = response['questions'][i]['question'];

                    for (var j = 0; j < answers_num_rows; j++) {
                        questionEl =
                            "<div class='form-check text-start mb-3'>" +
                            "<input class='form-check-input' type='radio' name='"+ questionID +"' value='"+answers[j].id+"' id='" +uniqueName(questionID,answers[j].id)+"'>" +
                            "<input type='hidden' name=''>" +
                            "<label class='form-check-label' for='" +uniqueName(questionID,answers[j].id)+"'>" +
                            answers[j].answer +
                            "</label></div>";
                        answersArr.push(questionEl);
                    }
                    content =
                        "<div class='swiper-slide flex-column mb-3'>" +
                        "<h3>Soru " + (i+1) + "- " + question + "</h3>" +
                        "<div class='answerList'>"+ answersArr.join('') + "</div"+
                        "</div>";
                    /*$( "#fetch-questions .swiper-wrapper" ).append(content);*/

                    swiperWrapper.append(content);

                    answersArr.splice(0, answersArr.length);
                }
            }
        });
        return false;
    }



</script>
</body>
</html>
