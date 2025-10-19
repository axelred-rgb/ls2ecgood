<?php $subscriptions = Subscription::where('target','=','pecb')->get();?>
@foreach($subscriptions as $subscription)
    @if($subscription->getTarget()=="pecb")
        <div class="col-md-6 col-12" style="margin-bottom: 20px;">
            <div class="price-table active bg-gray-100 pull-up">
                <div class="price-top bg-white">
                    <div class="price-title">
                        <h3>
                            {{$subscription->getCompletename()}}
                        </h3>
                        @if($subscription->getType() == 3)
                            <label for="" class="badge badge-success">
                                {{tt("Avec formatieur")}}
                            </label> <br>
                        @elseif($subscription->getType() == 4)
                            <label for="" class="badge badge-success">
                                {{tt("Sans formatieur")}}
                            </label> <br>
                        @endif
                    </div>
                    <div class="price-prize">
                            <?php
                            $pricet = ($subscription->getY_price()*0.2)+$subscription->getY_price();
                            $pricem = ($subscription->getM_price()*0.2)+$subscription->getM_price();

                            $pricet =  number_format($pricet);
                            $pricem = number_format($pricem);
                            ?>
                        {{--                        <label style="font-size: 18px; font-weight: bold" for="">@tt('Europe-Amerique-Asie')</label>--}}
                        <h2 style="font-size: 1.3rem">
                            <span style="text-decoration: line-through"> {{$pricet}}€</span>  {{$pricem}}€
                            <span>
                                @tt("TTC")
                                @if($subscription->getType() == 3)
                                    /5 @tt('Jours')
                                @endif
                            </span>
                        </h2>

                    </div>
                    <div class="price-button">
                        <a class="btn btn-primary" href="{{route('cart')}}?id={{$subscription->getId()}}">@tt("Get It Now")</a>
                    </div>
                    <div class="price-content" style="width: 100%!important;">
                        <div class="price-table-list">
                            <ul class="list-unstyled">
                                @if($subscription->getType() == 3)
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <strong>
                                             @tt("Formation théorique et pratique")
                                        </strong>
                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                    </li>
                                @endif
                                @if($subscription->getType() == 4)
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <strong>
                                            @tt("L'apprenant évolue à son rythme")
                                        </strong>
                                        <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                    </li>
                                @endif
                                <li>
                                    <i class="fa fa-check"></i>
                                    <strong>
                                        @tt("Support de cours")
                                    </strong>
                                    <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>
                                    <strong>
                                        @tt("Examen et certification")
                                    </strong>
                                    <span class="tooltip-content float-end" data-placement="top" data-bs-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet" data-bs-original-title="" title=""><i class="fa fa-info"></i></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endforeach