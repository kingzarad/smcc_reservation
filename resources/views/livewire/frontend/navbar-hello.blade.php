<h3 class="text-white mt-2 mx-3"> Hi,

    {{ Str::ucfirst($name_str ?? 'User') }}
    @empty($name_str)
        <a href="{{ route('myaccount.profile') }}">Incomplete details.</a>
    @endempty
</h3>
