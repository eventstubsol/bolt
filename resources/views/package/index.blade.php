@extends("layouts.admin")

@section('title')
Manage Packages
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Manage Packages
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Package</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Period</th>
                            <th>Created On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $key =>$package)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->price }}</td>
                                <td>{{ $package->period }}</td>
                                <td>{{ Carbon\Carbon::parse($package->created_at)->format('d-m-Y') }}</td>
                                <td><a href="{{ route("package.edit", [
                                    "id" => $package->id
                                ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Edit"><i class="fe-edit-2"></i></a>
                            <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                class="delete btn btn-danger ml-1 " data-id="{{$package->id}}" type="submit"><i
                                    class="fas fa-trash-alt"></i></button></td>
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
     $(document).ready(function(){
        // $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>')
        $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("package.create") }}">Create New Package</a>');
        $("body").on("click",".delete",function(e){
                t = $(this);
                let deleteUrl = '{{route("package.destroy", [ "id" => ":id" ])}}';
                let id = t.data("id");
                confirmDelete("Are you sure you want to DELETE Package?","Confirm Package Delete").then(confirmation=>{
                    if(confirmation){
                        $.ajax({
                            url:deleteUrl.replace(":id", id),
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            method:"POST",
                            success: function(){
                                t.closest("tr").remove();
                                $(".tooltip").removeClass("show");
                            }
                        })
                    }
                });
            });
     });
</script>
@endsection