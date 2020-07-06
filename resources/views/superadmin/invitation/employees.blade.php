@extends('layouts.backend.master')

@section('title', 'Employees')

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
                            Total Employees
                            <span class="badge bg-blue">{{ $employees->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
{{--                                    <th>Designation</th>--}}
{{--                                    <th>Department</th>--}}
                                    <th>Email</th>
                                    <th>Invite</th>
                                </tr>
                                </thead>
                                @foreach($employees as $key=> $employee)
{{--                                    @php--}}
{{--                                        $designation = \App\Designation::find($employee->designation);--}}
{{--                                        $department = \App\Department::find($employee->department);--}}
{{--                                    @endphp--}}
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$employee->name}}</td>
{{--                                        <td>{{$employee->designation}}</td>--}}
{{--                                        <td>{{$employee->department}}</td>--}}
                                        <td>{{$employee->email}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info waves-effect" href="{{route('superadmin.assessment.interviwer', $employee->id)}}">
                                                Invite Interviewer
                                            </a>
                                            <a class="btn btn-info waves-effect" href="mailto:{{$employee->email}}">
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
