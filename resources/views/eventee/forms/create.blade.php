@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Crete Form
@endsection

@section("title")
   Create Form
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Form</li>
@endsection
{{-- <div></div> --}}
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" id="divset">
               <div class="defaults">
                <div class="heading"><h4>Default Fields</h4></div>
                <div class="defaultItems">
                    <ul id="source">
                        @foreach($structs as $struct)
                            <li data-id="{{ $struct->id }}" data-value="inps">{{ $struct->label }}</li>
                        @endforeach
                    </ul>
                </div>
                
               </div>
               <div class="activeInp" id="activeInp">
                    <h4>Active Input Fields</h4>
                    <ul class="items" id="items">

                    </ul>
               </div>
               
            </div> <!-- end card body-->
            <div class="card-body">
                <button type ="button" class="btn btn-success" id="save" onclick="submitForm()">Save</button>
            </div>
            
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->
@endsection


@section("scripts")
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  ></script>
<script>
    var ids = [];
    $('#source li').draggable({
        revert : function(event, ui) {
            // on older version of jQuery use "draggable"
            // $(this).data("draggable")
            // on 2.x versions of jQuery use "ui-draggable"
            // $(this).data("ui-draggable")
            $(this).data("uiDraggable").originalPosition = {
                top : 0,
                left : 0
            };
            // return boolean
            return !event;
            // that evaluate like this:
            // return event !== false ? false : true;
        }
    });
    $('#activeInp').droppable({
        drop:function(event,ui){
            accept:'li[data-value="inps"]'
            $('#items').append(ui.draggable.attr("style", ""));
            ids.push(ui.draggable.attr("data-id"));
            
        }
    });

    function submitForm(){
        if(ids.length === 0){
            alert("Please Select Fields First");
        }
        else{
            $.ajax({
            url:"{{ route('eventee.form.save') }}",
            method:"POST",
            data:{event_id:"{{ $id }}","fields":ids},
            success:function(response){
                if(response.code ===200){
                    alert(response.message);
                }
                else{
                    alert(response.message);
                }
            }
        })
        }
        
    }
</script>
@endsection