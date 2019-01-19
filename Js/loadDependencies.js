//Not A good idea for the moment at least
function loadjs(ScriptSources = []){
        for(i = 0;i<ScriptSources.length;i++){
            var tmp  = document.createElement("script");
            tmp.type = "text/javascript";
            tmp.src  = ScriptSources[i];
            document.head.append(tmp)
        }
}
function loadcss(HrefLink = []){
    for(i = 0;i<HrefLink.length;i++){
        var tmp  = document.createElement("link");
        tmp.type = "text/css";
        tmp.rel  = "stylesheet"
        tmp.href  = HrefLink[i];
        document.head.append(tmp);
        }
}
/*
function LoadDependencies(){
    loadcss(
        ["Dependencies/Bootstrap/css/bootstrap.min.css",
        "css/style.css"
    ]);
}*/

