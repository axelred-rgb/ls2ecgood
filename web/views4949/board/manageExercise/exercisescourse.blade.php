@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                   {{$course->getName()}} - @tt("EXERCISE")
                </h4>
            </div>

        </div>

        <hr>


        @foreach($exercises as $exo)
            <div class="col-lg-12 col-12">
                <div class="box">


                    <div class="row g-0">
                        <div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url({{$exo->getImage()}})"></div>
                        <div class="col-md-8 col-12">
                            <div class="box-body">
                                <h4 id="title{{$exo->getId()}}">{{$exo->getTitle()}}</h4>
                                <div class="d-flex mb-10">
                                    <div class="me-10">
                                        <i class="fa fa-book-open me-5"></i> {{$exo->getCourses()->getName()}}
                                    </div>
                                </div>

                                <div class="pull-right flexbox align-items-center mt-3">
                                    <a href="{{route('detailexercise')}}?id={{$exo->getId()}}" class="btn btn-sm btn-success"  id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-eye"></i> @tt("Effectuer l'exercice")</a>
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

    <script>
        let id;
        let title;
        function setShowAnswer(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to see answer of exercise ') "+title+" ?.<br><strong style='color:#e9182f'>@tt('WARNING!! this action is irreversible')</strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){
                            document.getElementById('reponse'+id).style.display = "block";
                            document.getElementById('show'+id).style.display = "none";

                            document.getElementById('hide'+id).style.display = "block";

                            return false;
                        }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

        function setHideAnswer(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want to hide answer of exercise ') "+title+" ?.<br>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':true, 'onClick': function(){
                            document.getElementById('reponse'+id).style.display = "none";
                            document.getElementById('show'+id).style.display = "block";

                            document.getElementById('hide'+id).style.display = "none";

                            return false;
                        }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

    </script>
@endsection
