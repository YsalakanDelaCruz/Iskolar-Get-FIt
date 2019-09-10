//likepost
$(document).on("click", ".like-post", likePost);

function likePost(){
    var post_id = $(this).attr("data-pg");
    console.log("I've been clicked and here : "+post_id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/home/like/",
        type: "post",
        data: {post_id:post_id},
        dataType: 'json',
        success: function(data){
            console.log(data);
            var like_count = data.length;
            $("#like-count-"+post_id).html(like_count+" like(s)");

            var likers = "";
            $.each(data, function (key, value){
                likers += "<div><a href='/profile/"+value['username']+"'>"+value['name']+"</a></div>";
            });
            $("#myModal_"+post_id+" .modal-body").html(likers);
        },
        error: function(error){
             console.log(error);
        }
    })
}
