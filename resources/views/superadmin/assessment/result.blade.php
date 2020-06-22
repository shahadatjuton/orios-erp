@extends('layouts.backend.master')

@section('title', 'Assessment Result')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header">
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total assessments
                            <span class="badge bg-blue">{{ $result->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Total Marks</th>
                                    <th>Send Mail</th>
                                </tr>
                                </thead>
                                @foreach($result as $key=> $result)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$result->name}}</td>
                                        <td>{{$result->designation}}</td>
                                        <td>{{$result->department}}</td>
                                        <td>{{$result->total}}</td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('superadmin.appointmentLetter',$result->id)}}">
                                                <i class="fas fa-mail-bulk"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

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

    function deletedepartment(id) {

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
                document.getElementById('delete-department-' + id).submit();
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
