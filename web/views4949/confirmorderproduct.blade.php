@extends('layoutnewlook')
@section('content')
    <style>
        p, h5, span, h2, h3, h4, li{
            letter-spacing: 1px!important;
        }
    </style>

    <!---page Title --->
    <section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{ assets   }}images/front-end-img/background/bg-8.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="page-title text-white">@tt("Comfirm order")</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page content -->
    <section class="mb-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 offset-lg-4 offset-md-3" style="padding:20px">
                <div style="border:1px solid #f2f2f2; padding:10px;text-align: center; border-radius: 10px">
                    <span style="font-size: 15px; text-align: center">
                        @tt("Merci votre paiement a été pris en compte.
                            Nous espérons que vous serez entièrement satisfait de votre achat. Si vous avez des questions ou des commentaires,
                            n'hésitez pas à nous contacter.") !
                    </span>
                </div>

            </div>
            <div class="col-4 offset-sm-4">
                @if(isset($product))
                    <button onclick="location.href='{{route('myresources')}}';" type="button" style="border-radius: 10px" class="btn btn-info w-p100 mt-15">@tt("Continuer")</button>
                @else
                    <button onclick="location.href='{{route('myboard')}}';" style="border-radius: 56px" type="button" class="btn btn-info w-p100 mt-15">@tt("Continuer")</button>
                @endif
            </div>
        </div>
    </section>

@endsection
