@extends('layout')
@section('content')

    <section class="bg-img pt-200 pb-120" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg); background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-80">
                        <h1 class="box-title text-white mb-30">@tt("La formation réseaux sécurité et cybersécurité informatique dédiée aux consultant(e)s/ingénieur(e)s en entreprise")</h1>
                        <br>
                        <br>
                    </div>
                    </div>
                    <div class="col-md-6 col-12">
                            <div class="box box-body p-xl-50 p-30 bg-lightest">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h1 class="mb-15">@tt("Aux entreprises")</h1>
                                        <h4 class="fw-400 " style="text-align: justify">@tt(" Lorsqu'on recrute un consultant, il n'a pas toujours toutes les compétences pour répondre aux missions de vos client. ")</h4>

                                        <h4 class="fw-400" style="text-align: justify">@tt(" LS2EC TRAINING est la solution pour permettre à vos consultants d'être opérationnel sur tous les projets de Réseaux sécurité et cybersécurité informatique.")</h4>

                                        <h4 class="fw-400" style="text-align: justify">@tt(" Vous boostez votre satisfaction clients, consolider votre avantage compétitif durable et garantissez votre rentabilité.")</h4>
                                        <br>
                                        <br>
                                        <br>
                                        <a href="{{route('enterprise')}}" class="btn btn-outline btn-primary">@tt("More info...")</a>
                                    </div>



                                </div>
                        </div>
                    </div>
                <div class="col-md-6 col-12">
                        <div class="box box-body p-xl-50 p-30 bg-lightest">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h1 class="mb-15">@tt("Aux (futurs) consultants")</h1>
                                    <h4 class="fw-400"style="text-align: justify">@tt("Lorsqu'on est Technicien(ne)s et ingénieur(e)s réseaux, sécurité, cybersécurité les opportunités de job dépendent de vos compétences techniques. Plus vous êtes expert, plus vous pourrez choisir votre carrière, votre salaire, votre métier. ")</h4>
                                    <h4 class="fw-400"style="text-align: justify">@tt("LS2EC TRAINING est la solution qui vous garantit l’excellence pour obtenir ce que vous méritez lors de vos entretiens professionnels. ")</h4>
                                    <h4 class="fw-400"style="text-align: justify">@tt("Vous boostez votre employabilité, vous développez des nouvelles compétences et vous augmentez votre valeur sur le marché.")</h4>

                                    <a href="{{route('individual')}}" class="btn btn-outline btn-primary">@tt("More info...")</a>
                                </div>



                            </div>
                    </div>
                </div>


                </div>

        </div>
    </section>

    <section class="py-50 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 text-center">
                    <h1 class="mb-15">@tt("Our training subjects")</h1>
                    <hr class="w-100 bg-primary">
                </div>
            </div>
            <div class="row mt-30">

                @foreach(App::$academies as $academy)
                    <div class="col-lg-4 col-md-6 col-12">
                        <a class="box bg-img text-center py-50 pull-up" href="javascript:void(0)" style="background-image: url({{ assets   }}images/front-end-img/courses/{{$academy->getBanner()}})">

                            <div class="box-body py-15 bg-black-70 rounded-0">
                                <h4 class="text-white">{{$academy->getName()}}</h4>
                            </div>
                        </a>
                    </div>

                @endforeach




            </div>
        </div>
    </section>


    <section class="py-30 bg-img countnm-bx" data-jarallax='{"speed": 0.4}' style="background-image: url({{ assets   }}images/front-end-img/background/bg-1.jpg)" data-overlay="5">
        <div class="container">
            <div class="box box-body bg-transparent mb-0">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="text-center mb-30 mb-lg-0">
                            <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                                <span class="text-white fs-40 icon-User"><span class="path1"></span><span class="path2"></span></span>
                            </div>
                            <h1 class="countnm my-10 text-white">01</h1>
                            <div class="text-uppercase text-white">@tt("Years")</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="text-center mb-30 mb-lg-0">
                            <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                                <span class="text-white fs-40 icon-Book"></span>
                            </div>
                            <h1 class="countnm my-10 text-white">05</h1>
                            <div class="text-uppercase text-white">@tt("Courses")</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="text-center">
                            <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                                <span class="text-white fs-40 icon-Group"><span class="path1"></span><span class="path2"></span></span>
                            </div>
                            <h1 class="countnm my-10 text-white">01</h1>
                            <div class="text-uppercase text-white">@tt("Student")</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="text-center">
                            <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                                <span class="text-white fs-40 icon-Difference"><span class="path1"></span><span class="path2"></span></span>
                            </div>
                            <h1 class="countnm my-10 text-white">03</h1>
                            <div class="text-uppercase text-white">@tt("partners")</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-50" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 text-center">
                    <h1 class="mb-15">@tt("Upcoming Courses")</h1>
                    <hr class="w-100 bg-primary">
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-12">
                    <ul class="nav nav-tabs justify-content-center bb-0 mb-10" role="tablist">
                        @foreach(App::$academies as $academy)
                            @if($academy->getId()==1)
                            <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tab{{$academy->getId()}}" role="tab">{{$academy->getName()}}</a> </li>
                            @else
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tab{{$academy->getId()}}" role="tab">{{$academy->getName()}}</a> </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach(App::$academies as $academy)
                            @if($academy->getId()==1)
                                <div class="tab-pane active" id="tab{{$academy->getId()}}" role="tabpanel">
                                    <div class="px-15 pt-15">
                                        <div class="row">
                                            @foreach(Courses::where($academy)->andwhere('type','!==',1)->__getAll() as $course)
                                                <div onclick="location.href='{{route('coursedetail')}}?id={{$course->getId()}}';" class="col-lg-3 col-md-6 col-12">
                                                    <div class="card">
                                                        <a href="#">
                                                            <img class="card-img-top" src="{{ assets   }}images/front-end-img/courses/{{$course->getImage()}}" alt="Card image cap">
                                                        </a>
                                                        <div class="card-body">
                                                            <span class="badge badge-success mb-10">{{$academy->getName()}}</span>
                                                            <h4 class="card-title">{{$course->getName()}}</h4>
                                                            <div class="d-flex justify-content-between">
                                                                <a href="#"><span class="fw-bold">@tt("Duration"):</span> 6 @tt("Months")</a>
                                                                <a href="#"><span class="fw-bold">@tt("Daily"):</span> 2 @tt("Hours")</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="tab-pane" id="tab{{$academy->getId()}}" role="tabpanel">
                                    <div class="px-15 pt-15">
                                        <div class="row">
                                            @foreach(Courses::where($academy)->andwhere('type','!==',1)->__getAll() as $course)
                                                <div onclick="location.href='{{route('coursedetail')}}?id={{$course->getId()}}';" class="col-lg-3 col-md-6 col-12">
                                                    <div class="card">
                                                        <a href="#">
                                                            <img class="card-img-top" src="{{ assets   }}images/front-end-img/courses/{{$course->getImage()}}" alt="Card image cap">
                                                        </a>
                                                        <div class="card-body">
                                                            <span class="badge badge-success mb-10">{{$academy->getName()}}</span>
                                                            <h4 class="card-title">{{$course->getName()}}</h4>
                                                            <div class="d-flex justify-content-between">
                                                                <a href="#"><span class="fw-bold">@tt("Duration"):</span> 6 @tt("Months")</a>
                                                                <a href="#"><span class="fw-bold">@tt("Daily"):</span> 2 @tt("Hours")</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="py-50 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>@tt("Recommandations")</h2>
                    <hr>
                </div>
            </div>
            <div class="owl-carousel owl-theme owl-loaded owl-drag" data-nav-arrow="true" data-nav-dots="false" data-items="2" data-md-items="2" data-sm-items="2" data-xs-items="1" data-xx-items="1">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-2638px, 0px, 0px); transition: all 0.25s ease 0s; width: 5276px;">

                        <div class="owl-item" style="width: 639.5px; margin-right: 20px;">
                            <div class="item">
                                <div class="testimonial-bx">
                                    <div class="testimonial-thumb">
                                        <img src="{{ assets   }}images/avatar/5.jpg" alt="">
                                    </div>
                                    <div class="testimonial-info">
                                        <h4 class="name">Brice Njonga</h4>
                                        <p>Operation Core Voice Network engineer chez Hub One</p>
                                    </div>
                                    <div class="testimonial-content">
                                        <p class="fs-16">J'ai rarement rencontré un collègue aussi professionnel et passionné par son métier. Je reste admiratif devant son implication professionnelle, son veritable sens de la pédagogie et sa facilité pour transmettre son savoir à ceux qui l'entoure. J'espère qu'on aura l'occasion de travailler ensemble de nouveaux.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 639.5px; margin-right: 20px;">
                            <div class="item">
                                <div class="testimonial-bx">
                                    <div class="testimonial-thumb">
                                        <img src="{{ assets   }}images/avatar/2.jpg" alt="">
                                    </div>
                                    <div class="testimonial-info">
                                        <h4 class="name">Alexia CATALOGNA</h4>
                                        <p>Ingénieure Réseaux et Sécurité chez Hub One</p>
                                    </div>
                                    <div class="testimonial-content">
                                        <p class="fs-16">Travailler avec Claude-Marcel c'est apprendre chaque jour, il m'a aidé à grandir professionnellement et je le remercie grandement pour ça. Merci pour ta pédagogie, ta patience et ton professionnalisme</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 639.5px; margin-right: 20px;">
                            <div class="item">
                                <div class="testimonial-bx">
                                    <div class="testimonial-thumb">
                                        <img src="{{ assets   }}images/avatar/5.jpg" alt="">
                                    </div>
                                    <div class="testimonial-info">
                                        <h4 class="name">Thomas Scainelli</h4>
                                        <p>ingénieur réseau et sécurité chez Hub One</p>
                                    </div>
                                    <div class="testimonial-content">
                                        <p class="fs-16">Claude Marcel a été un collègue avec lequel j'ai pu apprendre beaucoup de chose et augmenter mon expertise technique. Il a toujours été patient et pédagogue lorsqu'il m'enseignait quelque chose, surtout avec des schémas clair et précis ! Merci a toi pour tout.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 639.5px; margin-right: 20px;">
                            <div class="item">
                                <div class="testimonial-bx">
                                    <div class="testimonial-thumb">
                                        <img src="{{ assets   }}images/avatar/2.jpg" alt="">
                                    </div>
                                    <div class="testimonial-info">
                                        <h4 class="name">Soumaya Houari</h4>
                                        <p>Responsable pôle Développement RH</p>
                                    </div>
                                    <div class="testimonial-content">
                                        <p class="fs-16">J'ai eu le plaisir de collaborer avec Claude Marcel principalement sur des sujets de formation. Avant tout, j'ai été impressionné par la capacité de Claude Marcel à se fixer des objectifs et se donner les moyens de les atteindre. Sa détermination a été un véritable atout dans son évolution au sein de Hub One, et j’en suis sûre va lui permettre de réussir dans son nouveau projet. Au-delà de sa détermination, c’est quelqu’un avec qui il est très facile d’échanger. Je lui souhaite pleine réussite dans son nouveau projet 😉</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 639.5px; margin-right: 20px;">
                            <div class="item">
                                <div class="testimonial-bx">
                                    <div class="testimonial-thumb">
                                        <img src="{{ assets   }}images/avatar/5.jpg" alt="">
                                    </div>
                                    <div class="testimonial-info">
                                        <h4 class="name">Julien Lopez</h4>
                                        <p>Team Leader Service Manager chez Hub One</p>
                                    </div>
                                    <div class="testimonial-content">
                                        <p class="fs-16">Je recommande fortement Claude Marcel pour vos activités Réseaux et Telecom. J'ai eu la chance de travailler avec lui pendant plusieurs années et peut attester de son professionnalisme et de sa motivation #réseau #sécurité #cybersécurité #cloud</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-nav">
                    <div class="owl-prev">
                        <i class="fa fa-angle-left fa-2x">

                        </i>
                    </div>
                    <div class="owl-next">
                        <i class="fa fa-angle-right fa-2x">

                        </i>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <section class="py-50">
        <div class="container">
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-lg-7 col-12 text-center">--}}
{{--                    <h2 class="text-uppercase mb-15 fw-600">@tt("Our online Learning Plan")<br> <span class="fw-400 fs-24"></span></h2>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row justify-content-center">
                <ul class="nav nav-tabs justify-content-center bb-0 mb-10" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#tableau1" role="tab">@tt("PARTICULIER")</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#tableau2" role="tab">@tt("ENTREPRISE")</a> </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="tableau1" role="tabpanel">
                    <div class="row mt-30">
                        @foreach(App::$subscription as $subscriptions)
                            @if($subscriptions->getTarget()=="i" && $subscriptions->getName() == 'Premium')
                                <div class="offset-md-4 col-md-4 col-12">
                                    @if($subscriptions->getY_price()==45)
                                        <div class="price-table active bg-gray-100 pull-up">
                                            @else
                                                <div class="price-table bg-gray-100">
                                                    @endif
                                                    @if($subscriptions->getName() == 'Premium')
                                                    <div class="price-top bg-white">
                                                        <div class="price-title">
                                                            <h3 class="mb-15">{{$subscriptions->getName()}}</h3>
                                                        </div>
                                                        <div class="price-prize">
                                                            <?php
                                                                $pricem = ($subscriptions->getM_price()*0.2)+$subscriptions->getM_price();
                                                                $priceafricam = ($subscriptions->getM_a_price()*0.2)+$subscriptions->getM_a_price();

                                                                $price = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();
                                                                $priceafrica = ($subscriptions->getY_a_price()*0.2)+$subscriptions->getY_a_price();
                                                                $priceafrica =  number_format($priceafrica);
                                                                $price = number_format($price);

                                                                $priceafricam =  number_format($priceafricam);
                                                                $pricem = number_format($pricem);
                                                            ?>
{{--                                                            <label style="font-size: 18px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>--}}
                                                            <h2 style="font-size: 1.3rem">{{$pricem}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$price}} € / <span>@tt("year")</span></h2>
                                                                <hr>
{{--                                                                <label style="font-size: 18px; font-weight: bold" for="">@tt('Afrique')</label>--}}

{{--                                                            <h2 style="font-size: 1.3rem">{{$priceafricam}} € /<span> @tt("month")</span> <span>@tt("or")</span> {{$priceafrica}} € / <span>@tt("year")</span></h2>--}}
                                                        </div>
                                                        <div class="price-button">
                                                            <a class="btn btn-primary" href="{{route('cart')}}?id={{$subscriptions->getId()}}">@tt("Get It Now")</a>
                                                        </div>
                                                    </div>
                                                        <div class="price-content">
                                                            <div class="price-table-list">
                                                                <ul class="list-unstyled">
                                                                    <li> <i class="fa fa-check"></i> @tt("CCNA 200-301") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span></li>
                                                                    <li><i class="fa fa-check" ></i> @tt("CCNP 350-401 ENCOR") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE4") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("NSE7") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li><i class="fa fa-check"></i> @tt("CYBERSECUTITY") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;"><i class="fa fa-check"></i> @tt("Accès au groupe privé Facebook") <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span> </li>
                                                                    <li style="text-transform: uppercase;">
                                                                        <i class="fa fa-check"></i>
                                                                        @tt("Accès gratuit aux labs (20 jetons)")
                                                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                        </div>
                                    @else
                                    @endif
                                    @endforeach


                                </div>
                    </div>

                    <div class="tab-pane" id="tableau2" role="tabpanel">
                        <div class="row mt-30">
                            @include('learningplan')
                        </div>
                    </div>
                </div>
    </section>

    <section class="py-50 aos-init aos-animate" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 text-center">
                    <h1 class="mb-15">@tt("Latest Blog")</h1>
                    <hr class="w-100 bg-primary">
                </div>
            </div>
            <div class="row mt-30">
                @foreach(Article::all() as $articles)
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="blog-post">
                        <div class="entry-image clearfix">
                            <img class="img-fluid" src="{{__env}}uploads/article/{{$articles->getImage()}}" alt="">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href="{{route('blog')}}?id={{$articles->getId()}}">{{$articles->getTitle()}}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul class="list-unstyled">
                                    <div class="me-10">
                                        <i class="fa fa-user me-5"></i> LS2EC
                                    </div>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{$articles->getResume()}}</p>
                            </div>
                            <div class="entry-share d-flex justify-content-between align-items-center">
                                <div class="entry-button">
                                    <a href="{{route('blog')}}?id={{$articles->getId()}}" class="btn btn-primary btn-sm">@tt('Read more')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-50 aos-init aos-animate">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 text-center">
                    <h1 class="mb-15">@tt("Our Partners")</h1>
                    <hr class="w-100 bg-primary">
                </div>
            </div>
            <div class="row mt-30">
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"><img src="{{ assets   }}images/front-end-img/unilogo/uni-2.jpg" style="width: 199.833px; margin-right: 20px;"></div>
                        <div class="col-2"><img src="{{ assets   }}images/front-end-img/unilogo/uni-3.jpg" style="width: 199.833px; margin-right: 20px;" ></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>

            </div>
        </div>
    </section>

    
@endsection