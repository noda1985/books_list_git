  export class Tag{
    tagajax(){
            $.ajax({
                    type: "GET",
                    url: "json_tag.php",
                    datatype: "html",
                    success: function(data) {
                        $("#taglist").html(data).hide().fadeIn('fast');
                    }
            });
        }
    tagsearch(tag){
            $.ajax({
                type: "POST",
                url: "json_search_re.php",
                data:{search:$('.tag',tag).html()},
                datatype: "html",
                success: function(data) {

                    $("#contents").html(data).hide().fadeIn('slow');
                }
            });
        }
    }
    export default Tag;
