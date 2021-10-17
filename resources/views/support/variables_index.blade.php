@push('custom_script')
<script>
    let route_make_room='{{route('support.create_room')}}'
   let my_id='{{auth()->user()->id}}'
   let asset_folder='{{asset('assets')}}'

   let url = '{{ asset('assets/audio/message.mp3') }}';
  

</script>
@endpush
