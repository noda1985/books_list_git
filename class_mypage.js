export class Mypage{
    mypage_view(){
        let likedata_str_get = localStorage.getItem("likedata");
        console.log("mypage1 likedata_str_get="+likedata_str_get);

        let likedata_array = [];
            likedata_array = likedata_str_get.split(",");
        console.log("mypage2 likedata_array="+likedata_array);
        console.log(likedata_array[0]);

        $.ajax({
                type: "POST",
                url: "mypage_search_re.php",
                data:{search:likedata_array},
                datatype: "html",
                success: function(data) {
                    $("#contents").html(data);
                }
            });
        }

    mypage_save(){
        const v = $(".modal-content > h6").attr("data-like");
        console.log(v);

        if(localStorage.getItem("likedata")){

            let likedata_str_get = localStorage.getItem("likedata");
            console.log("1 likedata_str_get="+likedata_str_get);

            let likedata_array = [];
            likedata_array = likedata_str_get.split(",");
            console.log("2 likedata_array="+likedata_array);

            likedata_array.unshift(v);
            console.log("3 likedata="+likedata_array);

            let likedata_str_set = likedata_array.toString();
            console.log("4 likedata_str_set="+likedata_str_set);

            localStorage.setItem("likedata" , likedata_str_set );

            likedata_str_get = localStorage.getItem("likedata");
            console.log("5 likedata_str_get="+likedata_str_get);

            likedata_array = likedata_str_get.split(",");
            console.log("6 likedata_array="+likedata_array);


        }else{

            let likedata_array = [v];
            console.log("new1 likedata_array="+likedata_array);

            let likedata_str_set = likedata_array.toString();
            console.log("new2 likedata_str_set="+likedata_str_set);

            localStorage.setItem("likedata" , likedata_str_set );

            likedata_str_get = localStorage.getItem("likedata");
            console.log("new4 likedata_str_get="+likedata_str_get);

            likedata_array = likedata_str_get.split(",");
            console.log("new5 likedata_array="+likedata_array);
        }
    }
}
export default Mypage;