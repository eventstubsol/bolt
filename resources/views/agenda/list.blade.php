@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Agenda Page
@endsection

@section("title")
    Agenda Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Agendas</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Session Name</th>
                            <th class="text-right mr-2">Actions</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($agendas as $agenda)
                        <tr>
                            <td>{{$agenda->user->email ?? ""}}</td>
                            <td>{{$agenda->event->name ?? ""}}</td>
                            <td class="text-right" >
                            <a href="{{ route("subscriptions.edit", [
                                        "subscription" => $agenda->id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                            <button data-toggle="tooltip" data-placement="top" data-id="{{$agenda->id ?? '123'}}" title="" data-original-title="Delete" class="delete btn btn-danger ml-1 "  type="submit"><i class="fas fa-trash-alt"></i></button>        
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


@section("scripts")
    @include("includes.scripts.datatables")
    <script>
        $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("subscriptions.create") }}">Create New</a>')
            $("body").on("click",".delete",function(e){
                    t = $(this);
                   let deleteUrl = '{{route("subscriptions.destroy", [ "subscription" => ":id" ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to DELETE agenda?","Confirm agenda Delete").then(confirmation=>{
                        if(confirmation){
                            $.ajax({
                                url:deleteUrl.replace(":id", id),
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "DELETE"
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
