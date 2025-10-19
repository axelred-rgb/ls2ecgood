@extends('board.layoutboard')
@section('cssimport')
    <link rel="stylesheet" href="{{ assets   }}vendor_components/dateTimepicker/css/jquery.datetimepicker.css">
@endsection
@section('content')
    <div class="tab-pane fade show active" id="pills-labs" role="tabpanel" aria-labelledby="pills-labs-tab">
        <h4 class="box-title mb-0">
            @tt("Labs")
        </h4>
        <hr>
        <div class="card rounded-0 p-4 " id="scheduleLab" hidden>
            <div class="row">
                <div class="col-sm-8">
                    <h5 class="box-title mb-0">
                        @tt("Select Date Range")
                    </h5>
                </div>
                <div class="col-sm-4">
                    <span class="pull-right" onclick="closescheduleform()"><i class="fa fa-times fa-lg"></i></span>
                </div>
            </div>
            
            <hr>
            <div class="message"></div>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="">@tt("The")</label>
                    <input type="text" class="form-control" id="beginDate" onkeydown="return false">
                    <input type="hidden" id="user" value="{!! App::$user->getId() !!}">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="">@tt("at")</label>
                    <input type="text" class="form-control" id="endDate"  onkeydown="return false">
                    <input type="hidden" id="labsValue">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-success" onclick="app.shedulelabs(this)">@tt("Takes")</button>
                </div>
            </div>
        </div>
        @foreach($labs as $key =>$lab)
            <div class="card rounded-0 labs" id="labs{{$key}}">
                <div class="d-lg-flex">
                    <div class="position-relative w-lg-400">
                        <a href="#">
                            <img class="" src="{{ assets   }}images/front-end-img/courses/{{$lab->courses->getImage()}}" alt="Card image cap">
                        </a>											
                    </div>
                    <div class="card mb-0 no-border no-shadow w-p100">
                        <div class="card-body">
                            <div class="cour-stac d-lg-flex align-items-center text-fade">
                                <h3 class="card-title mt-20">{{$lab->courses->getName()}}</h3>
                                <p class="card-text">
                                    
                                </p>
                            </div>
                        </div>
                        <div class="card-footer justify-content-between d-flex align-items-center">
                            <div class="d-flex fs-18 fw-600"> <span class="text-dark me-10">{{$lab->token}} @tt("Tokens") / H</span> </div>
                            <span>
                                <button onclick="showsheduleForm({{$key}},{{$lab->getId()}})" dataset="{{$key}}" datalabs="{{$lab->getId()}}" class="doingLab btn btn-success">@tt("Schedule")</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section("jsimport")
    <script src="{{ assets   }}vendor_components/dateTimepicker/js/jquery.datetimepicker.full.min.js"></script>
    <script>
        /*jslint browser:true*/
        /*global jQuery, document*/

        jQuery(document).ready(function () {
            'use strict';

            jQuery('#beginDate, #endDate').datetimepicker();
        });

        function showsheduleForm(dataset, datalabs){
            $("#scheduleLab").removeAttr("hidden");
            $("#scheduleLab").insertAfter("#labs"+dataset).hide().show('slow');;
            $("#labsValue").val(datalabs);
            $('.message').html("");
            $('#beginDate').val('');
            $('#endDate').val('');
        
        }

        function closescheduleform(){
            $("#scheduleLab").fadeOut();
            $('.message').html("");
            $('#beginDate').val('');
            $('#endDate').val('');
        }
    </script>
@endsection