{{-- Search bar --}}
<div class="pos-adj5">
    <div class="container">
        <form id="search_add_from" role="form" class="tab-content adj1" method="get" action="{{ URL::route('listing') }}">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding cat">
                <button type="button" class="btn cat-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Category
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu h-ctr">
                    @foreach ($categories as $category)
                        <li class="no-border">
                            <h4 class="no-margin">{{ $category->name }}</h4>
                            <ul>
                                @foreach($category->subCategory as $sub_cat)
                                    <li>
                                        <a href="#{{ $sub_cat->id }}">{{ $sub_cat->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <input value="123" type="hidden" id="input_nav_subcategory" name="input_nav_subcategory">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding pos-rel">
                <input type="text" class="ct form-control large-input col-lg-4 input-title" id="input_nav_search" name="input_nav_search" placeholder="Search">
                <div class="ct-list">
                   <ul>
                        <li><a href="#">This is one</a></li>
                        <li><a href="#">This is two</a></li>
                    </ul> 
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                <input type="text" class="form-control large-input col-lg-4 input-title" id="user_location" name="user_location" placeholder="Location">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding cat">
                <button type="submit" class="btn srch-btn dropdown-toggle">
                Search
                </button>
            </div>
        </form>
    </div>
</div>