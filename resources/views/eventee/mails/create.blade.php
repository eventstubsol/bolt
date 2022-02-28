@extends("layouts.admin")

@section("styles")
    @include("includes.styles.select")
    @include("includes.styles.datatables")
    @include("includes.styles.wyswyg");
@endsection

{{-- @section("page_title")
    Sent Mails
@endsection --}}

@section("title")
    Sent Mails
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item "><a href="{{ route("eventee.mail",['id'=>$id]) }}">Sent Mails</a></li>
    <li class="breadcrumb-item active">Send New</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><i class="fa fa-envelope" aria-hidden="true"></i> Send New Mails</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('eventee.mail.send',$id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sentTo">Send To <span style="color:red">*</span></label>
                        <select name="sent_to_type" class="form-control" onchange="setDropdown(this)" >
                            <option value="0">All</option>
                            <option value="2">All Exhibitor</option>
                            <option value="3">All Delegate</option>
                            <option value="4">All Attendee</option>
                            <option value="1">Specific User Types</option>
                        </select>
                    </div>
                    <div class="form-group" id="userTypes" style="display: none;">
                        <label for="sentTo">Specific Types <span style="color:red">*</span></label>
                        <select name="sent_to_type_specific" class="form-control" onchange="setSecondDropdown(this)">
                            <option value="-1">None</option>
                            <option value="0">Exhibitor</option>
                            <option value="1">Delegate</option>
                            <option value="2">Attendee</option>
                            <option value="3">Specific Subtypes</option>
                        </select>
                    </div>
                    <div class="form-group " id="attendee" style="display: none;">
                        <label for="sentTo">Attendee<span style="color:red">*</span></label>
                        <select name="sent_to_type_attendee[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersAttendee as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="Exhibitor" style="display: none;">
                        <label for="sentTo">Exhibitor<span style="color:red">*</span></label>
                        <select name="sent_to_type_Exhibitor[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user2"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersExibitor as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="delegate" style="display: none;">
                        <label for="sentTo">Delegate<span style="color:red">*</span></label>
                        <select name="sent_to_type_delegate[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user3"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersDelegate as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="subtype" style="display: none;">
                        <label for="sentTo">Sub Type<span style="color:red">*</span></label>
                        <select name="sent_to_type_subtype[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user4"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($subtypes as $subtype)
                                <option value="{{ $subtype->name }}">{{ $subtype->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject<span style="color:red">*</span></label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"  value="{{ old('subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="subject">Message<span style="color:red">*</span></label>
                        <textarea name="message" id="summernote-basic" class="form-control  @error('message') is-invalid @enderror" cols="500" rows="1000" >{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" style="float: right" class="btn btn-toolbar">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@include("includes.scripts.select");
@include("includes.scripts.wyswyg");
    <script>
         $(document).ready(()=>{
             $(".select2-multiple").select2();
         });
        function setDropdown(e){
            var option = e.value;
            if(option == 0){
                $('#userTypes').hide();
            }
            else if(option == 2){
                $('#userTypes').hide();
            }
            else if(option == 3){
                $('#userTypes').hide();
            }
            else if(option == 4){
                $('#userTypes').hide();
            }
            else{
                $('#userTypes').show(); 
            }
        }

        function setSecondDropdown(e){
            var option = e.value;
            
            if(option == 0){
                $('#Exhibitor').show();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').hide();
            }
            else if(option == 1){
                $('#Exhibitor').hide();
                $('#delegate').show();
                $('#subtype').hide();
                $('#attendee').hide();
            }
            else if(option == 2){
                $('#Exhibitor').hide();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').show();
            }
            else if(option == 3){
                
                $('#Exhibitor').hide();
                $('#delegate').hide();
                $('#subtype').show();
                $('#attendee').hide();  
            }
            else{
                $('#Exhibitor').hide();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').hide(); 
            }
            $(".select2-multiple").select2();
            initializeSelect();
        }

        $('#Exhibitor').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#subtype').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
        });
        $('#attendee').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#subtype').prop('selectedIndex',0);
                $('#Exhibitor').prop('selectedIndex',0);
        });
        $('#subtype').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
                $('#Exhibitor').prop('selectedIndex',0);
        });
        $('#delegate').change(function(){
                $('#subtype').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
                $('#Exhibitor').prop('selectedIndex',0);
        });

    </script>
@endsection