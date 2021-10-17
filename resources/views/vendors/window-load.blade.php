
@if(Route::currentRouteName() != 'support.index')
<script>
    window.onbeforeunload = function() {
        $.ajax({
            type: "post",
            url: '{{route('I_offline')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
        $.blockUI({
            message: '<div class="d-flex justify-content-center align-items-center"><p class="me-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
            css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
            },
            overlayCSS: {
                opacity: 0.5
            }
        });      
    }

    // window.addEventListener('beforeunload', function (e) {
    //         e.preventDefault();
    //         e.returnValue = '';
    //         alert(e.response);
    //         return;
    //     });
    // window.onunload=function(){
     
    // }

    window.onload = function() {
        $.ajax({
            type: "post",
            url: '{{route('I_online')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
    }
</script>
@else 
<script>
    window.onbeforeunload = function() {
        $.blockUI({
            message: '<div class="d-flex justify-content-center align-items-center"><p class="me-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
            css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
            },
            overlayCSS: {
                opacity: 0.5
            }
        });
        
        $.ajax({
            type: "post",
            url: '{{route('I_offline')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
        $.ajax({
            type: "post",
            url: '{{route('support.make_agent_offline')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
      
    }


    // window.onunload=function(){
    //     $.ajax({
    //         type: "post",
    //         url: '{{route('I_offline')}}',
    //         dataType: "json",
    //         success: function (response) {
                
    //         }
    //     });
    // }

    window.onload = function() {
        $.ajax({
            type: "post",
            url: '{{route('I_online')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
        $.ajax({
            type: "post",
            url: '{{route('support.make_agent_available')}}',
            dataType: "json",
            success: function (response) {
                
            }
        });
    }
</script>

@endif