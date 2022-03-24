<style>
    .post_modal_container{
        display: flex;
        flex-direction: column;
    align-items: center;
        justify-content: space-between;

    }
    .post_image{
        width: 100%;
    }
    .post_details{
        width: 100%
        max-height: 75vh;
        display: flex;
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
        border: none;
        margin-left: 20px;
    }
    .send_comment{
        object-fit: contain;
        width: 7%;
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
<div class="modal fade theme-modal" id="post-1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="max-width: 590px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="resourceslistLabel"><span class="image-icon resources"></span>POST NAME</h4>
                <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body" >
                <div class="post_modal_container">
                    <div class="post_details_left">
                        {{-- <div class="post_heading">
                            <h2>POST HEADING</h2>
                        </div> --}}
                        <div class="post_desc mb-3 mt-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum distinctio doloremque, totam harum assumenda ducimus nobis impedit atque cum itaque porro dolor explicabo cumque voluptate corrupti nihil debitis reiciendis vero!
                        </div>
                       
                    </div>
                    <div class="post_image">
                        <img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&w=1000&q=80" width="100%" alt="">
                    </div>
                    <div class="post_details">
                    
                        <div class="post_details_right">
                            <div class="post_actions reactions">
                                {{-- <h3>React</h3> --}}
                                <img class="post_action like_icon" data-toggle="tooltip" title="Like" data-action="like" src="{{ assetUrl('uploads/vrRVMSZp7Ew0mpBR7L76xJXe1kA0C9D7dFSfmscX.gif') }}" width="30" alt="">
                                <img class="post_action " data-toggle="tooltip" title="Love" data-action="like" src="{{ assetUrl('uploads/wHlXHSK5haFfFOgvs2JDnZWA6k8ZfNDyvQHwQAb1.gif') }}" width="70" alt="">
    
                            </div>
                            <div class="post_actions">
                                {{-- <h3 class="vote" >Vote</h3> --}}
    
                                <img class="post_action" data-toggle="tooltip" title="Up Vote" data-action="like" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">
                                <img class="post_action down_icon" data-toggle="tooltip" title="Down Vote" data-action="like" src="https://freepikpsd.com/file/2019/10/up-icon-png-7-Transparent-Images.png" width="30" alt="">
    
                            </div>
                            <h3>Comments</h3>
                            <div class="post_comments_cont">
                                <div class="comments_inner_container">
                                  
                                    <div class="post_comment">
                                   
                                        <div class="post_comment_message">
                                            <div class="post_by">
                                                <img class="post_comment_image" width="10" src="https://images.unsplash.com/photo-1558507652-2d9626c4e67a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cG9ydHJhaXRzfGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="">
                                                <div class="comment_by_details">
                                                    <span class="post_by_name">Priya Oberoi</span>
                                                    <span class="post_time" >1 hour ago</span>
                                                </div>
                                            </div> 
                                            <div class="message">
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet praesentium, quidem soluta porro iure natus maiores libero explicabo nesciunt sunt, esse doloribus id aperiam quae suscipit error odio obcaecati culpa!
                                            </div>
                                        </div>
                                    </div>
                                 
    
                                </div>
                                <div class="comment_input">
                                    <input type="text" placeholder="Write your comment here...">
                                    <img class="send_comment" src="{{ assetUrl('uploads/R58jLvFt7sI5WzBMqgpul4PulNUGaasUff2lBR4I.png') }}" width="13%" alt="">
                                </div>
                            </div>
                        </div>
               
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>