@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#accounts" aria-controls="accounts" role="tab" data-toggle="tab">Accounts {{-- $accounts['metadata']['total'] --}}</a></li>
                        <li role="presentation"><a href="#items" aria-controls="items" role="tab" data-toggle="tab">Items {{-- $items['metadata']['total'] --}}</a></li>
                        <li role="presentation"><a href="#itemAccount" aria-controls="itemAccount" role="tab" data-toggle="tab">Item Account</a></li>
                        <li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
                        <li role="presentation"><a href="#orderItem" aria-controls="orderItem" role="tab" data-toggle="tab">Order Item</a></li>
                        <li role="presentation"><a href="#createOrder" aria-controls="createOrder" role="tab" data-toggle="tab">Create Order</a></li>                      
                        <li role="presentation"><a href="#createOrderItem" aria-controls="createOrderItem" role="tab" data-toggle="tab">Create Order Item</a></li>
                    </ul>

                    <div class="tab-content">

                        <!-- ACCOUNTS -->
                        <div role="tabpanel" class="tab-pane active" id="accounts">
                            <br>
                            <font color="green">OK</font>
                            <br><br>
                            <pre>
curl -H "Content-Type: application/json" -X GET -d '{"sessionKey":"{{Auth::user()->token}}"}' http://api2-client.myhemisphere.com/accounts.xml
                            </pre>

                            @foreach($accounts['data'] as $k => $v)
                                @foreach ($v as $key => $value) 
                                    {{ $key . ' => ' . $value }} <br>
                                @endforeach
                                <hr />
                            @endforeach
                        </div>

                        <!-- ITEMS -->
                        <div role="tabpanel" class="tab-pane" id="items">    
                            <br>
                            <font color="green">OK</font>
                            <br><br>
                            <pre>
curl -H "Content-Type: application/json" -X GET -d '{"sessionKey":"{{Auth::user()->token}}"}' http://api2-client.myhemisphere.com/items.xml
                            </pre>

                            @foreach($items['data'] as $k => $v)
                                @if($k <> 'itemAccountIDs')
                                    {{ $k . ' => ' . $v }} <br>
                                @else
                                    {{ $k }} <br>
                                    @foreach ($v as $key => $value) 
                                        &nbsp;&nbsp;&nbsp;
                                        {{ $key . ' => ' . $value }} <br>
                                    @endforeach
                                @endif                
                            @endforeach
                        </div>

                        <!-- ITEM ACCOUNT -->
                        <div role="tabpanel" class="tab-pane" id="itemAccount">  
                            <br>
                            <font color="red">ERROR. I found error and send email back to verify.</font>
                            <br><br>
                            <pre>
Root: http://api2-client.myhemisphere.com/items/account/&lt;id&gt;.xml
Description: Read ItemAccount details for given ItemAccount's identification.
Request: GET

Example: http://api2-client.myhemisphere.com/items/account/1.xml?sessionKey=&lt;put here the sessionKey you have received from the login request&gt;

Required parameters:
1) sessionKey
2) id – ItemAccount's identification.
                            </pre>
                        </div>

                        <!-- ORDERS -->
                        <div role="tabpanel" class="tab-pane" id="orders"> 
                            <br>
                            <font color="green">OK</font>
                            <br><br>
                            <pre>
curl -H "Content-Type: application/json" -X GET -d '{"sessionKey":"{{Auth::user()->token}}"}' http://api2-client.myhemisphere.com/orders.xml
                            </pre>

                            @foreach($orders['data'] as $k => $v)
                                {{ $k . ' => ' . $v }} <br>              
                            @endforeach                            
                        </div>

                        <!-- ORDER ITEM -->
                        <div role="tabpanel" class="tab-pane" id="orderItem">  
                            <br>
                            <font color="red">ERROR. I found error and send email back to verify.</font>
                            <br><br>
                            <pre>
Root: http://api2-client.myhemisphere.com/orders/item.xml/:id
Description: Shows OrderItem details for given identification.
Request: GET

Required parameters:
1) sessionKey
2) id – OrderItem's identification.

Response:
1) OrderID – Identification of the Order.
2) AccountID – Identification of the account.
3) ChannelItemID – Marketplace unique identification.
                            </pre>
                        </div>

                        <!-- CREATE ORDER -->
                        <div role="tabpanel" class="tab-pane" id="createOrder">  
                            <br>
                            In progress
                            <br>
                        </div>

                        <!-- CREATE ORDER ITEM -->
                        <div role="tabpanel" class="tab-pane" id="createOrderItem">  
                            <br>
                            In progress
                            <br>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection