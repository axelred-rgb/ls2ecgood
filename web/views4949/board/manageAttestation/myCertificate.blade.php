@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        
        <h4 class="box-title mb-0">
            @tt("Certificates List")
        </h4>
        <hr>
        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("Course")</th>
                    <th>@tt("Objective")</th>
                    <th>@tt("Date")</th>
                    <th>@tt("Certificate")</th>
                </tr>
                </thead>
                <tbody>
                    @foreach(array_reverse($certificates) as $certificate)
                        <tr>
                            
                            @if(Request::get('lang') == 'fr')
                                <td>{{$certificate->getCourses()->getName()}}</td>
                                <td>{{$certificate->getCourses()->getObjectif()}}</td>
                            @else
                                <td>{{$certificate->getCourses()->getName_en()}}</td>
                                <td>{{$certificate->getCourses()->getObjectif_en()}}</td>
                            @endif
                            <td>{{$certificate->getCertificateDate()}}</td>
                            <td>
                                <a href="{{route('attestation')}}?attestation={{$certificate->getId()}}" class="btn btn-success" id="Submit">@tt("Get Certificate")</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

