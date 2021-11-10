@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
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
                <a href="{{ route('eventee.mail.create',$id) }}" style="float: right" class="btn btn-success"><i class="fa fa-envelope" aria-hidden="true"></i> New Mail</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width ="10%">#</th>
                            <th width ="10%">Sent To</th>
                            <th width ="70%">Message</th>
                            <th width ="10%">Sent On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($mails) < 1)
                            <tr>
                                <td colspan="4"><center><strong>No Data Available</strong></center></td>
                            </tr>
                        @else
                            @foreach ($mails as $key => $mail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $mail->sent_to }}</td>
                                    <td>{{ $mail->message }}</td>
                                    <td>{{ Carbon\Carbon::parse($mail->created_at)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection