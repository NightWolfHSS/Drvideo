{{-- show all error  --}}
@if ($errors->any())
    <div class="showE">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                	<div class="errors">{{ $error }}</div>
                	<div class="Lnx"></div>
                </li>
            @endforeach
        </ul>
    </div>
@endif