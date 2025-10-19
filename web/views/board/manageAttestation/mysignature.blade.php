@extends('board.layoutboard')
@section('content')
     
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #signature canvas{
            width: 100% !important;
            height: 100%!important;
        }
    </style>
    <div class="tab-pane fade show active" id="pills-purshase-token" role="tabpanel" aria-labelledby="pills-purshase-token-tab">
        <h4 class="box-title mb-0">
            @tt("E-Signature")
        </h4>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <img src="{{assets}}uploads/signature.png" alt="">
            </div>
        </div>
        <h4>@tt("Save signature")</h4>
        <hr>
        <div class="row">
            
            <div class="col-md-12">
                
                <div id="signature" ></div>
            </div>
            
        </div>

        <div id="res" class="row"></div>

        <div class="row">
            <div class="col-sm-12">
                <button id="clear" class="btn btn-info">@tt("Clear Signature")</button>
                <textarea id="sigpad" name="signature_image" style="display: none"></textarea>
                <button class="btn btn-success" id="Submit">@tt("Save")</button>
            </div>
        </div>
 

        
 
        
    </div>
@endsection
@section("jsimport")
    <script>
       var signature = $('#signature').signature({syncField: '#sigpad', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            signature.signature('clear');
            $("#sigpad").val('');
        });
    </script>
 
    <script type="text/javascript">
        $("#Submit").click(function(){
            model.addLoader($("#submit"));
            url = __env+"/api/save.signature";
            sigpad= $("#sigpad").val();
            
            $.ajax({
                type : 'POST',
                url : url,
                data : {signature_image: sigpad},
                success: function(result){  
                    model.removeLoader()
                    
                    $('#res').html(`
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            ${'Signature enrégistrée.'}
                        </div>
                        `);

                    setTimeout(function () {
                        window.location.href = "";
                    }, 1000)
                
                },
            }) ;
        
        });
    </script>
    <script type="text/javascript" src="{{ assets   }}vendor_components/signature/js/jquery.signature.min.js"></script>
@endsection
