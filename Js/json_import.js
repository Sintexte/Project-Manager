$(document).ready(function() {
  
  var return_first = function () {
    var tmp = null;
    $.ajax({  
        'async': false,
        'type': "GET",
        'global': false,
        'dataType': 'json',
        'url': "projects.json",
        'success': function (data) {
            tmp = data;
        }
    });
    return tmp;
  }();

  var json_Projects = return_first;
  var divs = "";
  if(json_Projects != null && json_Projects.length > 0){
    json_Projects.forEach(function(element) {
      divs += "<div id='show"+element.id+"' class='card div-project'>"+
                  "<input data-toggle='collapse'  onclick='show("+element.id+")' class='btn btn-secondary cardbtn' type='button' value='Show'/>"+
                  '<a href="Settings.php?i='+element.id+'&v=essentials"><button class="btn parametrebtn"><i class="fas fa-cog"></i></button></a>'+"<div class='card-header'>"+element.name+"</div>"+
                  "<div class='card-body collapse' id='card"+element.id+"'>";
      if(element.status == "Accepted"){
        divs += "<div><strong>Status:</strong>&nbsp;&nbsp;<span class='badge badge-success'>"+element.status+"</span></div><br/>";
      }else if(element.status == "Hold"){
        divs += "<div><strong>Status:</strong>&nbsp;&nbsp;<span class='badge badge-warning'>"+element.status+"</span></div><br/>";
      }else if(element.status == "Potential project"){
        divs += "<div><strong>Status:</strong>&nbsp;&nbsp;<span class='badge badge-info'>"+element.status+"</span></div><br/>";
      }else{
        divs += "<div><strong>Status:</strong>&nbsp;&nbsp;<span class='badge badge-secondary'>Unknown</span></div><br/>";
      }
                    
      if(element.description != ""){
        //divs +="<p><span style='font-weight: 520'>Description: </span><div class='line'></div><span style='margin-left:30px'>"+element.description+"</span></p>";
        divs += "<p><span style='font-weight: 520'>Description: </span></p><div class='line'></div><div style='margin-left:30px;'>"+element.description+"</div>";
      }
      divs +="</div>"+"</div>";
    });
    $(".project-holder").html(divs);
  }else if(json_Projects == null){
    divs += "<br/><div class='alert alert-danger' role='alert'>Error: The Format of [project.json] file is Incorrect or has been deleted<br/><span style='margin-left:10px;'>-If deleted juste create another project. [Click Add Project]</span><br/><span style='margin-left:10px;'>-Otherwise Check if Json Format is correct.</span></div>";
    $(".project-holder").html(divs);
  }else{
    divs += '<center><h3 style="margin:10px">[You Have No Project]</h3></center>';
    $(".project-holder").html(divs);
  }
});

function show(id){
  let element = document.getElementById("show"+id);
  let ele = document.getElementById("card"+id);
    if(ele.style.display == ""){
      ele.style.display ="inline";
      element.childNodes[0].value = "Hide";
    }else{
      ele.style.display ="";
      element.childNodes[0].value = "Show";
    }

}

