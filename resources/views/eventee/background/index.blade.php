@extends("layouts.admin")

@section('title')
Background
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
Background
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.background",$id) }}">Background</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right"><a href="{{ route('eventee.background.create',$id) }}" class="btn btn-success">Create</a></div><br>
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Menu</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\Background::where('event_id', ($id))->count() > 0)
                            @foreach($backgrounds as $key => $background)
                                <tr>
                                    <td width="20px">{{ $key + 1 }}</td>
                                   
                                    <td width="40px"><img src="{{ asset($background->location) }}" height="100px" width="100px"></td>
                                    @php
                                        $menu = App\Menu::where('id',$background->menu_id)->first();
                                    @endphp
                                    <td width="20px">{{ $menu->name }}</td>
                                    <td width="20px">
                                        <a href="{{ route('eventee.background.edit',['id'=> $id, 'back_id'=>encrypt($background->id)]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    </td>   
                                </tr>
                            @endforeach
                        @else
                                <td colspan="4"><center>No Data Available Yet</center></td>
                        @endif
                    </tbody>
                </table>

            </div> <!-- end card body-->
            <div class="card-footer float-right">
                {{ $backgrounds->links() }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@endsection