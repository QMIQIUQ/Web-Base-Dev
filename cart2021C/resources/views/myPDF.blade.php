<head>
    <title>Southern Online</title>
</head>
<body>
    <table class="table table-bordered">
    <thead>
        <tr>
            <td>Order ID</td>
            <td>Payment status</td>
            <td>Amount</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $order)


        <tr>

            <td>{{$order->id}}</a></td>
            <td>{{$order->paymentStatus}}</td>
            <td>{{$order->amount}}</td>

        </tr>
        @endforeach



    </tbody>
</table>
</body>
