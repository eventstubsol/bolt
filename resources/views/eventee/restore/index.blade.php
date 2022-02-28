@extends("layouts.admin")

@section('title')
Restore Data
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

{{-- @section("page_title")
Restore Data
@endsection --}}

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route('eventee.restore',$id) }}">Restore Data</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restore Users</div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }} @if($user->last_name != null) {{ $user->last_name }} @endif</td>
                                <td>{{ $user->email }}</td>
                                <td><button class="btn btn-success" data-id="{{ $user->id }}" data-type="user" onclick="RestoreData(this)">Restore</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restore Pages</div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->name }}</td>
                                <td><button class="btn btn-success" data-id="{{ $page->id }}" data-type="page" onclick="RestoreData(this)">Restore</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restore Session Rooms</div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessionRooms as $room)
                            <tr>
                                <td>{{ $room->name }}</td>
                                <td><button class="btn btn-success" data-id="{{ $room->id }}" data-type="room" onclick="RestoreData(this)">Restore</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restore Booth</div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booths as $booth)
                            <tr>
                                <td>{{ $booth->name }}</td>
                                <td><button class="btn btn-success" data-id="{{ $booth->id }}" data-type="booth" onclick="RestoreData(this)">Restore</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Restore Session</div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventSessions as $session)
                            <tr>
                                <td>{{ $session->name }}</td>
                                <td><button class="btn btn-success" data-id="{{ $session->id }}" data-type="session" onclick="RestoreData(this)">Restore</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
    @include("includes.scripts.datatables")
    <script>
       function RestoreData(e){
           let id = e.getAttribute("data-id");
           let type = e.getAttribute("data-type");
            $.post("{{ route('eventee.restore.post') }}",{id:id,type:type},function(res){
                if(res.code == 200){
                    e.closest('tr').remove();
                    showMessage(res.message,'success');
                }
                else{
                    showMessage(res.message,'error');
                }
            });
       }
    </script>
@endsection