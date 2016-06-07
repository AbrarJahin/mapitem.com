<footer>
    <div class="first-strip">
        <div class="@if ($current_page === 'Add Listing')
                container-fluid
                @else
                container
                @endif">
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

            <div class="@if ($current_page === 'Add Listing')
                        hidden-lg hidden-md-1 hidden-sm hidden-xs
                        @else
                        col-lg-3 col-md-3 hidden-sm hidden-xs
                        @endif"></div>

            <div class="col-lg-3 col-md-3
                        @if ($current_page === 'Add Listing')
                        col-sm-3
                        @else
                        col-sm-6
                        @endif
                        col-xs-12">

                <button data-target="#pfa" data-toggle="modal" class="btn adj  green-large adj12" type="submit">Post Free Ad</button>

            </div>

            <div class="col-lg-3 col-md-3
                        @if ($current_page === 'Add Listing')
                        col-sm-4
                        @else
                        col-sm-6
                        @endif
                        col-xs-12">

                <a class="round fa fa-fw" href="#"></a>

                <a class="round fa fa-fw" href="#"></a>

                <a class="round fa fa-fw" href="#"></a>

            </div>

            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
        </div>
    </div>
    <div class="third-strip">
        <div class="@if ($current_page === 'Add Listing')
                container-fluid
                @else
                container
                @endif">
            © Copyright Mapitems 2016
        </div>
    </div> 
</footer>