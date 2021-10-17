@push('custom_script')
<script>
    let route_make_room='{{route('support.create_room')}}'
   let my_id='{{auth()->user()->id}}'
   let asset_folder='{{asset('assets')}}'
   let my_pic_url="{{Auth::user()->load('UserAttributes')->UserAttributes->image}}"
   let his_pic_url="{{ App\Models\UserAttributes::where('id', '=',$receiver)->value('image') }}"

   let url = '{{ asset('assets/audio/message.mp3') }}';
   let agent_available='{{route('support.agent_available')}}'
   let has_errors = false;
   let send_event='{{route('support.event_send')}}'
   let current_user_id= '{{ auth()->user()->id }}'
   let agly_user_ki_id ='@json($receiver)'
    let room_id='@json($room)'
    let my_room_id='@json($room)'
    let my_pic='{{ asset('assets/images/Profile') }}/'+my_pic_url
    let other_user_pic='{{ asset('assets/images/Profile') }}/'+his_pic_url
    let other_user_name="{{ App\Models\User::where('id', '=',$receiver)->value('name') }}"
    let current_time='{{ Carbon\Carbon::now()->format('H:i') }}'
    let me_name='{{ Auth::user()->name }}'


</script>
@endpush
