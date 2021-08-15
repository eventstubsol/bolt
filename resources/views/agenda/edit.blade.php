@extends("layouts.admin")

@section("page_title")
    Edit Agenda
@endsection

@section("title")
    Edit Agenda
@endsection


@section("styles")
    @include("includes.styles.select")
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("subscriptions.index") }}">Agenda</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            
                <form action="{{ route("subscriptions.update", [ "subscription" => $subscription->id ]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="mb-3">
                          <label for="user">Select User</label>
                          <select disabled class="form-control @error('userids') is-invalid @enderror" id="user" name="userid" data-toggle="select"  data-placeholder="Choose ..." required>
                                <option selected value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                           </select>
                           @error('userid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                          <label for="user">Select Sessions</label>
                          <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user" name="sessionids[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
                              @foreach($sessions as $session)
                                <option @if(in_array($session->id,$agendasessions)) selected="true" @endif
                                 value={{$session->id}}>{{$session->name}} ({{$session->room}}) </option>
                              @endforeach
                          </select>
                           @error('sessionids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <input class="btn btn-primary" type="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section("scripts")
    @include("includes.scripts.select")
  @endsection
