<?php
        function F404(){echo"404 Project not found !";}
        $array_place = 1;
        $i = 0;
        if(!isset($_GET['i'])){ F404();die();}
        else{
            $id=$_GET['i'];
            $ele = $_GET['v'];
            $json = json_decode(file_get_contents("projects.json"),true);
            $F404T = false;
            foreach ($json as &$value){
                foreach($value as $key => $v){
                    if($key == "id"){
                        if($v == $id){
                            $array_place = $i;
                            $F404T = true;
                        }
                    }
                }
                $i++;
            }
        }
        if(!$F404T){
            F404();
            die();
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo "<title>Project Manager | ".$json[$array_place]["name"]."</title>" ?>
    <link rel="stylesheet" href="Dependencies/Bootstrap/css/bootstrap.min.css">
    <script src='./Dependencies/Jquery/jquery.min.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src='./js/changesettings.js'></script>
</head>
<body onresize="prcont()">
    <div class='container-fluid indexH'>
                <div class="row">
                    <table border='0' width="100%" style="margin: 10px 0px 10px 0px">
                        <tr>
                            <td width="17%"><a style="text-decoration:none" href='./'><h1 id="title">Project Manager</h1></a>
                            </td>
                            <td width="27%">
                                <input type="text" class="form-control searchInput" placeholder="Search">
                            </td>
                            <td id="td3" width="50%">
                            </td>
                        </tr>
                    </table>
                </div>
    </div>
    <div style="margin:20px 20px 0px 20px;">
        <h1 style="font-size:20px;"><?php echo "/".$json[$array_place]["name"] ?></h1>
        <p id="status_set">
            status: <span class='<?php
                $s = "";
                if($json[$array_place]["status"] == "Accepted"){
                    $s = "badge-success";
                }else if($json[$array_place]["status"] == "Potential project"){
                    $s = "badge-info";
                }else if($json[$array_place]["status"] == "Hold"){
                    $s = "badge-warning";
                }
                echo "badge ".$s;
            ?>'>
                <?php echo $json[$array_place]["status"]; ?>
            </span></div></p>
    </div>
    <div class="container-fluid" style="background:rgb(68, 72, 87);margin-top:25px;padding:0px;">
            <div class="row navcontainer">
                <?php
                    $i = 0;
                    $elements = ["Essentials","Updates","Issues"];
                    while($i<sizeof($elements)){
                        echo "<div class ='col ";
                        if(strtolower($elements[$i]) == $ele){
                            echo "selected";
                        }
                        echo "'><a href='./Settings.php?i=".$id."&v=".strtolower($elements[$i])."'>".$elements[$i]."</a></div>";
                        $i++;
                    }
                ?>
                <!--
                <div class="col">
                    <p>Essentials</p>
                </div>
                <div class="col">
                    <p>Updates</p>
                </div>
                <div class="col">
                    <p>Issues</p>
                </div>-->
        </div>

        <div id="project-contentroot">
            <div id="project-content">
                    <?php
                        //rgb(60, 64, 78) root
                        //rgb(66, 70, 85) root2
                        if($ele == "essentials"){
                            if($json[$array_place]["description"] == ""){
                                $json[$array_place]["description"] = " [Empty]";
                            }
                            foreach($json[$array_place] as $k => $v){
                                if($k != 'id'){
                                    echo    "<span class = 'prcon-title'>Project-".$k." : </span><br/>
                                    <div id='prcon-".$k."' class='prcon-content'>".$v."<input type='button' class='btn spn-tst' onclick=\"change(".$id.",'".$k."')\" value='change'></div><hr/>";
                                }else{
                                    $id = $v;
                                }

                            }

                            /*echo   "<span class='prcon-title'>Project-Name : </span><br/>
                                    <div class='prcon-content'>".$json[$array_place]["name"]."<span class='btn spn-tst'>Change</span></div>
                                    <hr/>";    //name

                            echo   "<span class='prcon-title'>Project-Description : </span>
                                    <div class='prcon-description'>".$json[$array_place]["description"]."<span class='btn spn-tst'>Change</span></div><hr/>";
                            echo   "<span class='prcon-title'>Project-Status : </span>
                                    <div class='prcon-description'>".$json[$array_place]["status"]."<span class='btn spn-tst'>Change</span></div><hr/>";
                            */

                        }else if($ele == "updates"){
                            echo "Updates";
                        }else if($ele == "issues"){
                            echo "Issues";
                        }
                    ?>
            </div>

        </div>
    </div>
</body>
</html>
