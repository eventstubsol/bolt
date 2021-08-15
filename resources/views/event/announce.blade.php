@php
$announcements = App\Announcement::where('user_id', 'all')
    ->orderBy('id', 'desc')
    ->get();
@endphp


<link rel="stylesheet" href="cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!--Main Modal-->
<div class="modal fade theme-modal" id="announcement-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Public Announcements</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;;float: right;">
                    <div style="font-size: 13px"><button type="button" class="btn btn-info"
                            style="padding: 12px 9px;border-radius:15px;" onclick="AnnouceForYou()">Announced For
                            You</button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                @if (count($announcements) < 1)
                    <table id="announcement_table2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Announcement</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="3">
                                <center>No Announcement Available For You</center>
                            </td>
                        </tbody>
                    </table>
                @else
                    <table id="announcement_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Announcement</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                @php
                                    $seenStat = App\AnnouncementSeen::where('announcement_id', $announcement->id)
                                        ->where('user_id', Auth::id())
                                        ->count();
                                @endphp
                                @if ($seenStat < 1)
                                    <tr>
                                        <td>{{ $announcement->subject }}</td>
                                        <td onclick="showAnnouce(this)" style="cursor: pointer"
                                            data-subject="{{ $announcement->subject }}" data-modal="public"
                                            data-announce="{{ $announcement->annoucement }}"
                                            data-id="{{ $announcement->id }}">
                                            {{ \Illuminate\Support\Str::limit($announcement->annoucement, 20) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d-m-Y') }}
                                        </td>
                                    </tr>
                                
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer" style="margin-right: 54px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@php
$per_announcements = App\Announcement::where('user_id', Auth::id())
    ->orderBy('id', 'desc')
    ->get();
@endphp
<!--Personal Modal-->
<div class="modal fade theme-modal" id="per-announcement-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Personal Announcements</h3>
                </div>
                <div class="options float-right" style="margin-right: 0;right:0%;;float: right;">
                    <div style="font-size: 13px"><button type="button" class="btn btn-dark"
                            style="padding: 12px 9px;border-radius:15px" onclick="BackToMain()">Back</button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                @if (count($per_announcements) < 1)
                    <table id="announcement_table2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Announcement</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td colspan="3">
                                <center>No Announcement Available For You</center>
                            </td>
                        </tbody>
                    </table>

                @else
                    <table id="announcement_table2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Announcement</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($per_announcements as $announcement)
                                @php
                                    $seenStat = App\AnnouncementSeen::where('announcement_id', $announcement->id)
                                        ->where('user_id', Auth::id())
                                        ->count();
                                @endphp
                                @if ($seenStat < 1)
                                    <tr>
                                        <td>{{ $announcement->subject }}</td>
                                        <td onclick="showAnnouce(this)" style="cursor: pointer"
                                            data-subject="{{ $announcement->subject }}"
                                            data-announce="{{ $announcement->annoucement }}" data-modal="private"
                                            data-id="{{ $announcement->id }}">
                                            {{ \Illuminate\Support\Str::limit($announcement->annoucement, 20) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($announcement->created_at)->format('d-m-Y') }}
                                        </td>
                                    </tr>
                            
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="modal-footer" style="margin-right: 34px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--Announcement Show-->
<div class="modal theme-modal" tabindex="-1" role="dialog" id="ShowAnnouncement">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Announcement</h5>
                <div class="options float-right" style="margin-right: 0;right:0%;;float: right;">
                    <div style="font-size: 13px"><button type="button" class="btn btn-dark"
                            style="padding: 12px 9px;border-radius:15px" onclick="AnswerModalBack()">Back</button>
                    </div>
                </div>

                </button>
            </div>
            <div class="modal-body" id="afterShow">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow: 0px 0px 0px 0px #000;
        box-shadow: 0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
    }

</style>

<script>
    var modalType = '';

    function AnnouceForYou() {
        $('#announcement-modal').modal('toggle');
        $('#per-announcement-modal').modal('toggle');
    }

    function BackToMain() {
        $('#announcement-modal').modal('toggle');
        $('#per-announcement-modal').modal('toggle');
    }

    function showAnnouce(e) {
        var type = e.getAttribute('data-modal');
        var id = e.getAttribute('data-id');
        var annoucement = e.getAttribute('data-announce');
        $('#afterShow').empty();
        var subject = e.getAttribute('data-subject');
        modalType = type;
        if (type == 'public') {
            $('#announcement-modal').modal('toggle');
            $('#ShowAnnouncement').modal('toggle');
            $('#afterShow').html('<fieldset class="scheduler-border"><b>' + subject +
                '</b><legend class="scheduler-border"></legend><ul class="list-group"><li class="list-group-item">' +
                annoucement + '</li></ul></fieldset>');
        } else if (type == 'private') {
            $('#per-announcement-modal').modal('toggle');
            $('#ShowAnnouncement').modal('toggle');
            $('#afterShow').html('<fieldset class="scheduler-border"><b>' + subject +
                '</b><legend class="scheduler-border"></legend><ul class="list-group"><li class="list-group-item">' +
                annoucement + '</li></ul></fieldset>');
        }
        $.get("{{ route('announcement.Seen') }}", {
            'id': id
        }, function(result) {
            if (result.status == 200) {
                console.log(result.message);
            } else {
                console.log(result.message);
            }
        });
    }

    function AnswerModalBack() {
        if (modalType == 'public') {
            $('#announcement-modal').modal('toggle');
            $('#ShowAnnouncement').modal('toggle');
        } else if (modalType == 'private') {
            $('#per-announcement-modal').modal('toggle');
            $('#ShowAnnouncement').modal('toggle');
        }
    }

    $document.ready(function() {
        $('#announcement_table').DataTable();
        $('#announcement_table2').DataTable();
    });
</script>
