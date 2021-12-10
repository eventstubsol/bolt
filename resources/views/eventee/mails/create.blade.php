@extends("layouts.admin")

@section("styles")
    @include("includes.styles.select")
    @include("includes.styles.datatables")
    @include("includes.styles.wyswyg");
@endsection

@section("page_title")
    Sent Mails
@endsection

@section("title")
    Sent Mails
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Sent Mails</li>
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
                    <div class="form-group">
                        <label for="sentTo">Send To</label>
                        <select name="sent_to_type" class="form-control" onchange="setDropdown(this)" >
                            <option value="0">All</option>
                            <option value="2">All Exibitor</option>
                            <option value="3">All Delegate</option>
                            <option value="4">All Attendee</option>
                            <option value="1">Specific User Types</option>
                        </select>
                    </div>
                    <div class="form-group" id="userTypes" style="display: none;">
                        <label for="sentTo">Specific Types</label>
                        <select name="sent_to_type_specific" class="form-control" onchange="setSecondDropdown(this)">
                            <option value="-1">None</option>
                            <option value="0">Exibitor</option>
                            <option value="1">Delegate</option>
                            <option value="2">Attendee</option>
                            <option value="3">Specific Subtypes</option>
                        </select>
                    </div>
                    <div class="form-group " id="attendee" style="display: none;">
                        <label for="sentTo">Attendee</label>
                        <select name="sent_to_type_attendee[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersAttendee as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="exibitor" style="display: none;">
                        <label for="sentTo">Exibitor</label>
                        <select name="sent_to_type_exibitor[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user2"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersExibitor as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="delegate" style="display: none;">
                        <label for="sentTo">Delegate</label>
                        <select name="sent_to_type_delegate[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user3"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($usersDelegate as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="subtype" style="display: none;">
                        <label for="sentTo">Sub Type</label>
                        <select name="sent_to_type_subtype[]" class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user4"  data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." >
                            <option value="0" disabled>None</option>
                            @foreach($subtypes as $subtype)
                                <option value="{{ $subtype->name }}">{{ $subtype->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Message</label>
                        <textarea name="message" id="summernote-basic" class="form-control" cols="500" rows="1000" required></textarea>
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
            else{
                $('#userTypes').show(); 
            }
        }

        function setSecondDropdown(e){
            var option = e.value;
            
            if(option == 0){
                $('#exibitor').show();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').hide();
            }
            else if(option == 1){
                $('#exibitor').hide();
                $('#delegate').show();
                $('#subtype').hide();
                $('#attendee').hide();
            }
            else if(option == 2){
                $('#exibitor').hide();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').show();
            }
            else if(option == 3){
                
                $('#exibitor').hide();
                $('#delegate').hide();
                $('#subtype').show();
                $('#attendee').hide();  
            }
            else{
                $('#exibitor').hide();
                $('#delegate').hide();
                $('#subtype').hide();
                $('#attendee').hide(); 
            }
            $(".select2-multiple").select2();
            initializeSelect();
        }

        $('#exibitor').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#subtype').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
        });
        $('#attendee').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#subtype').prop('selectedIndex',0);
                $('#exibitor').prop('selectedIndex',0);
        });
        $('#subtype').change(function(){
                $('#delegate').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
                $('#exibitor').prop('selectedIndex',0);
        });
        $('#delegate').change(function(){
                $('#subtype').prop('selectedIndex',0);
                $('#attendee').prop('selectedIndex',0);
                $('#exibitor').prop('selectedIndex',0);
        });

    </script>
@endsection