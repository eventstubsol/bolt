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
                <div class="card-body">
                    <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                               
                                <th>Fields</th>
                                
                            </tr>
                        </thead>
                        <tbody class="sort">
                            
                            @foreach($structs as $form)
                            <tr data-id = "{{ $form->id }}" class="parent" data-position ="{{ $form->position }}">
                                <td >{{ $form->label }}</td> 
                            </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button id="savebtn" type="button" class="btn btn-success" onclick="SavePositions()" style="display:none;float: right;">Save</button></td>
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        var position = [];
        $('.sort').sortable({
            update:function(event , ui){
                $(this).children().each(function(index){
                    if($(this).attr('data-position') != (index + 1)){
                        $(this).attr('data-position',(index + 1)).addClass('updated');
                        $('#savebtn').css('display','block');
                    }
                
                });
                saveNewPoisition();
            }
        });

        function saveNewPoisition(){
            
            $('.updated').each(function(){
                position.push([$(this).attr('data-id'), $(this).attr('data-position')]);
            });
        }

        function SavePositions(){
            // console.log(position);
            $.ajax({
                url: "{{ route('form.position') }}",
                method: 'POST',
                data: {"position":position},
                
                
                success:function(response){
                    // console.log(response);
                  alert(response.message);
                  $('#savebtn').css('display','none');
                },
                error:function(response){
                //   abort(403);
                }
               
            });
        }

    </script>

@endsection