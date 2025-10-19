@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    {{$exo->getTitle()}}
                </h4>
            </div>

        </div>

        <hr>

        <div class="col-lg-12 col-12">
            <div class="box">


                <div class="row g-0">
                    <div class="col-12">
                        <div class="box-body">


                            <p>{!! $exo->getContenu() !!}</p>



                            <div class="align-items-center mt-3">
                                <button class="btn btn-md btn-success" id="show{{$exo->getId()}}" onclick="setShowAnswer('{{$exo->getId()}}')" id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-eye"></i> @tt("Show answer")</button>
                                <button class="btn btn-md btn-success" style="display: none" id="hide{{$exo->getId()}}" onclick="setHideAnswer('{{$exo->getId()}}')" id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-eye-slash"></i> @tt("hide answer")</button>
                            </div>
                            <hr>
                            <div id="reponse{{$exo->getId()}}"  style="display: none; border-style: dotted; border-color: #0b8e36">{!! $exo->getReponse() !!}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sign_up_modal modal fade" id="modalmessageopen" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="login_form">
                                <form action="#">
                                    <div class="heading" id="message7">
                                        <h3 class="text-center">@tt("Do you want to open this ticket?")</h3>
                                        <p class="text-center"></p>
                                    </div>
                                    <hr>
                                    <div class="row mt40">
                                        <div class="col-lg">
                                            <button data-dismiss="modal" aria-label="Close" class="btn btn-block color-white bgc-gogle"><i class="fa fa-times float-left mt5"></i> No</button>
                                        </div>
                                        <div class="col-lg">
                                            <button type="submit" data-id="" id="openOk" onclick="app.opensupport(this)" class="btn btn-block color-white bgc-fb"><i class="fa fa-check float-left mt5"></i> Yess</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            document.getElementById('reponse'+id).style.display = "block";
            document.getElementById('show'+id).style.display = "none";

            document.getElementById('hide'+id).style.display = "block";
        }

        function setHideAnswer(post){
            document.getElementById('reponse'+id).style.display = "none";
            document.getElementById('show'+id).style.display = "block";

            document.getElementById('hide'+id).style.display = "none";
        }

    </script>
@endsection
