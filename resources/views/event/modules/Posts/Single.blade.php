<style>
    .post_modal_container{
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }
    .post_image{
        width: 100%;
    }
    .post_details{
        width: 100%
        max-height: 75vh;
        /* display: flex; */
    }
    .post_actions{
        /* margin-top: -40px; */
        display: inline-block;
    }
    .post_action{
        margin-top: -20px;
        cursor: pointer;
    }
    .down_icon{
        transform: rotate(180deg);
    }
    .like_icon{
        padding: 19px 0px;
    }
    .vote{
        padding-bottom: 15px
    }
    .post_comments_cont{
        width: 100%;
        height: 72%;
        border: 2px solid #89898991;
        border-radius: 10px;
    }
    .comments_inner_container{
        width: 100%;
        height: 83%;
        overflow-y: scroll;  
        border-bottom: 2px solid #89898991;
    }
    .comment_by_details .post_by_name{
        font-size: 16px;
        font-weight: 700;
    }
    .comment_by_details .post_time{
        font-size: 12px;
    }
    .comment_by_details{
        display: flex;
        margin-left: 10px;
        flex-flow: column;
    }
    .post_comment_image{
        border-radius: 50%;      
        width: 35px;
        height: 35px;
        object-fit: cover;
        margin-left: 8px;
    }
    .post_comment{
        display: flex;
        margin-top: 20px;
        margin-left: 20px;
    }
    .post_by{
        /* width: 25%; */
        display: flex;
        align-items: center;
    }
    .post_comment_message::before {
        content: "";
        width: 20px;
        height: 20px;
        background: white;
        border: 2px solid #89898991;
        position: absolute;
        top: 50%;
        left: 0;
        transform: translate(-50%,-50%);
        border-radius: 50%;
    }
    .post_comment_message {
        position: relative;
        padding: 15px;
        background: #00acff33;
        width: 95%;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        color: black;
    }
    .post_comment_message .message{
        padding-left: 20px;
        padding-top: 11px;
    }
    .comment_input{
        display: flex;
        height: 17%;
    }
    .comment_input input:focus {
        outline: none;
    }
    .comment_input input {
        width: 88%;
        height: 94%;
        min-height: 50px;
        border: none;
        margin-left: 20px;
    }
    .send_comment img{
        object-fit: contain;
        width: 30%;
        margin-right: 22px;
        cursor: pointer;
    }
    .comments_inner_container::-webkit-scrollbar-track{
        border-radius: 10px;
        background-color: #eee;
    }
    .comments_inner_container::-webkit-scrollbar{
        width: 12px;
        background-color: #eee;
    }
    .comments_inner_container::-webkit-scrollbar-thumb{
        border-radius: 10px;
        background-color: #cceeff;
    }
</style>
@foreach ($posts as $post)
    <div class="modal fade theme-modal" id="post_{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="max-width: 590px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="resourceslistLabel"><span class="image-icon resources"></span>{{$post->title}}</h4>
                    <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>
                <div class="modal-body" >
                    <div class="post_modal_container">
                        <div class="post_details_left">
                            {{-- <div class="post_heading">
                                <h2>POST HEADING</h2>
                            </div> --}}
                            <div class="post_desc mb-3 mt-1">
                                {!! $post->body !!}
                            </div>
                        
                        </div>
                        <div class="post_image">
                            <img src="{{assetUrl($post->image_url)}}" width="100%" alt="">
                        </div>
                        <div class="post_details">
                        
                            <div class="post_details_right">
                                @if ($post->like_status)
                                    <div class="post_actions reactions">
                                        {{-- <h3>React</h3> --}}
                                        <img class="post_action like_icon" data-toggle="tooltip" title="Like" data-action="like" src="{{ assetUrl('uploads/vrRVMSZp7Ew0mpBR7L76xJXe1kA0C9D7dFSfmscX.gif') }}" width="30" alt="">
                                        <img class="post_action " data-toggle="tooltip" title="Love" data-action="like" src="{{ assetUrl('uploads/wHlXHSK5haFfFOgvs2JDnZWA6k8ZfNDyvQHwQAb1.gif') }}" width="70" alt="">
            
                                    </div>
                                @endif
                                @if ($post->vote_status)
                                    <div class="post_actions mt-3">
                                        {{-- <h3 class="vote" >Vote</h3> --}}
            
                                        <img class="post_action" data-toggle="tooltip" title="Up Vote" data-action="like" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">
                                        <img class="post_action down_icon" data-toggle="tooltip" title="Down Vote" data-action="like" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">
            
                                    </div>    
                                @endif
                                
                                <h3>Comments</h3>
                                <div class="post_comments_cont">
                                    <div class="comments_inner_container">
                                        @foreach ($post->comments as $comment)
                                            @if($comment->approved === 1)
                                                <div class="post_comment">       
                                                    <div class="post_comment_message">
                                                        <div class="post_by">
                                                            @if(isset($comment->user->profileImage))
                                                                <img async class="post_comment_image" width="10" src="{{assetUrl(Auth::user()->profileImage)}}" alt="">
                                                            @else
                                                                <span class="round-icon"><i class="fa fa-user"></i></span>
                                                            @endif
                                                            <div class="comment_by_details">
                                                                <span class="post_by_name">{{ $comment->user->getFullName() }}</span>
                                                                <span class="post_time" >{{ $comment->created_at }} </span>
                                                            </div>
                                                        </div> 
                                                        <div class="message">
                                                            {{$comment->comment}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="comment_input">
                                        <input type="text" id="comment_{{$post->id}}" placeholder="Write your comment here...">
                                        <button data-id="{{$post->id}}"  style="width:25%" class="btn send_comment send_comment_{{$post->id}}" >
                                            <img class="" src="{{ assetUrl('uploads/R58jLvFt7sI5WzBMqgpul4PulNUGaasUff2lBR4I.png') }}" width="20%" alt="">

                                        </button>
                                    </div>
                                </div>
                            </div>
                
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    $(document).ready(function(){
        let url = "{{route('post.addComment', [ 'post'=>':id','id'=>$event->id ] )}}";
        $(".send_comment").on("click",function(){
            let btn = $(this);
            $(this).attr("disabled", true);
            let post_id = $(this).data("id")
            let message = $(`#comment_${post_id}`).val();
            console.log(message);
            $.ajax({
                url: url.replace(":id",post_id),
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    message: message,
                },
                success: function () {
                    btn.removeAttr("disabled");
                    $(`#comment_${post_id}`).val('');
                    showMessage("Your Comment has been sent for approval.", "success");
                },
                error: function () {
                    showMessage("Error occurred while commenting. Please try again later or refresh page.", "error");
                }
            })
        })
    });
</script>