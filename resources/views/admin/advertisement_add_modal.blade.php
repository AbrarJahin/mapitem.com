        <!-- Modal -->
        <div id="pfa" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Post Free Ad</h4>
              </div>
              <div class="modal-body" >
                <ul class="nav nav-tabs nav-tabs-top pf-modal" role="tablist">
                    <li class="ta active"><a href="#title" class="bs-overwrite" aria-controls="home" role="tab" data-toggle="tab">1. Title - Description</a></li>
                    <li class="ta"><a href="#image" class="bs-overwrite" aria-controls="profile" role="tab" data-toggle="tab">2. Upload Images</a></li>
                    <li class="ta"><a class="bs-overwrite" href="#location" aria-controls="profile" role="tab" data-toggle="tab">3. Location</a></li>
                </ul>
                <form class="tab-content adj1">
                     <div id="title" class="tab-pane form-group title active ">
                      
                          <select class="form-control medium-select" id="sel1">
                            <option id="selected">Select Category</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>

                          <select class="form-control medium-select" id="sel1">
                            <option id="selected">Select Sub Category</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>

                        
                            

                            <div class="row">
                              
                            
                            <div class="col-lg-8">
                                <input type="text" class="form-control normal-input margin-adj" id="adtitle" placeholder="Ad Title">
                            </div>
                            
                            <div class="col-lg-4">

                                <input type="text" class="form-control normal-input margin-adj" id="price" placeholder="Price">  
                            </div>
                            </div>

                            <textarea class="form-control medium-textarea" rows="4" placeholder="Ad Description"></textarea>

                    </div>

                    <div id="image" class="image tab-pane ">
                            <button type="button" class="btn btn-default upload-btn">Upload Ad Images</button>
                    </div>

                    <div id="location" class="formbox location tab-pane ">

                        <label class="margin-adj"><input id="infocheckbox" type="checkbox" value=""> <span class="li">Use other Location</span></label>

                        <div class="loc-info">

                            <input type="text" class="form-control normal-input margin-adj" id="disabledInput" placeholder="80 D" disabled>

                            <input type="text" class="form-control normal-input margin-adj" id="disabledInput" placeholder="Lahore" disabled>

                            <input type="text" class="form-control normal-input margin-adj" id="disabledInput" placeholder="Punjab" disabled>

                            <input type="text" class="form-control normal-input margin-adj" id="disabledInput" placeholder="54000" disabled>

                            <input type="text" class="form-control normal-input margin-adj" id="disabledInput" placeholder="Pakistan" disabled>

                            

                        </div>

                        <div class="loc-info-edit">
                          
                            <input type="text" class="form-control normal-input margin-adj" id="adaddress" placeholder="Ad Address">

                            <input type="text" class="form-control normal-input margin-adj" id="adcity" placeholder="Ad City">

                            <input type="text" class="form-control normal-input margin-adj" id="adstate" placeholder="Ad State">

                            <input type="text" class="form-control normal-input margin-adj" id="adzipcode" placeholder="Ad Zipcode">

                            <input type="text" class="form-control normal-input margin-adj" id="adcountry" placeholder="Ad Country">

                            

                        </div>


                        <div class="clearfix"></div>

                        <a href="#" class="grey-small pull-left no-textdecor" >Finish</a>

                    </div>

                </form>
              </div>
              <div class="clearfix margin-twenty"></div>
              <div class="modal-footer">
                <ul class="nav nav-tabs nav-tabs-bottom pf-modal" role="tablist">
                    <li class="ta active"><a href="#title" class="bs-overwrite" aria-controls="home" role="tab" data-toggle="tab">Step 1</a></li>
                    <li class="ta"><a href="#image" class="bs-overwrite" aria-controls="profile" role="tab" data-toggle="tab">Step 2</a></li>
                    <li class="ta"><a class="bs-overwrite" href="#location" aria-controls="profile" role="tab" data-toggle="tab">Step 3</a></li>
                </ul>

                <!-- <a href="#" class="grey-small pull-left no-textdecor" >Previous</a>
                <a href="#" class="green-small pull-left no-textdecor">Next</a>
                <a href="#" class="done-small green-small hide pull-left no-textdecor">Done</a> -->

                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
              </div>
            </div>

          </div>
        </div>