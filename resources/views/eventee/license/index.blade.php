@extends("layouts.admin")

@section('title')
    Licenses
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
Licenses
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.license",$id) }}">Licenses</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right"><a href="{{ route('eventee.license.create',$id) }}" class="btn btn-success">Create</a></div><br>
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Issued On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\License::where('event_id',$id)->count() > 0)
                            @foreach($licenses as $key => $license)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $license->type }}</td>
                                    <td>{{ $license->issue_date }}</td>
                                    <td>
                                        <a href="{{ route('eventee.license.edit',['id'=>$id,'license_id'=>$license->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
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
                {{ $licenses->links() }}
            </div>
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->
@endsection