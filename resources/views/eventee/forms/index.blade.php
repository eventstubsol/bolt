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
                                <th width="10%">#</th>
                                <th width="20%">Name</th>
                                <th width="10%">Fields</th>
                                <th width="40%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $key => $form)
                                <td width="10%">{{ $key+1 }}</td>
                                <td width="70%">{{ $form->name }}</td>
                                @php
                                    $fieldCount = App\FormField::where('form_id',$form->id)->count()
                                @endphp
                                <td width="10%">{{ $fieldCount }}</td>
                                <td width="10%">
                                   
                                        {{-- <a href="{{ route('eventee.form.edit',['id'=>$id,'form_id'=>$form->id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                                        <a href="{{ route('eventee.form.preview',$id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                        <a onclick="confiemDelete(this)" data-id="{{ $form->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                 
                                </td>  
                            @endforeach
                        </tbody>
                    </table>
                    {{ $forms->links() }}
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
    });
</script>
@endsection