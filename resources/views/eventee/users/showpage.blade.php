@extends("layouts.admin")

@section('title')
Bulk Upload Users
@endsection

@section("page_title")
Bulk Upload Users
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{ route("eventee.user",$id) }}">Users</a></li>
<li class="breadcrumb-item active">Create</li>
<li class="breadcrumb-item active">Bulk Upload</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Note: ** </h5>
                <h5><b>
                    Please Enter The Names properly, Columns First Name, Email, Password (optional for attendee only), Type(User Type)  Can not be left blank <br>

                </b></h5>
                <h5>The User Types are <br> <ul><li><span style="color: rgb(27, 228, 211)">attendee</span></li>
                    <li><span style="color: rgb(27, 228, 211)">exhibiter</span></li>
                    <li><span style="color: rgb(27, 228, 211)">speaker</span></li>
                    <li><span style="color: rgb(27, 228, 211)">delegate</b></span></li></ul>, Make Sure To Use Each Type With Same Convention Written In The Red Marked Text</h5>
            </div>
        </div>
        <a href="{{ asset('excel/bulk_user_upload.csv') }}" class="btn btn-primary" download='bulk_user_upload'>Download The Excel File</a>
        <br>
        <div class="card" style="margin-top: 1.5rem">
            <div class="card-body">
                <form action="{{ route('eventee.user.import',$id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Upload Your Updated File Here</label>
                        <input type="file" class="form-control" name="excel_file" accept=".csv">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>   
    </div>

</div>
@endsection