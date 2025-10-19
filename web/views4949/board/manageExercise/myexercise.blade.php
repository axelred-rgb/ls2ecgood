@extends('board.layoutboard')
@section('content')
    <style>
        .centered {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .container2{
            position: relative;
            text-align: center;
            color: white;
            font-size: 17px;
            font-weight: bold;
        }
    </style>
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("MY EXERCISE")
                </h4>
            </div>
            
        </div>

        <hr>

        <div class="row">
            <?php $i = 0;?>
            @foreach(array_reverse($u_course) as $coursee)
                @if($a==false)
                    @if(Exercise::where('courses_id','=',$coursee->getCourses()->getId())->count() > 0)
                        <?php $i++;?>
                        <div class="col-md-4 col-sm-6">
                            <a href="{{route('courseexercise')}}?id={{$coursee->getCourses()->getId()}}">
                                <div class="container2">
                                    <img src="{{__front}}images/folder.png" alt="Snow" style="width:100%;">

                                    <div class="centered">{{$coursee->getCourses()->getName()}}</div>
                                </div>
                            </a>


                        </div>
                    @endif
                @else
                    @if(Exercise::where('courses_id','=',$coursee->getId())->count() > 0)
                        <?php $i++;?>
                        <div class="col-md-4 col-sm-6">
                            <a href="{{route('courseexercise')}}?id={{$coursee->getId()}}">
                                <div class="container2">
                                    <img src="{{__front}}images/folder.png" alt="Snow" style="width:100%;">

                                    <div class="centered">{{$coursee->getName()}}</div>
                                </div>
                            </a>


                        </div>
                    @endif
                @endif
            @endforeach
            @if($i > 0)
                    <div class="col-md-4 col-sm-6">
                        <a target="_blank" href="{{__front}}document/lab_guide.pdf">
                            <div class="container2">
                                <img src="{{__front}}images/folder.png" alt="Snow" style="width:100%;">

                                <div class="centered">@tt("Guide pratique des LAB")</div>
                            </div>
                        </a>


                    </div>
            @endif

        </div>


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
