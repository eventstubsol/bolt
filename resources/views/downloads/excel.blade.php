<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    @foreach ($reports as $key => $report)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ $key }}</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Type</th>
                <th>Location</th>
                <th>Entered At</th>
                <th>Left At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $mainReport)
            <tr>
                <td>{{ $mainReport->type }}</td>
                <td>@if( $mainReport->type_location != null){{ $mainReport->type_location }}@else {{ $mainReport->type }} @endif</td>
                <td>{{ Carbon\Carbon::parse($mainReport->created_at)->format('H:i:s') }}</td>
                <td>{{ Carbon\Carbon::parse($mainReport->updated_at)->format('H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
