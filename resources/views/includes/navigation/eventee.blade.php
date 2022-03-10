<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<li>
    <a href="{{ route('teacher.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        <span>Account Dashboard</span></a>
</li>
<li>
    <a href="{{ route('event.index') }}"><i data-feather="grid"></i><span>Events List</span></a>
</li>

<li>
    <a href="{{ route('event.expiring') }}"> <i data-feather="grid"></i>
        <span>Events Expiring Soon</span></a>
</li>

