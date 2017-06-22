@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#accounts" aria-controls="accounts" role="tab" data-toggle="tab">
                                Accounts <span class="badge">{{ $accounts['metadata']['total'] }}</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#items" aria-controls="items" role="tab" data-toggle="tab">                             
                                Items <span class="badge">{{ $items['metadata']['total'] }}</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#itemAccount" aria-controls="itemAccount" role="tab" data-toggle="tab">
                                Item Account
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">
                                Orders <span class="badge">{{ $items['metadata']['total'] }}</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#orderItem" aria-controls="orderItem" role="tab" data-toggle="tab">
                                Order Item
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#createOrder" aria-controls="createOrder" role="tab" data-toggle="tab">Create Order / Order Item</a>
                        </li>                      
                    </ul>

                    <div class="tab-content">

                        <!-- ACCOUNTS -->
                        <div role="tabpanel" class="tab-pane active" id="accounts">
                            <h3>Accounts</h3>

                            @if(is_null($accounts))
                                <div class="alert alert-danger">
                                    System error. Please contact your administrator.
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <strong>Test</strong> - To read Accounts from API<br>
                                    <strong>Result</strong> - Able to get result from API
                                </div>

                                @foreach($accounts['data'] as $k => $v)
                                    @foreach ($v as $key => $value)
                                        @if($key == 'name')
                                        {{ $key }} => <strong><font color="green">{{ $value }}</font></strong>
                                        @else
                                        {{ $key . ' => ' . $value }}
                                        @endif
                                        <br>
                                    @endforeach
                                    <hr />
                                @endforeach
                            @endif
                        </div>

                        <!-- ITEMS -->
                        <div role="tabpanel" class="tab-pane" id="items">  
                            <h3>Item Lists</h3>

                            @if(is_null($items))
                                <div class="alert alert-danger">
                                    System error. Please contact your administrator.
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <strong>Test</strong> - To read Items from API<br>
                                    <strong>Result</strong> - Able to get result from API
                                </div>                                                    
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
                            @endif
                        </div>

                        <!-- ITEM ACCOUNT -->
                        <div role="tabpanel" class="tab-pane" id="itemAccount">  
                            <h3>Item Account Lists</h3>

                            @if(is_null($itemAccount))
                                <div class="alert alert-danger">
                                    System error. Please contact your administrator.
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <strong>Test</strong> - To read Item Account from API.<br>
                                    <strong>Result</strong> - Able to get result from API.                                                    
                                </div>                            
                                <div class="alert alert-danger">
                                    <strong>Note:</strong> Able to get result, but system may returns incorrect information.<br><br>
                                    <u>Based on table definition below</u><br>
                                    <strong>ItemAccount</strong> – slave table to Item, contains additional data for the same SKU on different marketplaces, for example title and price are usually different on every marketplace, and depend on the marketplace’s language and currency.<br><br>
                                    
                                    I think system returns only a few information which are not enought to implement next step.
                                </div>                                                        
                                @foreach($itemAccount['data'] as $k => $v)
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
                            @endif                           
                        </div>

                        <!-- ORDERS -->
                        <div role="tabpanel" class="tab-pane" id="orders"> 
                            <h3>Order Lists</h3>

                            @if(is_null($orders))
                                <div class="alert alert-danger">
                                    System error. Please contact your administrator.
                                </div>
                            @else
                                <div class="alert alert-success">
                                    <strong>Test</strong> - To read Orders from API<br>
                                    <strong>Result</strong> - Able to get result from API                              
                                </div>                            
                                @foreach($orders['data'] as $k => $v)
                                    {{ $k . ' => ' . $v }} <br>              
                                @endforeach                            
                            @endif
                        </div>

                        <!-- ORDER ITEM -->
                        <div role="tabpanel" class="tab-pane" id="orderItem">  
                            <h3>Order Item Lists</h3>

                            @if(is_null($orders))
                                <div class="alert alert-danger">
                                    System error. Please contact your administrator.
                                </div>
                            @else                            
                                <div class="alert alert-success">
                                    <strong>Test</strong> - To read Order Item from API.<br>
                                    <strong>Result</strong> - Able to get result from API.                                                    
                                </div>                            
                                <div class="alert alert-danger">
                                    <strong>Note:</strong> Able to get result, but system may returns incorrect information.<br><br>
                                    <u>Based on table definition below</u><br>
                                    <strong>OrderItem</strong> – single line for every SKU in the order with the quantity ordered.<br><br>
                                    
                                    I think system returns only a few information which are not enought to implement next step.
                                </div>                            
                                @foreach($orders['data'] as $k => $v)
                                    {{ $k . ' => ' . $v }} <br>              
                                @endforeach 
                            @endif
                        </div>

                        <!-- CREATE ORDER -->
                        <div role="tabpanel" class="tab-pane" id="createOrder">  
                            <h3>Order Details</h3>
                            <div class="alert alert-danger">
                                <strong>Test</strong> - To create Order + Order Items from existing Items/ItemAccounts<br>
                                <strong>Result</strong> - I can't finish this test.<br>
                                <strong>Reason:</strong> Based on my understanding I think the ItemAccounts API returns wrong information. So I can't finish this section but mocking-up a few UIs only.
                            </div>                            
 
                            <form class="form-horizontal">
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Buyer User ID:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="buyer_user_id" placeholder="Enter Buyer User ID">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Buyer Email:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="buyer_email" placeholder="Enter Buyer Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping Service:</label>
                                <div class="col-sm-6"> 
                                    <select class="form-control" id="shipping_service" name="shipping_service">
                                        <option value="0">Please Select</option>
                                        <option value="1">UK Standard Seller Rating</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                        <option value="5">Option 5</option>
                                    </select>   
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping Buyer Name:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="shipping_buyer_name" placeholder="Enter Shipping Buyer Name">
                                </div>
                              </div>
                              <div class="form-group">                                
                                <label class="control-label col-sm-4" for="pwd">Shipping Country:</label>
                                <div class="col-sm-6"> 
                                    <select class="form-control" id="shipping_country_code" name="shipping_country_code">
                                        <option value="0">Please Select</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select> 
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping City:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="shipping_city" placeholder="Enter Shipping City">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping Postal Code:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="shipping_postal_code" placeholder="Enter Shipping Postal Code">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping Street:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="shipping_street" placeholder="Select Shipping Street">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Shipping Phone:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="shipping_phone" placeholder="Select Shipping Phone">
                                </div>
                              </div>

                              <hr>
                              <h3>Select Items</h3>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Select Marketplace:</label>
                                <div class="col-sm-6"> 
                                    <select class="form-control" id="account_id" name="account_id">
                                        <option value="0">Please Select Marketplace</option>
                                        <option value="1">eBay UK</option>
                                        <option value="2">Lazada MY</option>
                                        <option value="3">Lazada TH</option>
                                        <option value="4">Amazon DE</option>
                                    </select>   
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Item:</label>
                                <div class="col-sm-6"> 
                                    <select class="form-control" id="item_id" name="item_id">
                                        <option value="0">Select Item</option>
                                        <option value="1">Example Item 1</option>
                                        <option value="2">Example Item 2</option>
                                        <option value="3">Example Item 3</option>
                                        <option value="4">Example Item 4</option>
                                        <option value="5">Example Item 5</option>
                                    </select>   
                                </div>
                              </div>  
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Price:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="price" readonly>
                                </div>
                              </div>  
                              <div class="form-group">
                                <label class="control-label col-sm-4" for="pwd">Quantity:</label>
                                <div class="col-sm-6"> 
                                  <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="control-label col-sm-4" for="note">Note:</label>
                                <div class="col-sm-6"> 
                                    <textarea class="form-control" id="note" placeholder=""></textarea>
                                </div>
                              </div>

                              <div class="form-group"> 
                                <div class="col-sm-offset-4 col-sm-6">
                                  <button type="submit" class="btn btn-default">Submit Order</button>
                                </div>
                              </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection