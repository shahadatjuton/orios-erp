@extends('layouts.backend.master')

@section('title', 'Leave-Application')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Own Attendance Sheet
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Last Week</th>
                                    <th>Last Month</th>
                                    <th>Last Year</th>
                                    <th>Total Attendance</th>
                                </tr>
                                </thead>
                                    <tr>

                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>{{$total_attendance}}</td>
                                    </tr>
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
