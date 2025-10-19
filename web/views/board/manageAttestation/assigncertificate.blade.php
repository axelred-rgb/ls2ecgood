@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            @tt("Assign a certificate")
        </h4>
        <hr>
        
        <div class="bg-img box box-body py-50" style="background-image: url({{ assets   }}images/front-end-img/banners/banner-1.jpg)" data-overlay="7">
            <div class="text-center">
                <h1 class="box-title text-white">@tt("Assign a certificate ")</h1>
                <div class="message"></div>		
            </div>
            <div class="form row g-0 align-items-center cours-search max-w-950" id="purchase-token"> 
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt">
                    <select class="form-select" onchange="selectuser()" id="courses" style="width: 100%;" name="course">
                        <option selected="selected" disabled>@tt("Select Course")</option>
                        @foreach(Courses::where('type','=',1)->__getAll() as $course))
                            <option value="{{$course->getId()}}">{{$course->getName()}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="form-group col-xl-5 col-lg-5 col-12 mb-lg-0 mb-5 bg-white ser-slt"> 
                    <select class="form-select" disabled  id="users" style="width: 100%;" name="user">
                        <option selected="selected" disabled>@tt("Select user")</option>
                    </select> 
                </div>
                <div class="col-xl-2 col-lg-3 col-12 mb-0"> 
                    <button onclick="app.assignCertificate(this)"  class="btn w-p100 btn-danger rounded-0">@tt("Assign")</button> 
                </div>
            </div>
            
        </div>


        <h4 class="box-title mb-0">
            @tt("Certificates List")
        </h4>
        <hr>
        <div class="table-responsive mt-30">
            <div id="message"></div>
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("USer")</th>
                    <th>@tt("Course")</th>
                    <th>@tt("Date")</th>
                    <th>@tt("Certificate")</th>
                    <th>*</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(array_reverse(User_courses::where('certificateavailable',1)->__getAll()) as $user_courses)
                        <tr>
                            <td>{{$user_courses->getUser()->getUsername()}}</td>
                            @if(Request::get('lang') == 'fr')
                                <td>{{$user_courses->getCourses()->getName()}}</td>
                            @else
                                <td>{{$user_courses->getCourses()->getName_en()}}</td>
                            @endif
                            <td>{{$user_courses->getCertificateDate()}}</td>
                            <td>
                                <a href="{{route('attestation')}}?attestation={{$user_courses->getId()}}" class="btn btn-success" id="Submit">@tt("Get Certificate")</a>
                            </td>
                            <td>
                                <button onclick="app.revokeCertificate(this)" data="{{$user_courses->getId()}}" class="btn btn-danger" id="Submit">@tt("Revoke Certificate")</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("jsimport")
    <script>
        $('#courses').select2();
        $('#users').select2();
        function selectuser(){
            
            var courseId = $('#courses').val();
            if(courseId !== ''){
                $('#courses').attr('disabled', 'disabled');
                $('#users').attr('disabled', 'disabled');
                url = __env+"api/getuser.course";

                $.ajax({
                    type : 'POST',
                    url : url,
                    data : {courseId: courseId},
                    success: function(result){ 
                        console.log(result);
                        if(result.user_courses){
                            var option = '<option disabled selected>@tt("Select user")</option>';
                            for(var i=0; i<result.user_courses.length; i++){
                                var item = result.user_courses[i];
                                option +='<option value='+item.user.id+'>'+item.user.username+'</option>';
                            }
                            $('#users').html(option);
                            $('#users').removeAttr('disabled');
                            $('#courses').removeAttr('disabled');

                        }
                    },
                })
            }
        }
    </script>
@endsection
