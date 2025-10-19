@extends('layout')
@section('content')

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Cours gratuits")</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Page content -->

    <section class="py-50" data-aos="fade-up">
        <div class="container">

            <div class="row mt-30">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <thead>
                                <tr class="text-uppercase bg-lightest">
                                    <th><span class="text-dark">@tt("Coursed")</span></th>
                                    <th><span class="text-fade">@tt("Category")</span></th>
                                    <th><span class="text-fade">@tt("Action")</span></th>
                                    {{--						<th></th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(App::$academies as $academy)
                                    @foreach(Courses::where($academy)->andwhere('type','!==',1)->__getAll() as $u_courses)
                                        <tr>
                                            <td>
                                                {{$u_courses->getName()}}
                                            </td>
                                            <td>
                                                {{$u_courses->academies->getName()}}
                                            </td>

                                            <td>
                                                <a target="_blank" href="{{'gotofreecoursewihoutlogin'}}?id={!! $u_courses->getProviderfreecoursesid() !!}"><span  class="badge badge-success badge-lg">@tt("continue")</span>
                                                </a>
                                            <td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
