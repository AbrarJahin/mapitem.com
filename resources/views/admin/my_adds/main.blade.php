@extends('admin.master')

@section('page_title', 'My Adds')
@section('meta_page_description', 'Content on this page are My Adds')

@section('footer_scripts')
    @parent
    <script src="{{ URL::asset('js/custom.js') }}"></script>
@endsection

@section('content')


	    <div class="db-body">

            <section class="p-head col-lg-12">

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding">
                    <div class="dropdown pull-left">
                      <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="dropdownMenu1" type="button" class="dropdown-toggle sbtn">
                        <i class="fa fa-pencil "></i>Settings
                      </button>
                      <ul aria-labelledby="dropdownMenu1" class="dropdown-menu no-underline">
                        <li><a href="#" class="edit1">Edit</a></li>
                        <li><a href="#">End Listing</a></li>
                        
                        
                      </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding"><i class="fa fa-bookmark"></i><span>Added to wishlist by :</span><b>5 Users</b></div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-comment-o"></i><span>Reviews :</span><b>8</b></div>

                <div class="clearfix visible-sm"></div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-eye"></i><span>Viewed by :</span><b>150</b></div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-heart-o"></i><span>  Liked by :</span><b>150</b></div>

            </section>

            <div class="db-adc">

                <div class="col-lg-3 col-md-3 col-sm-5 no-padding">
                    <img src="images/db-img1.jpg" class="pic-adj img-responsive">
                </div>

                <div class="col-lg-9 col-md-9 col-sm-7 dleft">
                    <h3>Hill Vacations</h3>
                    <div class="pull-right">
                        <span>Price : </span>
                        <b>$500</b>  
                    </div>
                    <div class="clearfix"></div>
                    <p>Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place where Torreist comes across the world. <a href="#">View More</a></p>

                    <ul>
                        <li>
                            <span><img src="images/u-logo.jpg"></span>
                            Paradise Travelling Company
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            123-456-789
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            <a href="">www.paradisetravel.com</a>
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            <a target="_top" href="mailto:someone@example.com?Subject=Hello%20again">info@pardistravel.com</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

{{--
        <div class="db-body edit-on">

            <section class="p-head col-lg-12">

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding edit-selected"><a href="" class="edit1 ed"><i class="fa fa-pencil"></i><b>Edit</b></a></div>
                

                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding"><i class="fa fa-bookmark"></i><span>Added to wishlist by :</span><b>5 Users</b></div>


                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-comment-o"></i><span>Reviews :</span><b>8</b></div>

                <div class="clearfix visible-sm"></div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-eye"></i><span>Viewed by :</span><b>150</b></div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-heart-o"></i><span>  Liked by :</span><b>150</b></div>

            </section>

            <div class="db-adc">

                <div class="col-lg-3 col-md-3 col-sm-5 no-padding">
                    <a href="#"><img src="images/upload-pic.jpg" class="img-responsive"></a>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-7 dleft">
                   
                    <h3>
                        <div class="form-group">
                        <input type="email" placeholder="Ad Title" id="InputEmail1" class="form-control normal-input">
                        </div>
                    </h3>
                    <div class="pull-right">
                        <span class="lh-adj">Price : </span>
                        <b><div class="">
                        <input type="email" placeholder="Price" id="InputEmail1" class="form-control normal-input">
                        </div></b>  
                    </div>
                    <div class="clearfix"></div>
                    <p> <textarea class="form-control" rows="5" id="comment" placeholder="Description"></textarea></p>

                    <a class="green-small pull-right save no-textdecor" href="#">Save</a>

                </div>

            </div>

        </div>
--}}

        <div class="db-body pos-rel">

            <div class="inative-list"><a href="" class="relist">Relist</a><br><span class="ia">Inactive Ad</span></div>
            <div class="active-list">

                <section class="p-head col-lg-12 demo">

                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding">
                       <div class="dropdown pull-left">
                         <button class="dropdown-toggle sbtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-pencil "></i>Settings
                         </button>
                         <ul class="dropdown-menu no-underline" aria-labelledby="dropdownMenu1">
                           <li><a class="edit1" href="#">Edit</a></li>
                           <li><a href="#">End Listing</a></li>
                           
                           
                         </ul>
                       </div>
                    </div>

                   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding"><i class="fa fa-bookmark"></i><span>Added to wishlist by :</span><b>5 Users</b></div>

                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-comment-o"></i><span>Reviews :</span><b>8</b></div>

                   <div class="clearfix visible-sm"></div>

                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-eye"></i><span>Viewed by :</span><b>150</b></div>

                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 no-padding"><i class="fa fa-heart-o"></i><span>  Liked by :</span><b>150</b></div>

                </section>

                <div class="db-adc">

                    
                    <div class="col-lg-3 col-md-3 col-sm-5 no-padding">
                    <img class="pic-adj img-responsive" src="images/db-img1.jpg">
                </div>

                <div class="col-lg-9 col-md-9 col-sm-7 dleft">
                    <h3>Hill Vacations</h3>
                    <div class="pull-right">
                        <span>Price : </span>
                        <b>$500</b>  
                    </div>
                    <div class="clearfix"></div>
                    <p>Enjoy Trip to Kashmir Valley, Kashmir Valley is the one Natural Place where Torreist comes across the world. <a href="#">View More</a></p>

                    <ul>
                        <li>
                            <span><img src="images/u-logo.jpg"></span>
                            Paradise Travelling Company
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            123-456-789
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            <a href="">www.paradisetravel.com</a>
                        </li>
                        <li>
                            <span class="fa fa-fw icon-adj"> </span>
                            <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">info@pardistravel.com</a>
                        </li>
                    </ul>
                </div>

            
                </div>

            </div>

        </div>

@endsection