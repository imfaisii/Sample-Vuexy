@can('agent-view')
    

<!-- Not authorized-->
    <div class="misc-wrapper">
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
                <h2 class="mb-1">Need Support?</h2>
                <p class="mb-2">
                   If you need any kind of assitance, just press the below button, and our team will entertain your query
                </p>
                <button style="    text-align: center;
                align-items: center;
                display: block;
                left: 47%;" class="btn btn-primary mb-1 btn-sm-block" id="agent_support_button" >Support</button><img class="img-fluid" src="{{asset('assets/images/chat.png')}}" alt="Support" />
            </div>
        </div>
    </div>
    <!-- / Not authorized-->
    @endcan

    @can('csr-view')
        <!-- Not authorized-->
    <div class="misc-wrapper">
        <div class="misc-inner p-2 p-sm-3">
            <div class="w-100 text-center">
               <img class="img-fluid" src="{{asset('assets/images/support.gif')}}" alt="Support" />
            </div>
        </div>
    </div>
    <!-- / Not authorized-->
    @endcan