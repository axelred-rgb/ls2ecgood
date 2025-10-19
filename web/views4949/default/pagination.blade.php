@if($ll["pagination"] > 1)

    <!-- pagination starts -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="pagination-container">
                <ul class="pagination" role="menubar" aria-label="Pagination">
                    @if ($ll["current_page"]>1)
                        <li class="arrow "><a
                                    href="{{route( $baseurl.'?next='.($ll["previous"]).'&per_page='.$ll["per_page"])  }}">&laquo;
                                @tt("Previous")</a></li>

                    @endif
                    @for($i=1;$i<=$ll["pagination"];$i++)
                        @if ($i == $ll["current_page"])
                            <li class='datatable active' style="background:#0f99de;">
                                <a href="{{route($baseurl.'?next='.$i.'&per_page='.$ll["per_page"])  }}">{{$i  }}</a>
                            </li>
                        @else
                            <li class='datatable' onclick="this.style.backgroundColor='red'">
                                <a href="{{route($baseurl.'?next='.$i.'&per_page='.$ll["per_page"])  }}">{{$i  }}</a>
                            </li>
                        @endif
                    @endfor

                    @if ($ll["current_page"]!=$ll["pagination"])

                        <li class="arrow datatable">
                            <a href="{{route($baseurl.'?next='.($ll["next"]).'&per_page='.$ll["per_page"])  }}">@tt("Next")
                                &raquo;</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>


    </div>
    <!-- Pagination Ends -->
@endif