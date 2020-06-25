@extends('layouts.backend.master')

@section('title', 'Job-Circulars')

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
                            Total Job Circulars
                            <span class="badge bg-blue">{{ $circulars->count() }}</span>
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
                                    <th>Experience</th>
                                    <th>No Of Vacancy</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @forelse($circulars as $key=> $data)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$data->designation->name}}</td>
                                        <td>{{$data->department->name}}</td>
                                        <td>{{$data->experience}} Years</td>
                                        <td>{{$data->vacancy}}</td>
                                        <td>{{$data->deadline->format('Y-m-d')}}</td>
                                        <td>
                                            @if($data->status==1)
                                             Accepted
                                             @elseif($data->status==0)
                                                Pending
                                                @else
                                                Rejected
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info waves-effect" href="{{route('superadmin.jobCircular.show', $data->id)}}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <button type="button" name="button" class="btn btn-success waves-effect pull-right" onclick="approveJob({{ $data->id }})">
                                                <i class="far fa-check-circle"></i>
                                            </button>

                                            <form  id="approve-job-{{$data->id}}" action="{{route('superadmin.jobCircular.update',$data->id)}}"
                                                   method="post" style="display:none;"
                                            >
                                                @csrf
                                                @method('PUT')

                                            </form>
                                            <button type="button" name="button" class="btn btn-danger waves-effect" onclick="rejectJob({{ $data->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <form  id="reject-job-{{$data->id}}" action="{{route('superadmin.jobCircular.destroy',$data->id)}}"
                                                   method="post" style="display:none;">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="false" name="status">
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger">There is no data found</h2>
                                    @endforelse
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

    function rejectJob(id) {

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
                document.getElementById('reject-job-' + id).submit();
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
    function approveJob(id) {

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
                document.getElementById('approve-job-' + id).submit();
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
