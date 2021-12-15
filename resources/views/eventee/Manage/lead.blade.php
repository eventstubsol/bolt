@extends("layouts.admin")

@section("title")
    Leaderboard
@endsection


@section("content")
    <div class="card">
        <div class="card-header">
            Leaderboard
            <a style="float:right" class="btn btn-primary" href="{{ route('excel.download',$id) }}">Download Report</a>
        </div>
        <div class="card-body"> 
            
            <ol id="list-of-people" class="list-group"></ol>
        </div>
    </div>
@endsection


@section("scripts")
    <script>
        function showLeaderboard(inLoop = false){
            let list = $("#list-of-people");
            let id = "{{ ($id) }}";
            $.ajax({
                url: '{{ route("leaderboard") }}',
                method: "POST",
                data: { _token: '{{ csrf_token() }}',id:"{{ ($id) }}" },
                success: function(leaderboard){
                   
                    if(leaderboard.length > 0){
                        console.log(1);
                        list.html(leaderboard.map(([name, points]) => {
                            return `<li class="list-group-item d-flex justify-content-between align-items-center"><span>${name}</span><span>${points} points</span></li>`;
                        }).join(""));
                    }
                    else{
                        console.log(2);
                        list.html('<li class="list-group-item d-flex  align-items-center" style="justify-content:center"><span><center>No Data Available</center></span></li>');
                    }
                    
                },
                error: function(err){
                    if(!inLoop){
                        showMessage(
                            "Error loading the leaderboard. Please try again in some time",
                            "error"
                        );
                    }
                }
            });
        }
        showLeaderboard();
        setInterval(showLeaderboard, 30000);
    </script>
@endsection