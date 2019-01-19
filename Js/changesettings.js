
var width;
$(document).ready(function(){
  width = $(document).height();
  document.getElementById("project-content").style = "height: "+(width-215)+"px;";
});
function change(id,type){
    var div = document.getElementById("prcon-"+type);
    var value = div.childNodes[0].nodeValue;
    if(type != "description"){
        div.innerHTML = "<input class='txt_b' id='data_"+type+"' type='text' value='"+value+"'>";
    }else{
        div.innerHTML = "<textarea onresize='prcont()'  spellcheck='false' class='txt_b' id='data_"+type+"' cols='70' rows='10' wrap='hard'>"+value+"</textarea>";
    }
    div.innerHTML += "<input  onclick=save("+id+",'"+type+"') type='button' class='btn spn-tst' value='Save'>";
}
function save(id,type){
    var value = document.getElementById("data_"+type).value;
    console.log("save => id: "+id+", type=> "+type+", Data=> "+value);
}
function prcont(){
    if($(document).height() != width){
      console.log($(document).height());
      document.getElementById("project-content").style = "height: "+($(document).height()-215)+"px;";
      width = $(document).height();
    }
}
