$( document ).ready(function() {
    console.log("ready !");
});
function send(){
    let title = document.getElementById("pr-title").value;
    let description = document.getElementById("pr-desc").value;
    let status = document.getElementById("statusSel").value;
    console.log(status);
    if(title != ""){
        request = $.ajax({
            url: "./php/addjson.php?title="+title+"&description="+description+"&status="+status,
            type: "post",
            success:function(){document.location.href = './';}
        });
    }else{
        document.getElementById("erroradd").innerHTML = "<div style='width: 70%;' class='alert alert-danger' role='alert'>Please Give the Project a Name</div>";
    }
}
