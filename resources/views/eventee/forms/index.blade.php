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
                                <th>#</th>
                                <th>Name</th>
                                <th>Fields</th>
                                <th class="text-right mr-2">Actions</th>
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
                                    <center>
                                        <a href="{{ route('eventee.form.preview',$id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                                        <a onclick="confiemDelete(this)" data-id="{{ $form->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </center>
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