@if (session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif

@if (session()->has('alert'))
    <div class="alert alert-danger">{{ session()->get('alert') }}</div>
@endif

@if (session()->has('errors'))
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger"> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>