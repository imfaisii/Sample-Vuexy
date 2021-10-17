   <!-- Row start -->
   <div class="row gutters">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="card m-0">

            <!-- Row start -->
            <div class="row no-gutters">
            
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="selected-user">
                        <span>On Channel:  <span class="name">{{$room}}</span> <br> AMS Support 
                        </span>
                         <button type="button"   style="float: right" class="btn btn-primary" onclick="endchat();" >End Chat <span class="btn-icon-right"><i
            class="fa fa-handshake-o"></i></span>
                    </div>
                    <div class="chat-container">
                        <ul class="chat-box chatContainerScroll">

                            <div id="message"></div>
                        </ul>
                        <div class="form-group mt-3 mb-0">
                            <form id="chat_form"  method="post">
                            <div class="input-group ">
                              
                                <input class="form-control" id="message_input"
                                    placeholder="Type your message here" autocomplete="off">

                                <button class="btn btn-success no-rounded" id="btn-chat" style="background-color: #7367F0 !important"
                                    type="button">Send</button>
                           

                            </div><!-- /input-group -->
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>

    </div>

</div>
<!-- Row end -->


@include('support.variables_chat')