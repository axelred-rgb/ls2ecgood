
    <div class="box box-default">
        <div class="fx-card-item">
            <div class="fx-card-avatar fx-overlay-1 mb-0"> <img src="{{$product->srcCover()}}" alt="user">
                <div class="fx-overlay scrl-up">
                    <ul class="fx-info">
                        <?php $a = 'this.id'; $id  = $product->$a?>
                        <li><a class="btn btn-outline image-popup-vertical-fit" href="{{route("product/".$product->getId())}}">@tt('Quick View')</a></li>
                        <?php $find = false;?>
                        @if(count($panier) > 0)
                            @foreach($panier as $pan)
                                @if(!is_null($pan))
                                    @if($pan[2] == $product->getId())
                                        <?php $find = true;?>
                                    @endif
                                @endif
                            @endforeach
                        @endif

                        @if($find)
                            <li><a class="btn btn-outline image-popup-vertical-fit" data-id="{{$product->getId()}}" href="{{route('panier')}}" >@tt('My cart')</a></li>
                        @else
                            <li><a class="btn btn-outline image-popup-vertical-fit" data-id="{{$product->getId()}}" href="#" onclick="app.addtocart(this)">@tt('Add to cart')</a></li>
                        @endif


                    </ul>
                </div>
            </div>
            <div class="fx-card-content text-start mb-0">
                <div class="product-text">
                    <h4 class="box-title mb-0">{{$product->getName()}}</h4>

                    <h4 class="pro-price text-blue">{{round((($product->priceofsale*0.2)+$product->priceofsale),1)}} €  <small class="ml-5"><del>20 €</del></small>  TTC</h4>
                </div>
            </div>
        </div>
    </div>
