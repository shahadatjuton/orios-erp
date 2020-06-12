@extends('layouts.backend.master')

@section('title', 'Leave-Application')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Leave Type Table
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total Leave Type
                            <span class="badge bg-blue">{{ $leaves->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Leave Type</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($leaves as $key=> $leave)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$leave->emp_name}}</td>
                                        <td>{{$leave->leaveType->leave_type}}</td>
                                        <td>{{$leave->str_date}}</td>
                                        <td>{{$leave->end_date}}</td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('admin.leave.show',$leave->id)}}">
                                                <i class="material-icons">visibility </i>
                                            </a>
                                        </td>
                                        <td>Pending</td>
                                        <td>
{{--                                            <a class="btn btn-info waves-effect" href="{{route('admin.leave.approve')}}">--}}
{{--                                                <i class="material-icons">Accept </i>--}}
{{--                                            </a>--}}
                                            <a class="btn btn-info waves-effect" href="{{route('admin.leave.approve')}}">
                                                <i class="material-icons">Approve </i>
                                            </a>
                                            <a class="btn btn-info waves-effect" href="{{route('admin.leave.reject')}}">
                                                <i class="material-icons">Cancel </i>
                                            </a>

{{--                                            <button type="button" name="button"  class="btn btn-danger waves-effect">--}}
{{--                                                <i class="material-icons" >Approve</i>--}}
{{--                                                <form  id="" action="{{route('admin.leave.approve', $leave->id)}}"--}}
{{--                                                       method="post" style="display:none;">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                </form>--}}
{{--                                            </button>--}}

                                        </td>
                                    </tr>
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
