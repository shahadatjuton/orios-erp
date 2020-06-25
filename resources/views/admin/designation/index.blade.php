@extends('layouts.backend.master')

@section('title', 'Designation')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header mb-4">
            <a class="btn btn-primary waves-effect" href="{{route('admin.designation.create')}}">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>Create Designation</span>
            </a>
        </div>


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total Designation
                            <span class="badge bg-blue"ma>{{ $data->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Leave Type</th>
                                    <th>Created At </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @forelse($data as $key=> $data)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('admin.designation.edit',$data->id)}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="button" name="button"  class="btn btn-danger waves-effect" onclick="deleteDesignation({{$data->id}})">
                                                <i class="fas fa-trash-alt"></i>

                                            </button>
                                            <form  id="delete-designation-{{$data->id}}" action="{{route('admin.designation.destroy', $data->id)}}"
                                                   method="post" style="display:none;"
                                            >
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @empty

                            </table>
                            <div class="bg-danger text-center">
                                <h2> There is no data available!</h2>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

@push('js')


<script type="text/javascript">

    function deleteDesignation(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-designation-' + id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })

    }

</script>
@endpush
