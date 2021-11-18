@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Form Page
@endsection

@section("title")
    Form Page
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Form</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="card-body">

                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th >#</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Fields</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(App\Form::where('event_id',$id)->count() > 0)
                            @foreach($forms as $key => $form)
                            <tr>
                                <td >{{ $key+1 }}</td>
                                <td >{{ $form->name }}</td>
                                <td >   {{ $subdomain }}.virturo.io/register/{{ $form->slug }}</td>
                                @php
                                    $fieldCount = App\FormField::where('form_id',$form->id)->count()
                                @endphp
                                <td >{{ $fieldCount }}</td>
                                <td >
                                   
                                        <a href="{{ route('rearrange',['id'=>$id,'form'=>$form->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="{{ route('eventee.form.preview',$id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a> --}}
                                        <a data-id="{{ $form->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="btn btn-danger ml-1 delete"><span style="color: white"><i class="fas fa-trash"></i></span></a>
                                 
                                </td>  
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><center>No Data Available</center></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
                            <!-- end row-->
{{-- <div></div> --}}
@endsection


@section("scripts")
<script>
    $(document).ready(function(){
        $("#card-body").append('<a class="btn btn-primary" style="float:right;" href="{{ route("eventee.form.create",$id) }}">Create New Form</a>')
        $("body").on("click",".delete",function(e){
                    t = $(this);
                    console.log("testing")
                    let deleteUrl = '{{route("form.destroy", [ "form" => ":id" ])}}';
                    let id = t.data("id");
                    confirmDelete("Are you sure you want to DELETE Form?","Confirm Form Delete").then(confirmation=>{
                        if(confirmation){
                            console.log(deleteUrl.replace(":id", id));
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
<script src="{{ asset('assets/js/form.js') }}"></script>
@endsection