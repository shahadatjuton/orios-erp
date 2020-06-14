@extends('layouts.backend.master')

@section('title', 'Job-Circulars')

@push('css')

    <style>
        ul li{
            list-style: none;
        }
    </style>
@endpush


@section('content')


    <h1>Show Application Details</h1>


    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('superadmin.application.index')}}" class="btn btn-info waves-effect">BACK</a>
        <br><br>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul class="list">
                                    <li>
                                        Designation:
                                    </li>
                                    <li>
                                        Department:
                                    </li>
                                    <li>
                                        Name:
                                    </li>
                                    <li>
                                        E-mail:
                                    </li>
                                    <li>
                                        Experience:
                                    </li>
                                    <li>
                                        Description:
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <ul>
                                    <li>
                                        {{$application->designation}}
                                    </li>
                                    <li>
                                        {{$application->department}}
                                    </li>
                                    <li>
                                        {{$application->name}}
                                    </li>
                                    <li>
                                        {{$application->email}}
                                    </li>
                                    <li>
                                        {{$application->experience}}
                                    </li>
                                    <li>
                                        {{$application->description}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout | With Floating Label -->
    </div>

@endsection

@push('js')


<script type="text/javascript">


    // Approve post notification message using toaster
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
            text: "You wan't to approve this post!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Approve this post!',
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
                    'Your post remains as unapproved :)',
                    'error'
                )
            }
        })

    }


</script>
@endpush
