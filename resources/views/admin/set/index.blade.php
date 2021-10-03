@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sets') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("admin.sets.create") }}'><i class="fa fa-plus"></i> Create Set</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    VS
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sets as $set)
                            <tr>
                                <td>
                                    {{ $set->player->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($set->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a class="btn btn-success d-block mb-2" href='{{ route("admin.sets.edit", $set->id) }}'><i class="fa fa-pencil"></i> Edit</a>

                                    <form method="POST" action='{{ route("admin.sets.destroy", $set->id) }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <input type="submit" class="btn btn-danger d-block" value="Delete">
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination  -->
                    <div class="d-flex justify-content-center">
                        {{ $sets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection