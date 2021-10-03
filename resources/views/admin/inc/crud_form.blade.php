<div class="col-md-8">
    <div class="card">

        <div class="card-body">

            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <form method="POST" action='@yield("action")' enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="row">
                        @yield("fields")
                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("admin.sets.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>