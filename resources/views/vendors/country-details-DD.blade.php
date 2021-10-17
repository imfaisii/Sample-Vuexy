{{-- Include it in extended js stack --}}

<script>
    // init
    let GET_STATES_ENDPOINT = '{{ route('guest.get-states') }}';
    let GET_CITIES_ENDPOINT = '{{ route('guest.get-cities') }}';
</script>

<script src="{{ asset('assets/js/custom/countryDetails.js') }}"></script>
