@foreach(App::$subscription as $subscriptions)
    @if($subscriptions->getTarget()=="e")
        <div class="col-md-4 col-12" style="margin-bottom: 20px;">
            <div class="price-table active bg-gray-100 pull-up">
                <div class="price-top bg-white">
                    <div class="price-title">
                        <h3 class="mb-15">{{$subscriptions->getName()}}</h3>
                    </div>
                    <div class="price-prize">
					<?php
						$pricem = ($subscriptions->getY_price()*0.2)+$subscriptions->getY_price();
						$priceafricam = ($subscriptions->getY_a_price()*0.2)+$subscriptions->getY_a_price();

						$priceafricam =  number_format($priceafricam);
						$pricem = number_format($pricem);
                    ?>
{{--                        <label style="font-size: 18px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>--}}
                        <h2 style="font-size: 1.3rem">{{$pricem}} € / 5 @tt("Days")</h2>
{{--                        <hr>--}}
{{--                        <label style="font-size: 18px; font-weight: bold" for="">@tt('Afrique')</label>--}}
{{--                        <h2 style="font-size: 1.3rem">{{$priceafricam}} € / 5 @tt("Days")</h2>--}}
                    </div>
                    <div class="price-button">
                        <a class="btn btn-primary" target="_blank" href="https://calendly.com/claudemarcelbiyihamang">@tt("Prendre rendez vous")</a>
                    </div>
                </div>

            </div>
        </div>
    @else
    @endif
@endforeach