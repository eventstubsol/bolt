@extends('layouts.admin')

@section('styles')
    @include('includes.styles.datatables')
@endsection

@section('page_title')
    Manage polls
@endsection

@section('title')
    Manage polls
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('polls.manage', $id) }}">Manage polls</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-success" role="alert" id="successAlert" style="display: none">
                        Selected Polls Have Deleted Successfully, Please Wait 2 Seconds....
                    </div>
                    <div class="alert alert-danger" role="alert" id="errorAlert" style="display: none">

                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                        <thead>
                            <tr class="head">
                                <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                                <th>Question</th>
                                {{-- <th>Room</th> --}}
                                {{-- <th>Votes</th> --}}
                                <th class="text-right mr-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($polls as $poll)
                                <tr class="checkedbox" data-id="{{ $poll->id }}">
                                    <td width="5%" class="incheck" style="display: none"><input type="checkbox"
                                            onclick="checkedValue(this)" class="inchecked"></td>
                                    <td>{{ $poll->name }} @if($poll->status===1)- Poll Live @endif @if($poll->status===-1)- Results Live @endif </td>
                                    {{-- <th>{{$poll->location_type}}</th> --}}
                                    {{-- <th>{{$poll->}}</th> --}}

                                    <td class="text-right">
                                        <a href="{{ route('eventee.polls.edit', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" title="Edit"><i
                                                class="fe-edit-2"></i></a>
                                        <a href="{{ route('eventee.polls.analytics', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="Analytics"><i
                                                class="fe-bar-chart-line"></i></a>
                                        <a href="{{ route('eventee.polls.publishpoll', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="Publish"><i
                                                class="fa fa-paper-plane"></i></a>
                                        <a href="{{ route('eventee.polls.publishPollResults', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="PublishResult"><i
                                                class="fa fa-check"></i></a>
                                        <a href="{{ route('eventee.polls.unpublishPoll', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                            title="" data-original-title="Unpublish"><i
                                                class="fa fa-close"></i></a>
                                        <a href="{{ route('eventee.poll', [
                                            'poll' => $poll->id,
                                            'id' => $id,
                                        ]) }}"
                                            class="btn btn-primary" data-toggle="tooltip" title="Poll"><i
                                                class="fe-eye"></i></a>
                                        <button data-toggle="tooltip" data-placement="bottom" data-id="{{ $poll->id }}"
                                            onclick="DeletePoll(this)" data-toggle="tooltip" title="Delete"
                                            class="delete btn btn-danger ml-1 " type="submit"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection


@section('scripts')
    @include('includes.scripts.datatables')
    <script>
        var incheck = $('.incheck');
        var checks = $('.checks');
        $(document).ready(function() {
            checks.hide();
            incheck.hide();
        });
        $(document).ready(function() {
            $("#buttons-container").append(
                '<a class="btn btn-primary" href="{{ route('eventee.polls.create', ['id' => $id]) }}">Create New</a>'
                );
            $("#buttons-container").append(
                '<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>'
                );
            $("#buttons-container").append(
                '<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>'
                );

        });
    </script>

    <script>
        function DeletePoll(e) {
            let id = e.getAttribute("data-id");
            let deleteUrl = '{{ route('eventee.polls.destroy') }}';


            confirmDelete("Are you sure you want to DELETE poll?", "Confirm poll Delete").then(confirmation => {
                if (confirmation) {
                    $.ajax({
                        url: deleteUrl,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE",
                            "id": id,
                        },
                        method: "POST",
                        success: function() {
                            e.closest("tr").remove();
                            $(".tooltip").removeClass("show");
                        }
                    })
                }
            });

        }

        var appendcheck = 0;
        var deleteArr = [];
        var deltype = 0;

        function AddCheckBox(e) {
            var button = $('.addbox');
            // var appended = ' <td width="5%" class="incheck" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>';
            if (appendcheck == 0) {
                // $('.head').append('<th class="thead">#</th>');
                // $('.checkedbox').append(appended);
                checks.show();
                incheck.show();
                $('.deleteBulk').show();
                appendcheck = 1;
                button.text("Cancel");
                button.addClass('btn-danger');
                button.removeClass('btn-info');
            } else {
                // $('.thead').remove();
                // $('.incheck').remove();
                checks.hide();
                incheck.hide();
                $('.deleteBulk').hide();
                appendcheck = 0;
                button.text("Bulk Delete");
                button.removeClass('btn-danger');
                button.addClass('btn-info');
            }
        }

        function checkedValue(e) {
            var data_id = e.closest('tr').getAttribute('data-id');
            if (deleteArr.indexOf(data_id) == -1) {
                deleteArr.push(data_id);
                deltype = 1;
            } else {

                for (var i = 0; i < deleteArr.length; i++) {
                    if (deleteArr[i] == data_id) {
                        deleteArr.splice(i, 1);
                    }
                }
            }

        }

        function BulkDelete() {
            if (deltype == 1) {
                if (deleteArr.length < 1) {
                    alert("Please Select The CheckBoxe First");
                } else {

                    $.post("{{ route('eventee.polls.bulkDelete') }}", {
                        'ids': deleteArr
                    }, function(response) {
                        if (response.code == 200) {
                            $('#successAlert').show()
                            $('#errorAlert').hide();
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            $('#errorAlert').show()
                            $('#successAlert').hide()
                            $('#errorAlert').html(response.message);
                        }
                    });
                }
            } else if (deltype == 2) {
                $.post("{{ route('eventee.polls.deleteAll') }}", {
                    'id': "{{ $id }}"
                }, function(response) {
                    if (response.code == 200) {
                        $('#successAlert').show()
                        $('#errorAlert').hide();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        $('#errorAlert').show()
                        $('#successAlert').hide()
                        $('#errorAlert').html(response.message);
                    }
                });
            } else {
                alert("Please Select The CheckBoxe First");
            }
        }

        $(document).ready(function() {
            $('.checkall').on('click', function() {
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                deltype = 2;
            });
        });
    </script>
@endsection
