{{-- Everything in this page are different from any other page, so everything is redone for this page --}}

@include('user.listing.header')

{{-- Modal Close Button --}}
<a href="#" class="close-detail hide"><i class="fa fa-close"></i></a>
{{-- Navigation --}}
@include('user.listing.navigation')

{{-- Modal --}}
@include('user.advertisement_add_modal')

{{-- If user is not logged in, then needed --}}
	{{--send offer login Modal --}}
	@include('user.listing.send_offer_login_modal')
	{{-- Send offer sign up Modal --}}
	@include('user.listing.send_offer_signup_modal')

{{-- Inner Body --}}
<div id="" class="container header-minus wraper no-padding">
    {{-- Map View --}}
    @include('user.listing.map_view')

    {{-- Listing View --}}
    <div class="listing-right">
        {{-- Ad Listing --}}
        <div class="ad-listing">
            {{-- Filter --}}
            @include('user.listing.filter')

            {{-- Results --}}
            <div class="results">

                <div class="r-hdr col-lg-12">
                  
                  <h6 class="pull-left">Found (6) Records</h6>

                  <div class="pull-right">

                    <a href="#" title="box" class="blocks fa fa-fw pos-adj6 changeview selected-view">&#xf00a;</a>
                    <a href="#" title="list" class="list fa fa-fw pos-adj7 changeview">&#xf0ca;</a>

                  </div>

                </div>

                <div class="clearfix">
                  
                </div>

                <div id="box" class="box-posting">

                    {{-- community posting start --}}
                    <div class="col-lg-4 col-sm-6">

                        <div class="pos-rel">
                          <a href="#" class="wsh-lst">
                                        <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                        <g>
                                            <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                                c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                                c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                                c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                            <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                                c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                                c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                                c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                                c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                                c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                                c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                                L171.747,0.078z"/>
                                        </g>
                                        </svg>
                            </a>  
                        
                            <div class="box showonmap9">

                                <div class="img-box-list">
                                    <img src="images/a-pic3.jpg">
                                    
                                </div>

                                <div class="box-content">

                                    <h5>Iphone</h5>
                                    <h6> $500</h6>

                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            Iphone 4s with complete accesseries for sale.
                                            Original Box is also with iPhone. It's condition is really OutStanding ...<br> 
                                        </p>
                                    </div>


                                </div>

                            </div>
                        </div>    

                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
                                <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                <g>
                                    <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                        c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                        c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                        c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                    <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                        c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                        c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                        c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                        c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                        c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                        c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                        L171.747,0.078z"/>
                                </g>
                                </svg>
                            </a> 
                            <div class="box showonmap13">
                                <div class="img-box-list">
                                    <img src="images/a-pic-2.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>Honda Civic</h5>
                                    <h6> $10000</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            Honda Civic Model 2006 in Awesome neat 
                                            and clean condition  <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
                                <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                <g>
                                    <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                        c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                        c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                        c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                    <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                        c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                        c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                        c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                        c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                        c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                        c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                        L171.747,0.078z"/>
                                </g>
                                </svg>
                            </a>
                            <div class="box showonmap12">
                               <div class="img-box-list"> 
                                    <img src="images/a-pic5.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>House for Sale</h5>
                                    <h6> $5000</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            A house near canal with 3 bed rooms and 
                                            TV lounge and big.<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
                                <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                <g>
                                    <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                        c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                        c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                        c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                    <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                        c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                        c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                        c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                        c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                        c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                        c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                        L171.747,0.078z"/>
                                </g>
                                </svg>
                            </a>
                            <div class="box showonmap11">
                                <div class="img-box-list">
                                    <img src="images/500x500.jpg" alt="Hill Vaction">
                                </div>
                                <div class="box-content">
                                    <h5>Laptops in bulk</h5>
                                    <h6> $1200</h6>
                                    <div class="clearfix margin-bottom-ten"></div>
                                    <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                    <div class="pull-left margin-left-ten width-adj3">
                                        <p class="pull-left dot1">
                                            We have a large verity of used laptops. 
                                            Checkout our complete rangel. Please Visit
                                            our office for more details.<br> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
                                <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                <g>
                                    <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                        c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                        c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                        c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                    <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                        c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                        c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                        c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                        c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                        c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                        c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                        L171.747,0.078z"/>
                                </g>
                                </svg>
                            </a>
                            <div class="box showonmap10">
                                <div class="img-box-list">
                                    <img src="images/300x700.jpg" alt="Hill Vaction">
                                </div>
                            <div class="box-content">
                                <h5>Wodden Rack</h5>
                                <h6> $500</h6>
                                <div class="clearfix margin-bottom-ten"></div>
                                <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                <div class="pull-left margin-left-ten width-adj3">
                                    <p class="pull-left dot1">
                                        Wood Rack for Sale <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <div class="col-lg-4 col-sm-6">

                        <div class="pos-rel">
                            <a href="#" class="wsh-lst">
                                <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                                <g>
                                    <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                        c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                        c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                        c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                    <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                        c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                        c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                        c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                        c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                        c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                        c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                        L171.747,0.078z"/>
                                </g>
                                </svg>
                            </a>

                            <div class="box showonmap14">
                                <div class="img-box-list">
                                    <img src="images/200x200.jpg" alt="Hill Vaction">
                                </div>

                            <div class="box-content">


                                <h5>Samsung LCD for Sale</h5>
                                <h6> $100</h6>

                                <div class="clearfix margin-bottom-ten"></div>
                                <img class="pull-left width-adj2" src="images/pp-5.jpg">
                                <div class="pull-left margin-left-ten width-adj3">
                                <p class="pull-left dot1">
                                    Samsung LCD Model 124567 in mint 
                                    condition is for Sale. <br>
                                </p>
                                </div>
                            </div>



                            </div>
                        </div>

                    </div>

                </div>

                <div id="list" class="list-posting" style="display:none">
                    
                    <img src="images/p-favicon-3.jpg" class="s-img loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap11">Laptops in bulk</a> <b>Price : $500</b>   <span>We have a large verity of used laptops.   We have a large verity of used laptops.</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon.jpg" class="s-img loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap9">Iphone</a> <b>Price : $1000</b>   <span>Iphone 4s with complete accesseries for sale. Original Box is also with iPhone Iphone 4s  with ...</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-6.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap14">Samsung LCD</a> <b>Price : $100</b>   <span>Samsung LCD Model 124567 in mint condition is for Sale. Samsung LCD Model 124567 in mint condition is ...</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-2.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap10">Wood Rack</a> <b>Price : $50</b>   <span>Wood Rack for sale</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-5.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap13">Honda Accord</a> <b>Price : $5000</b>   <span>Honda Accord with Sprots Tyre Only 1000Km Used</span>
                    </div>
                    <div class="clearfix margin-ten"></div>
                    <img src="images/p-favicon-4.jpg" class="s-img loaded-image loaded-image">
                    <div class="pull-left ldetail">
                        <a href="#" class="showonmap12">House For Sale</a> <b>Price : $50000</b>   <span>A house near canal with 3 bed rooms and TV lounge is for sale</span>
                    </div>
                    <div class="clearfix margin-twenty"></div>
                </div>
              
            </div>
        </div>
        <div class="clearfix "></div>
        {{-- Ad detail --}}
        <div class="ad-detail">

            {{-- Ad Slider--}}
            
            {{-- Result detail --}}
            {{-- Ad Listing --}}
            <div class="variable-width">
              <div><img src="http://c3.staticflickr.com/8/7252/6883150650_b4e7c18007.jpg"></div>
              <div><img src="http://c8.staticflickr.com/1/80/255871583_d4df0e741f_n.jpg"></div>
              <div><img src="http://c1.staticflickr.com/4/3256/2860461368_6441f08834_m.jpg"></div>
              <div><img src="http://c2.staticflickr.com/9/8309/8044300313_5ee7865f34_m.jpg"></div>
            </div>
            <div class="results-det">
                <div class="col-lg-9">
                    <div class="col-lg-12 no-padding rd-top-row">
                        <h4 class="pull-left">Iphone</h4>
                        <a class="direction pull-right" href="#"><i class="fa fa-location-arrow"></i>Directions</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding rd-top-row2">
                        <h5 class="pull-left">Price: <span>$1000</span></h5>
                        <div class="pull-right popups">
                            <a data-original-title="Add to Wishlist" href="#" class="wsh-lst-adpage grey-tooltip" data-toggle="tooltip" data-placement="top" title="">
                            <svg class="wsh-hrt" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="253px" height="245px" viewBox="-7.5 -9.5 253 245" enable-background="new -7.5 -9.5 253 245" xml:space="preserve">
                            <g>
                                <path class="wsh-path-fill" d="M116.023,215.578c-17.125-24.631-37.74-42.691-55.929-58.625C29.842,130.451,3.722,107.568,3.722,65.478
                                    c0-34.131,27.768-61.899,61.898-61.899c19.793,0,38.57,9.667,50.228,25.858l2.841,3.946l2.84-3.946
                                    c11.652-16.191,30.425-25.857,50.218-25.857c34.131,0,61.898,27.768,61.898,61.899c0,40.154-27.194,64.258-55.986,89.778
                                    c-19.502,17.288-39.668,35.165-56.267,60.258l-2.639,3.991L116.023,215.578z"/>
                                <path class="wsh-path-outline" d="M171.747,7.078c32.201,0,58.398,26.198,58.398,58.399c0,17.471-5.154,32.71-16.221,47.958
                                    c-10.172,14.016-23.974,26.249-38.586,39.2c-19.592,17.368-39.847,35.323-56.657,60.633
                                    c-17.327-24.825-38.018-42.951-56.287-58.955C31.569,127.311,7.222,105.982,7.222,65.477c0-32.201,26.197-58.399,58.398-58.399
                                    c18.671,0,36.386,9.123,47.388,24.403l5.682,7.892l5.68-7.893C135.367,16.2,153.078,7.078,171.747,7.078 M171.747,0.078
                                    c-21.148,0-40.904,10.424-53.058,27.313C106.526,10.499,86.768,0.078,65.62,0.078c-36.058,0-65.398,29.335-65.398,65.399
                                    c0,43.674,26.672,67.044,57.559,94.102c18.039,15.803,38.486,33.714,55.369,57.996l5.676,8.163l5.485-8.294
                                    c16.341-24.704,36.336-42.431,55.67-59.571c29.402-26.061,57.164-50.679,57.164-92.397C237.145,29.413,207.809,0.078,171.747,0.078
                                    L171.747,0.078z"/>
                            </g>
                            </svg>
                            </a>
                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-comment-o grey-tooltip" href="#" data-original-title="Reviews"></a>

                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-eye grey-tooltip" href="#" data-original-title="157"></a>

                          
                            <a title="" data-placement="top" data-toggle="tooltip" class="fa fa-thumbs-o-up grey-tooltip" href="#" data-original-title="Like"></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding">
                        <div class="dropdown">
                            <a data-toggle="dropdown" class="direction dropdown-toggle loginbtn pull-left" href="#"><i class="fa fa-gavel"></i>Send Offer
                            </a>
                            {{-- 
	                            <!-- If user is logged in  -->
	                            <!-- <ul class="dropdown-menu no-padding loginpopup col-lg-4">
	                                <li>
	                                    <form class="offer" action="#">
	                                        
	                                        <div class="form-group">
	                                            <span class="text-adj1">Name : Jonathan Kaneer </span>
	                                        </div>

	                                        <div class="form-group">
	                                        <span class="text-adj1">Email : jk@yahoo.com </span>
	                                        </div>

	                                        <div class="form-group">
	                                        <span class="text-adj1">Cell : 123-456-789 </span>

	                                        </div>

	                                        <div class="form-group">
	                                            <input type="text" onkeypress="return numbersonly(this, event)" placeholder="Your Offer in $" id="InputPasswords" class="form-control normal-input">
	                                        </div>

	                                        <div class="form-group">
	                                            <textarea class="form-control medium-textarea no-margin" rows="3" placeholder="Message"></textarea>
	                                        </div>


	                                        <button class="btn btn-default green-small" type="submit">Place Offer</button>


	                                    </form>

	                                </li>
	                                
	                            </ul> -->
	                            <!-- If user is not logged in  -->
                            --}}
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="pos-adj03">
                                        <span>Please </span><a href="#" class="def" data-toggle="modal" data-target="#lgn-pup" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">LOGIN</a>
                                        or
                                        <a data-toggle="modal" data-target="#sgn-pup" class="" href="#" style="color: #23a500 !important; font-size: 10pt !important; padding: 0 !important;">SIGN UP</a> to continue
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 no-padding description rd-top-row">
                      

                         - Complet accesseries are available<br>
                         - Out Standing Condition.<br>
                         - 2 months warenty remaining <br><br>

                        Iphone 4s with complete accesseries for sale. Original Box is also with iPhone Iphone 4s with complete 
                        accesseries for sale. Original Box is also with iPhone. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, 
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.

                        <div class="cleafix"></div>

                        <a class="review" href="#">Write Review</a>

                        <div class="write-review hide">
                            <form action="#" class="offer">
                                <div class="form-group">
                                    <textarea class="form-control tarea" placeholder="Write your Reviews" rows="3"></textarea>
                                    <div class="col-lg-12 margin-top-twenty margin-bottom-twenty">
                                     <span class="pull-left margin-right-twenty">Please rate your experience</span>
                                    <input type="number" class="rating" id="test" name="test" data-min="1" data-max="5" value="0">
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-default green-small review-submit show">Submit</button>
                            </form>
                        </div>

                        <div class="share">

                            <span>Share on </span>

                            <a class="sm fa fa-facebook " href="#"></a>
                            <a class="sm fa fa-twitter " href="#"></a>
                            <a class="sm fa  fa-google-plus" href="#"></a>

                        </div>

                    </div>

                    <div class="col-lg-12 reviews">

                        <div class="col-lg-4 rone">
                          Jonathan Kaneer<br>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i><br>
                          <span>May 5, 2015</span>

                        </div>

                        <div class="col-lg-8 rtwo">
                          <span>Everything seems good as far as it’s the same as written</span>
                        </div>

                        <div class="clearfix margin-twenty"></div>

                        <div class="col-lg-4 rone">
                          Bilal Munawar<br>
                            <i class="fa fa-star fa-xs green-text"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i>
                            <i class="fa fa-star-o fa-xs"></i><br>
                          <span>June 5, 2015</span>
                        </div>

                        <div class="col-lg-8 rtwo">
                          <span>I wish to have this phone in less price I have contacted but she did not accept my offer</span>
                        </div>

                        <div class="clearfix margin-twenty"></div>

                    </div>

                </div>








                <div class="col-lg-3 no-padding">

                    <div class="contact-bar">
                      
                        <div class="sb-top">

                            <img class="pround" alt="Jesica" src="images/pp-1.jpg">
                            <h6>Jesica Alben</h6>
                            <div class="star">
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star green-text"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>

                        <div class="sb-middle">

                            <span><i class="fa fa-phone"></i>123-456-789</span>

                            <span><i class="fa fa-globe"></i><a #="" href="">www.jalben.com</a></span>

                            <span><i class="fa fa-envelope"></i>info@jablen.com</span>

                            <span><i class="fa fa-facebook"></i><i class="fa fa-check-circle p-adj"></i>Facebook Verified</span>

                            <span><i class="fa fa-credit-card"></i>Accepts Credit Card</span>

                        </div>

                        <div class="sb-bottom dropdown">

                            <a data-toggle="dropdown" type="submit" class="btn loginbtn green-large width-adj dropdown-toggl" href="#">Contact</a>

                            <ul class="dropdown-menu no-padding loginpopup col-lg-4 contact">
                                <li>
                                    <form class="offer" action="#">
                                        
                                        <div class="form-group">
                                        <textarea rows="3" placeholder="Any Question" class="form-control tarea"></textarea>
                                        </div>


                                        <button class="btn btn-default green-small width-adj" type="submit">Send Message</button>


                                    </form>

                                </li>
                                
                            </ul>
                          
                        </div>



                    </div>

                </div>
              
            </div>

            <div class="clearfix "></div>
        </div>

        <div class="clearfix "></div>

        <footer>
            <div class="first-strip">
                <div class="container-fluid">
                    <a href="#">Blog</a>
                    |
                    <a href="#">Site Map</a>
                    |
                    <a href="#">Privacy</a>
                    |
                    <a href="#">About Us</a>
                    |
                    <a href="#">Contact Us</a>
                    |
                    <a href="#">Help</a>
                    |
                    <a href="#">Terms & Conditions</a>
                </div>    
            </div>
            <div class="second-strip">
                <div class="container">
                    <div class="hidden-lg hidden-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <button data-target="#pfa" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <a class="round fa fa-fw" href="#"></a>
                        <a class="round fa fa-fw" href="#"></a>
                        <a class="round fa fa-fw" href="#"></a>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
                </div>
            </div>
            <div class="third-strip">
                <div class="container-fluid">
                    © Copyright Mapitem 2016
                </div>
            </div> 
        </footer>
    </div>

</div>

@include('user.listing.footer_scripts')