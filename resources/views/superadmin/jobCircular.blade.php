@extends('layouts.backend.master')

@section('title', 'Job-Circulars')

@push('css')


@endpush


@section('content')


    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Job Circulars Table
            </h2>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Total Leave Type
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
                                    <th>Circular</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @forelse($circulars as $key=> $data)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$data->designation->name}}</td>
                                        <td>{{$data->department->name}}</td>
                                        <td>{{$data->experience}}</td>
                                        <td>{{$data->vacancy}}</td>
                                        <td>{{$data->circular->diffForHumans()}}</td>
                                        <td>{{$data->deadline->diffForHumans()}}</td>
                                        <td>
                                            @if($data->status==true)
                                             Accepted
                                             @else
                                                Pending
                                            @endif
                                        </td>
                                        <td>
                                        <a class="btn btn-info waves-effect" href="{{route('superadmin.jobCircular.show', $data->id)}}">
                                            <i class="material-icons">visibility </i>
                                        </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('superadmin.jobCircular.update',$data->id)}}">Confirm</a>
                                            <a class="btn btn-danger" href="{{route('superadmin.jobCircular.destroy',$data->id)}}">Cancel</a>
                                        </td>
                                    </tr>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger">There is no data found</h2>
                                    @endforelse
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
