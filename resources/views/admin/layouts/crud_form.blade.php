@extends('admin.layouts.admin')
@section('title', "Dashboard")
    
{{-- @php
    const Ryan = 'man';
@endphp --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield("title")</div>

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
    </div>
</div>
@endsection