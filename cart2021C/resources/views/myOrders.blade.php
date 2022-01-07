@extends('layout')
@section('content')

<div class="row">
    
    <div class="col-sm-3">

    </div>
    <form action="{{ route('payment.post') }}" method="post" class="require-validation" data-cc-on-file="false"
    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
    @csrf
    <div class="col-sm-9">
        <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

       
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Payment status</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)


                    <tr>

                        <td>{{$order->id}}</a></td>
                        <td>{{$order->paymentStatus}}</td>
                        <td>{{$order->amount}}</td>

                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
  

            
            
        </form>
    </div>
    <div class="col-sm-3">
        
    </div>
    </form>

</div>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
        <a class="btn btn-xs btn-info" href="{{(route('pdfReport'))}}">Download Report</a>
    </div>
</div>

@endsection


