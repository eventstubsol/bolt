@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Post Analytics
@endsection

@section("title")
    Post Analytics
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route('eventee.post',$id) }}">Posts</a></li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    {{$post->title}}	
                </h2>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Attendee</th>
                            <th>Emote ({{ $totalLikes ?? 0 }} Likes & {{ $totalhearts ?? 0 }} Hearts )</th>
                            <th>Vote ({{ $totalUpvotes ?? 0  }} Upvotes & {{ $totalDvotes ?? 0 }} Downvotes)</th>
                            <th>Rating (Average {{ $post->rating }})</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($postEmotes as $key => $postEmote)
                        <tr>
                          <td>{{ $postEmote->user ? ($postEmote->user->name . $postEmote->user->last_name . " - "  . $postEmote->user->email) : 'Attendee Deleted'}}</td>
                          <td>{{ $postEmote->emote ?? '-' }}</td>
                          <td>{{ $postEmote->vote  ?? '-' }}</td>
                          <td>{{ $postEmote->rate  ?? '-' }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->
@endsection


@section("scripts")
    @include("includes.scripts.datatables")

@endsection
