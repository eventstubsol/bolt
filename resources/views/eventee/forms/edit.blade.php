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
{{-- @foreach($structs as $struct)
                            <li data-id="{{ $struct->id }}" data-value="inps">{{ $struct->label }}</li>
                        @endforeach --}}
@section("breadcrumbs")
    <li class="breadcrumb-item active">Form</li>
@endsection
{{-- <div></div> --}}
@section("content")
<div class="row">
    <div class="col-12">
        <div class="row hidden-md-up">
        <div class="col-md-6">
        <div class="card" >
            
            <div class="card-body">
                <a style="visibility: hidden" id="drop" class="btn btn-warning" style="width:6.5rem;float: right;background:#30C4CB;color:white" data-toggle="modal" data-target="#exampleModal">Add Field</a>
            </div>
            <div class="card-body" >
                <div class="row hidden-md-up">
                    <div class="col-md-6">
                        <p> <span style="color: red"><strong>**</strong></span><b>The Name,Email And Phone Fields are added by default</b></p>
                        <label for="Name">Default Fields</label>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle " style="width:14rem" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fields
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($form_fields as $field)
                                @php
                                    $mainField = App\FormStruct::findOrFail($field->struct_id);
                                @endphp
                           
                                
                               
                                    
                                        <li class="dropdown-item"><input onclick="getID(this)" class="check" type="checkbox" checked data-id="{{ $mainField->id }}" value="0">&nbsp;{{ $mainField->label }}</li>
                                    
                                        {{-- @foreach($structsDefault as $struct)
                                            @if ($struct->id != $field->struct_id)
                                                <li class="dropdown-item"><input onclick="getID(this)" class="check" type="checkbox" data-id="{{ $struct->id }}" value="0">&nbsp;{{ $struct->label }}</li>
                                            @endif
                                        @endforeach --}}
                                
                                    
                                    
                               
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- end card body-->
            
            
        </div> <!-- end card -->
    </div>
    <div class="col-md-6">
        <div class="card">
            
            <div class="card-body">
                <a id="drop" class="btn btn-warning" style="width:6.5rem;float: right;background:#30C4CB;color:white" data-toggle="modal" data-target="#exampleModal">Add Field</a>
            </div>
            <div class="card-body" >
                <p> <b>You can Add your new fields <br>   from the following dropdown</b></p>
                <label for="Name">Added Fields</label>
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle " style="width:14rem" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Fields
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($structEvent as $struct)
                        <li class="dropdown-item"><input type="checkbox" onclick="getID(this)" class="check" data-id="{{ $struct->id }}"  value="0">&nbsp;{{ $struct->label }}</li>
                    @endforeach
                    </div>
                  </div>
            </div> <!-- end card body-->
            
            
        </div> <!-- end card -->
        
            
       
            
    </div>
        </div>
        <button type ="button" class="btn btn-success" id="save" onclick="submitForm()">Save</button>
    </div><!-- end col-->
</div>
                        <!-- end row-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Field</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('eventee.form.saveField',$id) }}" method="POST">
                <div class="form-group">
                    <label for="">Label Name</label>
                    <input type="text" class="form-control" name="label" placeholder="Enter Label Name">
                </div>
                <div class="form-group">
                    <label for="">Field Type</label>
                    <select class="form-control" name="type">
                        <option value="{{ strtolower("Text") }}">Text</option>
                        <option value="{{ strtolower("Date") }}">Date</option>
                        <option value="{{ strtolower("Time") }}">Time</option>
                        <option value="{{ strtolower("Email") }}">Email</option>
                    </select>
                </div>
                
            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection


@section("scripts")
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  ></script>
<script>
    var ids = ['1','2','3'];
    function getID(e){
        var fieldId = e.getAttribute('data-id');
        var vale = e.value;
        if(vale == 0){
            ids.push(fieldId);
            e.setAttribute('value', 1);
        }
        else{
            var index = ids.indexOf(fieldId);
            if(index >= 0){
                ids.splice(index,1);
            }
            e.setAttribute('value', 0);
        }
        
    }

    function submitForm(){
        if(ids.length === 0){
            alert("Please Select Fields First");
        }
        else{
            console.log(ids);
            $.ajax({
            url:"{{ route('eventee.form.save') }}",
            method:"POST",
            data:{event_id:"{{ $id }}","fields":ids},
            success:function(response){
                if(response.code ===200){
                    alert(response.message);
            
                    window.location.replace("{{ route('eventee.form',$id) }}");
                }
                else{
                    alert(response.message);
                }
            }
        });
        }
        
    }
</script>
@endsection