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

{{-- @foreach($structEvent as $struct)
                        <li class="dropdown-item"><input type="checkbox" onclick="getID(this)" class="check" data-id="{{ $struct->id }}"  value="0">&nbsp;{{ $struct->label }}</li>
                    @endforeach --}}
                    {{-- @foreach($structsDefault as $struct)
                    <li class="dropdown-item"><input onclick="getID(this)" class="check" type="checkbox" data-id="{{ $struct->id }}" value="0">&nbsp;{{ $struct->label }}</li>
                @endforeach --}}
                <input type="hidden" id="event_id" value="{{ ($id) }}">
@section("breadcrumbs")
    <li class="breadcrumb-item active">Form</li>
@endsection
{{-- <div></div> --}}
@section("content")
<div class="row">
    <div class="col-12">
       
        <div class="card" >
            
            <div class="card-body">
                <span class="notshow alert alert-danger" role="alert" id="place-error">
                    Please Fill All The PlaceHolders, Wait For The Page To Refresh
                </span>
               
            </div>
            <div class="card-body" id="cb">
                <div class="multi-container">
                <div class="form-box" id="first-box">
                    <ul class="active-button">
                        <li class="active">
                            <span class="round-button">1</span>
                        </li>
                        <li>
                            <span class="round-button">2</span>
                        </li>
                        <li>
                            <span class="round-button">3</span>
                        </li>
                    </ul>
                    <div class="form">
                        <h3>Default Fields</h3>
                        <table class="fieldTable">
                            <thead>
                                <th width="20%">Field Name</th>
                                <th width="55%">Placeholder Name</th>
                                <th width="20%">Field Type</th>
                                <th width="5%">Required</th>
                            </thead>
                            <tbody>
                                @foreach($structsDefault as $struct)
                                @if($struct->event_id == -1)
                                <tr>
                                    <td><input onclick="getID(this)" class="check" type="checkbox" data-id="{{ $struct->id }}" value="0" checked disabled>&nbsp;{{ $struct->label }}</td>
                                    <td><input type="text" class="placeholder1 placeholder form-control" name="placeholder1[]" placeholder="Enter The placeholder name" required></td>
                                    <td>{{ $struct->type }}</td>
                                    <td><input type="checkbox" name="{{ $struct->label }}" checked disabled value="1"></td>
                                </tr>
                                @else
                                <tr>
                                    <td><input onclick="getID(this)" class="checkSec" type="checkbox" data-id="{{ $struct->id }}" value="0" >&nbsp;{{ $struct->label }}</td>
                                    <td><input type="text" class="placeholder1 placeholder form-control" placeholder="Enter The placeholder name" required></td>
                                    <td>{{ $struct->type }}</td>
                                    <td><input type="checkbox" class="checkbox1" onclick="check1(this)" name="{{ $struct->label }}" value="0"></td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><button type ="button" class="mainbtn btn btn-success" id="save" onclick="submitFirstForm()">Save & Next</button></td> 
                                </tr>
                             
                            </tfoot>
                        </table>
                    </div>
                </div>
            
                <div class="form-box" id="second-box">
                    <ul class="active-button">
                        <li class="active">
                            <span class="round-button">1</span>
                        </li>
                        <li class="active">
                            <span class="round-button">2</span>
                        </li>
                        <li>
                            <span class="round-button">3</span>
                        </li>
                    </ul>
                    <div class="form">
                        <h3>Custom Fields Fields</h3>
                        <table class="fieldTable">
                            <thead>
                                <tr>
                                    <input type="hidden" id="form_id">
                                    <th colspan="4"><a id="drop" class="btn btn-warning" style="width:6.5rem;float: right;background:#30C4CB;color:white" data-toggle="modal" data-target="#exampleModal">Add Field</a> </th>
                                </tr>
                                <tr>
                                    <th width="20%">Field Name</th>
                                    <th width="55%">Placeholder Name</th>
                                    <th width="20%">Field Type</th>
                                    <th width="5%">Required</th>
                                </tr>
                                
                            </thead>
                            <tbody id="second-tbody">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <td colspan="4"><button type ="button" class="prev btn btn-success" id="prev" onclick="goBack1st()">Previous</button> --}}
                                 <td colspan="4"><button type ="button" class="mainbtn btn btn-success" id="save" onclick="submitForm2()">Save & Next</button></td> 
                                </tr>
                             
                            </tfoot>
                        </table>
                    </div>
                </div>
            
                <div class="form-box" id="third-box">
                    <ul class="active-button">
                        <li class="active">
                            <span class="round-button">1</span>
                        </li>
                        <li class="active">
                            <span class="round-button">2</span>
                        </li>
                        <li class="active">
                            <span class="round-button">3</span>
                        </li>
                    </ul>
                    <div class="form">
                        <h3>Review Form</h3>
                        <table class="fieldTable">
                            <thead>
                                <th width="20%" >Label</th>
                                <th width="80%" colspan="3">Fields </th>
                            </thead>
                            <tbody id="third-tbody">
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><a href="{{ route('eventee.form',$id) }}" class="mainbtn btn btn-success"  >Back To Main</a>
                                </tr>
                             
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            </div> <!-- end card body-->
            
            
        </div> <!-- end card -->
    
    
       
        
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
            {{-- <form action="{{ route('eventee.form.saveField',$id) }}" method="POST"> --}}
                <div class="form-group">
                    <label for="">Label Name</label>
                    <input type="text" class="form-control" name="label" id="label" placeholder="Enter Label Name">
                </div>
                <div class="form-group">
                    <label for="">Field Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="{{ strtolower("Text") }}">Text</option>
                        <option value="{{ strtolower("Date") }}">Date</option>
                        <option value="{{ strtolower("Time") }}">Time</option>
                        <option value="{{ strtolower("Email") }}">Email</option>
                    </select>
                </div>
                
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="SaveCustomField()">Save changes</button>
        {{-- </form> --}}
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
    var required = ['1','1','1'];
    function getID(e){
        var fieldId = e.getAttribute('data-id');
        var vale = e.value;
       
        if(vale == 0){
            ids.push(fieldId);
            e.setAttribute('value', 1);
            e.setAttribute('class','check');
        }
        else{
            var index = ids.indexOf(fieldId);
            if(index >= 0){
                ids.splice(index,1);
            }
            e.setAttribute('value', 0);
            e.setAttribute('class','checkSec');
        }
        
    }

  function check1(e){
      
      if(e.value == 0){
          e.value = 1;
          required.push(1);
      }
      else{
          e.value = 0;
          required.pop();
      }

  }

    function submitFirstForm(){
        if(ids.length === 0){
            alert("Please Select Fields First");
        }
        else{
            var field = document.getElementsByClassName('placeholder1');
            var checkbox = document.getElementsByClassName('check');
            var placeholder = [];
            
            
          if((field) != "" && $('.check').prop("checked", true)){
               $('.placeholder1').each(function(index){
                  
                    if($(this).val() != "" ){
                    placeholder.push($(this).val());
                    $('#place-error').removeClass('errors');
                    $('#place-error').addClass('notshow');
                  }
                  
                  
               });
               $.ajax({
                    url:"{{ route('eventee.form.save') }}",
                    method:"POST",
                    data:{event_id:"{{ $id }}","fields":ids,'placeholder':placeholder,'required':required},
                    success:function(response){
                        if(response.code ===200){
                            $('#form_id').val(response.form_id);
                            customField();
                            $('#first-box').fadeOut('fast');
                            $('#second-box').fadeIn('fast');
                        }
                        else if(response.code == 403){
                            alert(response.message);
                            window.location.reload();
                        }
                        else{
                            alert(response.message);
                        }
                    }
                });
            }
           

            // console.log(field);
        //  
        }
        
    }

    //2nd Form 
    
</script>
<script src="{{ asset('assets/js/form.js') }}"></script>
@endsection