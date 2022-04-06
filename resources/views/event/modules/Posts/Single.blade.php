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
        border: 2px solid #cceeff;
        border-radius: 10px;
    }
    .comments_inner_container{
        width: 100%;
        height: 83%;
        max-height: 391px;
        overflow-y: scroll;  
        border-bottom: 2px solid #cceeff;
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
    .ups{
        justify-content: center;
       
    }
    .down{
        justify-content: center;
    }
    @charset "UTF-8";
    #clear {
    display: inline;
    }

    #stars_rating {
    margin: 0;
    padding: 0;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
    }
    #stars_rating p {
    text-align: center;
    font-size: 20px;
    margin: 0;
    }
    @media (max-width: 479px) {
    #stars_rating p {
        font-size: 15px;
    }
    #stars_rating p.heading {
        font-size: 18px;
    }
    }
    #stars_rating .stars {
    display: inline-flex;
    flex-flow: row nowrap;
    max-width: 360px;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    padding: 0;
    margin-top: -8px;
    }
    #stars_rating .stars .star {
    position: relative;
    color: #ccf;
    font-size: 48px;
    cursor: pointer;
    padding: 0 5px;
    }
    #stars_rating .stars .star:after {
    content: "★";
    position: absolute;
    transform: translateX(-100%);
    top: 0px;
    font-size: 48px;
    }
    @media (min-width: 768px) {
    #stars_rating .stars .star {
        padding: 0 7px;
        font-size: 50px;
    }
    #stars_rating .stars .star:after {
        font-size: 50px;
    }
    }
    @media (max-width: 479px) {
    #stars_rating .stars .star {
        padding: 0 3px;
        font-size: 36px;
    }
    #stars_rating .stars .star:after {
        font-size: 36px;
    }
    }
    #stars_rating .stars .star.rated {
    color: royalblue;
    }
    /* #stars_rating .stars .star.rated:before {
    color: darkblue;
    content: "★";
    position: absolute;
    left: -1.5px;
    top: -13px;
    font-size: 50px;
    } */
    @media (min-width: 768px) {
    /* #stars_rating .stars .star.rated:before {
        left: 0px;
        top: -14.5px;
        font-size: 80px;
    } */
    }
    @media (max-width: 479px) {
    /* #stars_rating .stars .star.rated:before {
        left: -2px;
        top: -10px;
        font-size: 48px;
    } */
    }
    #stars_rating .stars:hover .star {
    color: royalblue;
    }
    #stars_rating .stars:hover .star:hover ~ * {
    color: #ccf;
    }
    /* #stars_rating .stars.rated .star:before {
    color: darkblue;
    content: "★";
    position: absolute;
    left: -1.5px;
    top: -13px;
    font-size: 50px;
    } */
    @media (min-width: 768px) {
    /* #stars_rating .stars.rated .star:before {
        left: 0px;
        top: -14.5px;
        font-size: 80px;
    } */
    }
    @media (max-width: 479px) {
    /* #stars_rating .stars.rated .star:before {
        left: -2px;
        top: -10px;
        font-size: 48px;
    } */
    }
    #stars_rating .stars.rated .star:after {
    color: royalblue;
    }
    /* #stars_rating .stars.rated .star.rated ~ *:before {
    display: none;
    } */
    #stars_rating .stars.rated .star.rated ~ *:after {
    color: #ccf;
    }
    #stars_rating .stars.rated:hover .star {
    color: royalblue;
    }
    #stars_rating .stars.rated:hover .star:after {
    color: royalblue;
    }
    #stars_rating .stars.rated:hover .star:hover ~ * {
    color: #ccf;
    }
    #stars_rating .stars.rated:hover .star:hover ~ *:after {
    color: #ccf;
    }
    #stars_rating .rates span.avg:before {
    content: "Average: ";
    }
    @media (max-width: 479px) {
    #stars_rating .rates span.avg:before {
        content: "Avg: ";
    }
    }
</style>
@foreach ($posts as $post)
@php
    $postlike = App\PostEmote::where('emote','like')->where('post_id',$post->id)->count();
    $postLove = App\PostEmote::where('emote','love')->where('post_id',$post->id)->count();
    $upvotes = App\PostEmote::where('vote','upvote')->where('post_id',$post->id)->count();
    $downvote = App\PostEmote::where('vote','downvote')->where('post_id',$post->id)->count();
    $userEmote = App\PostEmote::where('user_id',Auth::id())->where('post_id',$post->id)->first();
