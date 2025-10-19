@extends('board.layoutboard')
@section('content')
    <div class="tab-pane fade show active" id="pills-payments" role="tabpanel" aria-labelledby="pills-payments-tab">
        <h4 class="box-title mb-0">
            @tt("Payment Method")
        </h4>
        <hr>


        <!-- Tab panes -->

        <div class="table-responsive mt-30">
            <table class="table table-striped">
                <thead>
                <tr class="bg-dark">
                    <th>@tt("Invoice ID")</th>
                    <th>@tt("Category")</th>
                    <th>@tt("Timings")</th>
                    <th>@tt("Fees")</th>
                    <th>@tt("Duration")</th>
                    <th>@tt("Action")</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

@endsection