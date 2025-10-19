@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    {{$course->getName()}} - @tt("LIVRES RECOMMANDES")
                </h4>
            </div>

        </div>

        <hr>


        @foreach($livres as $exo)
            <div class="col-lg-12 col-12">
                <div class="box">


                    <div class="row g-0">
                        <div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url({{$exo->getCover()}})"></div>
                        <div class="col-md-8 col-12">
                            <div class="box-body">
                                <h4 id="title{{$exo->getId()}}">{{$exo->getName()}}</h4>
                                <div class="d-flex mb-10">
                                    <div class="me-10">
                                        <i class="fa fa-book-open me-5"></i> {{$exo->getCourses()->getName()}}
                                    </div>
                                </div>

                                <div class="pull-right flexbox align-items-center mt-3">
                                    <a target="_blank" href="{{$exo->getDocument()}}" class="btn btn-sm btn-success"  id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-eye"></i> @tt("Consulter le livre")</a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach


    </div>
@endsection
@section("jsimport")


@endsection
