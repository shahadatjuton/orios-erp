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
                            Total Jobs
                            <span class="badge bg-blue">{{ $jobs->count() }}</span>
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
                                    <th>No of Vacancy</th>
                                    <th>Circulation Date</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @foreach($jobs as $key=> $job)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$job->designation->name}}</td>
                                        <td>{{$job->department->name}}</td>
                                        <td>{{$job->experience}} Years</td>
                                        <td>{{$job->vacancy}}</td>
                                        <td>{{$job->circular->format('dM Y')}}</td>
                                        <td>{{$job->deadline->format('dM Y')}}</td>
                                        <td>
                                            @if($job->status == 1)
                                             <p class="bg-success">Accepted</p>
                                            @elseif($job->status ==2)
                                            <p class="bg-danger">Rejected</p>
                                            @else
                                            <p class="bg-warning">Pending</p>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" name="button"  class="btn btn-danger waves-effect" onclick="deletedepartment({{$job->id}})">
                                                <i class="fas fa-trash" ></i>

                                            </button>
                                            <form  id="delete-department-{{$job->id}}" action="{{route('admin.job.destroy', $job->id)}}"
                                                   method="post" style="display:none;"
                                            >
                                                @csrf
                                                @method('DELETE')
                                            </form>

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
