@extends('layouts.backend.master')

@section('title', 'CV-Bank')

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
                            Total CV
                            s{{ $applications->count() }}
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                @foreach($applications as $key=> $application)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$application->designation}}</td>
                                        <td>{{$application->department}}</td>
                                        <td>{{$application->name}}</td>
                                        <td>{{$application->email}}</td>
                                        <td>
                                            @if($application->status == 1)
                                                Accepted
                                            @elseif($application->status == 2)
                                            Rejected
                                                @else
                                            Pending
                                                @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('superadmin.application.show', $application->id)}}">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <button type="button" name="button" class="btn btn-success waves-effect" onclick="approveApplication({{ $application->id }})">
                                                <i class="far fa-check-circle"></i>
                                            </button>

                                            <form  id="approve-application-{{$application->id}}" action="{{route('superadmin.application.update', $application->id)}}"
                                                   method="post" style="display:none;"
                                            >
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="true" name="status">
                                            </form>

                                            <button type="button" name="button" class="btn btn-danger waves-effect" onclick="rejectApplication({{ $application->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            <form  id="reject-application-{{$application->id}}" action="{{route('superadmin.application.reject', $application->id)}}"
                                                   method="post" style="display:none;"
                                            >
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="false" name="status">

                                            </form>

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

    function rejectApplication(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to Reject the application!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Reject!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('reject-application-' + id).submit();
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
    //  Approve application
    function approveApplication(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want to Accept the application!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Accept!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('approve-application-' + id).submit();
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
