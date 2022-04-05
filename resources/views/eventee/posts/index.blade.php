@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Posts
@endsection

@section("title")
Posts
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route('eventee.post',$id) }}">Posts</a></li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Post</th>
                            <th>Vimeo Url</th>
                            <th>Likes/Emotes</th>
                            <th>Votes</th>
                            <th>Ratings</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($event->posts()->get() as $key => $post)
                      @php
                          $postEmote = App\PostEmote::where('emote','!=',null)->where('post_id',$post->id)->count();
                          $postVote = App\PostEmote::where('vote','!=',null)->where('post_id',$post->id)->count();
                      @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$post->title}}</td>
                          <td>{!! $post->body !!}</td>
                          <td>{{($post->vimeo_link != null) ? $post->vimeo_link : "None"}}</td>    
                          <td>
                           {{ $postEmote }}
                          </td>
                          <td>
                            {{ $postVote }}
                          </td>
                          <td>
                           {{ $post->rating }}
                          </td>

                            <td class="text-right" >
                                <a href="{{ route("eventee.post.edit", [
                                        "post_id" => $post->id,"id"=>$id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fe-edit-2" ></i></a>
                                <a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="DeletePost(this)" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fe-trash" ></i></a>
                            </td>
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

    <script>
         $(document).ready(function(){
            $("#buttons-container").append('<span><a class="btn btn-primary mr-1" href="{{ route("eventee.post.create",$id) }}">Create New</a>');
         });

         function changeStatus(e){
             let current_value = e.value;
             let setChar = e.getAttribute('data-value');
             let id = e.getAttribute('data-id');
             if(e.value == 0){
                current_value = 1;
                e.value = 1;
                $.post("{{ route('update.post.status') }}",{'id':id,'status':current_value,'char':setChar},function(res){
                    if(res.code == 200){
                        showMessage(res.message,'success');
                    }
                    else{
                        showMessage(res.message,'error');
                    }
                });
             }
             else{
                current_value = 0;
                e.value = 0;
             }
         }

         function DeletePost(e){
            var postId = e.getAttribute('data-id');
            var data = e.closest('tr');
            confirmDelete("Are you sure you want to DELETE Post?","Confirm Post Delete").then(confirmation=>{
                if(confirmation){
                    
                    var data = e.closest('tr');
                    $.post('{{ route("eventee.post.delete") }}',{'id':postId},function(response){
                        if(response.code == 200){
                            data.remove();
                            showMessage(response.message,'success');
                        }
                        else{
                            showMessage(response.message,'error');
                        }
                        
                    });
                }
            });
         }
    </script>
    
@endsection
