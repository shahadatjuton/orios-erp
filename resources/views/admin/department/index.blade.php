@extends('layouts.backend.master')

@section('title', 'Department')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Department Table
            </h2>
            <a class="btn btn-primary waves-effect" href="{{route('admin.department.create')}}">
{{--                <i class="material-icons">add</i>--}}
                <span>Create Department</span>
            </a>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total Department
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
                                @foreach($data as $key=> $data)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('admin.department.edit',$data->id)}}">
                                                <i class="material-icons">edit </i>
                                            </a>
                                            <a class="btn btn-danger waves-effect" href="{{route('admin.department.destroy',$data->id)}}">
                                                <i class="material-icons">Delete</i>
                                            </a>

{{--                                            <button type="button" name="button"  class="btn btn-danger waves-effect" >--}}
{{--                                                <i class="material-icons" >delete</i>--}}

{{--                                            </button>--}}
{{--                                            <form  id="delete-leave-type-{{$data->id}}" action="{{route('admin.leaveType.edit', $data->id)}}"--}}
{{--                                                   method="post" style="display:none;">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </thead>
                            </table>
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

    function deleteleavetype(id) {

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
                document.getElementById('delete-leave-type-' + id).submit();
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