@endphp
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
                        <div class="post_image position-relative">
                            @if($post->vimeo_link)
                                <a class="video-play positioned  fill" href="{{ $post->vimeo_link }}">
                                    <div class="d-flex  positioned h-100 w-100">
                                        <i class="mdi mdi-play-circle" style="z-index: 2;font-size: 3vw; margin: auto;"></i>
                                    </div>
                                </a>
                            @endif 
                            <img src="{{assetUrl($post->image_url)}}" width="100%" alt="">
                        </div>
                        <div class="post_details">
                        
                            <div class="post_details_right">
                                @if ($post->like_status)
                                    <div class="post_actions reactions">
                                        {{-- <h3>React</h3> --}}
                                        @if(isset($userEmote))
                                            <img data-id="{{ $post->id }}" style="margin-top:2px" class="post_action like_{{ $post->id }} like_icon" data-toggle="tooltip" title="Like" data-action="like" @if($userEmote->emote == 'like')src="{{ assetUrl('uploads/0rVg1MJ0445jOGXp60LYT28emk0SqYtusu01eVXX.png') }}" data-action="unlike" @else src="{{ assetUrl('uploads/8f6wOAv1aCjZ6KYZi1NnOKgeBuBFE1YiEBm1RtUK.png') }}" data-action="like" @endif width="30" alt="">
                                            <span class="mainLikes">
                                                {{ $postlike.' Likes' }}
                                            </span>
                                            <img data-id="{{ $post->id }}" style="margin-top:2px;margin-left: 5px;" class="post_action love_{{ $post->id }} lo  ve_icon" data-toggle="tooltip" title="Love"  @if($userEmote->emote == 'love')src="{{ assetUrl('uploads/bt85iaeO1WtztXCTii05arVPgiXYYZC0VAbagjS2.png') }}" data-action="unlove" @else src="{{ assetUrl('uploads/sJTqjO4GGR2xLm0mIZNlFOJG21QGgxoE11ipwy6d.png') }}"  data-action="love" @endif width="30" alt="">
                                            <span class="mainLoves">
                                                {{ $postLove.' Loves' }}
                                            </span>
                                        @else
                                            <img data-id="{{ $post->id }}" style="margin-top:2px" class="post_action like_{{ $post->id }} like_icon" data-toggle="tooltip" title="Like" data-action="like" src="{{ assetUrl('uploads/8f6wOAv1aCjZ6KYZi1NnOKgeBuBFE1YiEBm1RtUK.png') }}" width="30" alt="">
                                            <span class="mainLikes">
                                                {{ $postlike.' Likes' }}
                                            </span>
                                            <img data-id="{{ $post->id }}"  style="margin-top:2px;margin-left: 5px" class="post_action love_{{ $post->id }} love_icon" data-toggle="tooltip" title="Love" data-action="love" src="{{ assetUrl('uploads/sJTqjO4GGR2xLm0mIZNlFOJG21QGgxoE11ipwy6d.png') }}" width="30" alt="">
                                            <span class="mainLoves">
                                                {{ $postLove.' Loves' }}
                                            </span>
                                        @endif
                                        
                                    </div>
                                @endif
                                @if ($post->vote_status)
                                    <div class="post_actions mt-3">
                                        {{-- <h3 class="vote" >Vote</h3> --}}
                                        
                                        <div class="ups">
                                            <img data-id="{{ $post->id }}" class="voting up_{{ $post->id }} " data-toggle="tooltip" title="Up Vote" data-action="upvote" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">    
                                            <span class="mainups">
                                                {{ $upvotes. ' Upvotes' }}
                                            </span>
                                        </div>
                                        <div class="down">
                                            <img data-id="{{ $post->id }}" class="voting  down_{{ $post->id }} down_icon" data-toggle="tooltip" title="Down Vote" data-action="downvote" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">
                                            <span class="maindowns">
                                                {{ $downvote. ' Downvotes' }}
                                            </span>
                                        </div>
                                    </div>    
                                @endif
                                @if ($post->rate_stat)
                                    <div id="stars_rating">
                                        {{-- <p class="heading">Please rate this title.</p> --}}
                                        <div class="stars">
                                        <div class="star " data-index='1' data-id="{{ $post->id }}">★</div>
                                        <div class="star " data-index='2' data-id="{{ $post->id }}">★</div>
                                        <div class="star " data-index='3' data-id="{{ $post->id }}">★</div>
                                        <div class="star " data-index='4' data-id="{{ $post->id }}">★</div>
                                        <div class="star " data-index='5' data-id="{{ $post->id }}">★</div>
                                        </div>
                                        <p class="rates"> <span class="avg avg_{{$post->id}}">{{$post->rating ?? 0}} </span> | Your Rating: <span class="rate rate_{{$post->id}}"> </span></p>
                                    </div>
                                @endif
                                <h3>Comments</h3>
                                <div class="post_comments_cont">
                                    <div class="comments_inner_container">
                                        @if(count($post->comments))
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
                                        @endif
                                    </div>
                                    <div class="comment_input">
                                        <textarea type="textbox" style="width: 80%" data-emoji-input="unicode" class="form-control" id="comment_{{$post->id}}" placeholder="Write your comment here..." data-emojiable="true"></textarea>
                                        {{-- <input type="text" data-emoji-input="unicode" data-emojiable="true" id="comment_{{$post->id}}" placeholder="Write your comment here..."> --}}
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
        let _rating = 0; // [0..5]
        const setRating = (num,post_id) => {
            _rating = num;
            save_rating(post_id);
        }

        // For example: out of 5 existing reviews, the average is 3.2
        let avg = {{ $post->rating ?? 0}};
        let count = 5.0;

        // Round a floating point number to n decimal places.
        
        function  save_rating(post_id){ 
            $.post("{{ route('add.rate') }}",{'rate':_rating,'post_id':post_id},function(res){
                if(res.code == 200){
                    document.querySelector('span.avg.avg_'+post_id).innerHTML = res.avg;
                }
            });
        }
        const getRate = () => {
            if (_rating) {
                return _rating * 1.0;
            }
            return "(unrated)";
        }

        const updateDOM = (post_id) => {
            document.querySelector('span.rate.rate_'+post_id).innerHTML = getRate();
        }

        const stars = document.querySelectorAll('.star');

        $('.star').on('click', function(e){
            let post_id = $(this).data("id")
            let star_index = $(this).data("index")
            
            stars.forEach((star,i) => {
                if (star === e.currentTarget) {
                setRating(star_index,post_id);
                // $('#game_rating').addClass('rated');
                if ($('.star.rated').length) {
                    $('.star.rated').removeClass('rated');
                }
                e.currentTarget.classList.add('rated');
                $('.stars').addClass('rated');
                updateDOM(post_id);
                }
            });
        });


        

        setTimeout(() => {
            window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
            popupButtonClasses: 'fa fa-smile-o'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        }, 300);
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

        $('.post_action').on('click',function(){
            var emote = $(this).attr('data-action');
            var id = $(this).attr('data-id');
            var post_action = $(this);
            console.log(emote);
            $.post("{{ route('add.emote') }}",{'emote':emote,'id':id},function(res){
                if(res.code == 200){
                    if(emote == 'like'){
                        post_action.attr('src','{{ assetUrl("uploads/0rVg1MJ0445jOGXp60LYT28emk0SqYtusu01eVXX.png") }}');
                        $(`.love_${id}`).attr('src','{{ assetUrl("uploads/sJTqjO4GGR2xLm0mIZNlFOJG21QGgxoE11ipwy6d.png") }}');
                        post_action.attr("data-action",'unlike');
                    }
                    else if(emote == 'unlike' || emote == 'unlove'){
                        $(`.like_${id}`).attr('src','{{ assetUrl("uploads/8f6wOAv1aCjZ6KYZi1NnOKgeBuBFE1YiEBm1RtUK.png") }}');
                        $(`.love_${id}`).attr('src','{{ assetUrl("uploads/sJTqjO4GGR2xLm0mIZNlFOJG21QGgxoE11ipwy6d.png") }}');
                        $(`.like_${id}`).attr("data-action",'like');
                        $(`.love_${id}`).attr("data-action",'love');
                    }
                    else{
                        post_action.attr('src','{{ assetUrl("uploads/bt85iaeO1WtztXCTii05arVPgiXYYZC0VAbagjS2.png") }}');
                        post_action.attr("data-action",'unlove');
                        $(`.like_${id}`).attr('src','{{ assetUrl("uploads/8f6wOAv1aCjZ6KYZi1NnOKgeBuBFE1YiEBm1RtUK.png") }}');
                    }
                    $('.mainLikes').empty();
                    $('.mainLikes').html(res.likes + ' Likes');
                    $('.mainLoves').empty();
                    $('.mainLoves').html(res.loves + ' Loves');

                }
            });
        });
        

        $('.voting').on('click',function(){
            var vote =  $(this).attr('data-action');
            var id = $(this).attr('data-id');
            var vote_action = $(this);
            $.post("{{ route('add.vote') }}",{'vote':vote,'id':id},function(res){
                if(res.code == 200){
                    if(vote == 'upvote'){
                        // vote_action.attr('src','{{ assetUrl("uploads/KUXTFrcr6pM53XApd0UcF0AHvHOGGo6L3RIy2JMz.png") }}');
                        // $(`.down_${id}`).attr('src','{{ assetUrl("uploads/wHlXHSK5haFfFOgvs2JDnZWA6k8ZfNDyvQHwQAb1.gif") }}');
                       console.log(vote);
                    }
                    else{
                        // vote_action.attr('src','{{ assetUrl("uploads/qkvoAt3HIorjcwaGePf2DLeLHu4YsYhnJHgf86NW.png") }}');
                        // $(`.up_${id}`).attr('src','{{ assetUrl("uploads/vrRVMSZp7Ew0mpBR7L76xJXe1kA0C9D7dFSfmscX.gif") }}');
                        console.log(vote);
                    }
                    $('.mainups').empty();
                    $('.mainups').html(res.upvote + ' Upvotes');
                    $('.maindowns').empty();
                    $('.maindowns').html(res.downvote + ' Downvote');

                }
            });
        });
    });
</script>