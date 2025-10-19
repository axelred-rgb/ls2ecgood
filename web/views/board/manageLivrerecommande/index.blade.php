@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade active show" id="pills-mylabs" role="tabpanel" aria-labelledby="pills-mylabs-tab">
        <div class="row">
            <div class="col-md-6">
                <h4 class="box-title mb-0">
                    @tt("MANAGE BOOK")
                </h4>
            </div>
            <div class="col-md-6">

                <a href="{{route('createlivre')}}" class="btn btn-md btn-success pull-right"> <i class="fa fa-plus"></i> @tt("New book")</a>
            </div>
        </div>

        <hr>


        @foreach(array_reverse($livres) as $livre)
            <div class="col-lg-12 col-12">
                <div class="box">


                    <div class="row g-0">
                        <div class="col-md-4 col-12 bg-img h-md-auto h-250" style="background-image: url({{$livre->getCover()}})"></div>
                        <div class="col-md-8 col-12">
                            <div class="box-body">
                                <h4 id="title{{$livre->getId()}}">{{$livre->getName()}}</h4>
                                <div class="d-flex mb-10">
{{--                                    <div class="me-10">--}}
{{--                                        <i class="fa fa-book-open me-5"></i> {{$livre->getCourses()->getName()}}--}}
{{--                                    </div>--}}
                                </div>


                                <div class="flexbox align-items-center mt-3">
                                    <a class="btn btn-sm btn-warning" href="{{route('editLivrerecommande')}}?id={{$livre->getId()}}"> <i class="fa fa-edit"></i> @tt("Update livre")</a>
                                    <a class="btn btn-sm btn-success" target="_blank" href="{{$livre->document}}"> <i class="fa fa-eye"></i> @tt("See livre")</a>
                                    <button class="btn btn-sm btn-danger" onclick="getDataDelete('{{$livre->getId()}}')" id="buttonDelete"  style="background-color:#e9182f;border-color:#e9182f"> <i class="fa fa-trash"></i> @tt("Delete livre")</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

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
        function getDataDelete(post){
            id=post;
            title = $("#title"+id).html();
            $.jAlert({
                'title':'',
                'content': "@tt('Do you want too delete livre') "+title+" ?.<br><strong style='color:#e9182f'>@tt('WARNING!! this action is irreversible')</strong>",
                'theme': 'blue',
                'btns': [
                    {'text':'Yes', 'closeAlert':false, 'onClick': function() {
                            var functionName = 'delete.product';
                            $.ajax({

                                url: __env + 'api/' + functionName + '?id=' + id,
                                method: 'DELETE',
                                contentType: 'application/json',
                                success: function (result) {
                                    console.log(result);

                                    if (result.success == true) {
                                        successAlert('Opération effectué avec succès');
                                    } else {
                                        alert(result);
                                    }
                                    setTimeout(function () {
                                        window.location.href = '';
                                    }, 1000);
                                    model.removeLoader();
                                },
                                error: function (request, msg, error) {
                                    console.log(request);
                                    errorAlert(error);
                                }
                            });
                        }},
                    {'text':'No', 'closeAlert':true, 'onClick': function(){}}
                ]
            });
        }

    </script>
@endsection
