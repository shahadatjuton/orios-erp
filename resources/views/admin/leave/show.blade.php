@extends('layouts.backend.master')

@section('title', 'Leave-Application')

@push('css')

<style>
    ul li{
        list-style: none;
    }
</style>
@endpush


@section('content')


    <h1>Leave Application Details</h1>


    <div class="container-fluid">

        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('admin.leave.list')}}" class="btn btn-info waves-effect">BACK</a>

        @if($leave->status=="")

{{--            <button type="button" name="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $leave->id }})">--}}
{{--                <i class="material-icons">done </i>--}}
{{--                <span>Approve</span>--}}
{{--            </button>--}}

{{--            <form  id="approve-post-{{$leave->id}}" action="{{route('admin.leave.approve', $leave->id)}}"--}}
{{--                   method="post" style="display:none;"--}}
{{--            >--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}

{{--            </form>--}}

        @elseif($leave->status==true)

            <button type="button" name="button" class="bt btn-success pull-right" disabled>
                <i class="material-icons">done </i>
                <span>Approved</span>
            </button>
        @elseif($leave->status==false)

            <button type="button" name="button" class="bt btn-success pull-right" disabled>
                <i class="material-icons">cancel</i>
                <span>Rejected</span>
            </button>


        @endif
        <br><br>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <ul class="list">
                            <li>
                                Employee Name:
                            </li>
                            <li>
                                Leave Type:
                            </li>
                            <li>
                                Start Date:
                            </li>
                            <li>
                                End Date:
                            </li>
                            <li>
                                Reason of the Leave:
                            </li>
                        </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                            <ul>
                                <li>
                                    {{$leave->emp_name}}
                                </li>
                                <li>
                                    {{$leave->leaveType->leave_type}}
                                </li>
                                <li>
                                    {{$leave->str_date}}
                                </li>
                                <li>
                                    {{$leave->end_date}}
                                </li>
                                <li>
                                    {{$leave->reason}}
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
