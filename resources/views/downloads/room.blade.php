<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <div class="card-header">
        @if($location != 'lobby')
       
            <h4>{{ $locationType }}</h4>

        @else
           
                <h4>{{ $location }}</h4>
            
        @endif
    </div>

    @foreach ($reports as $key => $report)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ $key }}</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Entered At</th>
                <th>Left At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $mainReport)
            <tr>
                <td>{{ $mainReport->name }}</td>
                <td>{{ $mainReport->email }}</td>
                <td>{{ Carbon\Carbon::parse($mainReport->created_at)->format('H:i:s') }}</td>
                <td>{{ Carbon\Carbon::parse($mainReport->updated_at)->format('H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
