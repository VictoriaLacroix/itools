<!DOCTYPE HTML>
<?php
        if(isset($_REQUEST["submit"])){
                $servername="coscvm1.cs.laurentian.ca";
                $username="php";
                $password="NOPENOPENOPE";
                $database="project";

                $link = new mysqli($servername,$username,$password,$database);

                if($link->connect_errno){
                        die;
                }

                $name = $_REQUEST['name'];

                $name = str_ireplace("'", '`', $name);
                $name = str_ireplace("meta", 'no', $name);
                $name = str_ireplace("script", 'poo', $name);
                $name = str_ireplace("refresh", 'STOP IT', $name);

                $link->query("INSERT INTO sacrifices VALUES ('".$name."',".$_REQUEST["count"].")");
        }
?>

<html>
        <head>
        <link rel="stylesheet" type="text/css" href="finalStyle.css" />
        <script src="/global.js"></script>
        </head>
        <body>
        <div class="navbar">
            <?php
                          include $_SERVER['DOCUMENT_ROOT']."sidebar.php";
              ?>


<!--Audio-->

<audio autoplay> 
  <source src="art/pokemon.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>


<!--Banner-->
         </div>
        <div id="banner">
                <img src="art/banner2.png" alt="This is a ruby">		
        </div>
        <br />
        <br />
        <br />
<!--Status-->
        <div id="leftTable">
                <table>
                        <tr>
                                <th>Gems per Click</th>
                        </tr>
                        <tr>
                                <td><p id="thingstrength">0</p></td>
                        </tr>
                        <tr>
                                <th>Gems Miners</th>
                        </tr>
                                <td><p id="thingsmining">0</p></td>
                        <tr>
                                <th>Gems per Second</th>
                        </tr>
                                <td><p id="thingssecond">0</p></td>
                </table>
        </div>


<!--Ruby Button-->
        <div id="rubyButton">
                <button id="getthing" class="ruby" type="button" onclick="increment()"><img class="rotate" src="art/ruby2.gif" alt="Ruby Button" onclick="increment()"/></button>
<!--Second Table-->
        </div>
        <div id="rightTable">

                <table>
                        <tr>
                                <th> Buy a Miner</th>
                        </tr>
                        <tr>
                                <td> <button id="autoup" type="button" onclick="buything()">Cost:</button></td>
                        </tr>
                        <tr>
                                <th> Improve Cicks</th>
                        </tr>
                        <tr>
                                <td><button id="thingpow" type="button" onclick="powerme()">Cost: </button></td>
                        </tr>
                        <tr>
                                <th>Upgrade Rails</th>
                        </tr>
                        <tr>
                                <td><button id="autopow" type="button" onclick="powerthem()">Cost:</button></td>
                        </tr>
                </table>
<!--Gem Count-->
        </div>
        <div id="bottemTable">
                                <th><p id="things">Gems: 0</p></th>
        </div>


<!-- Sacrifice -->
      <div id="sacrificeerror">
     <form id="sacrifice" method="POST" action="#">
                                          Sacrifice your Gems?<br />
                                          In the name of... <input type="text" name="name" id="sacrificename"/><br />
                                          Amount: <input type="number" name="count" id="sacrificecount"/><br />
                                         <input type="submit" name="submit" value="Submit to Rubylord Aaron" onclick="return validatesacrifice()"/><br />
                                          <i style="display: none" id="inputinvalid">Invalid input: Please enter a valid name and number.</i>
                                 </form>
     </div>
<!--Script-->
                 <script>
                        if(getCookie("ccount") != ""){
                                count = Math.floor(getCookie("ccount"));
                        }else{
                                count = 0;
                                setCookie("ccount",count);
                        }

                        if(getCookie("autocount") != ""){
                                autos = getCookie("autocount");
                        }else{
                                autos = 0;
                                setCookie("autocount",autos);
                        }

                        if(getCookie("autopower") != ""){
                                autopower = getCookie("autopower");
                        }else{
                                autopower = 1;
                                setCookie("autopower",autopower);
                        }

                        if(getCookie("thingpower") != ""){
                                thingpower = Math.floor(getCookie("thingpower"));
                        }else{
                                thingpower = 1;
                                setCookie("thingpower",thingpower);
                        }

                        console.log(count);

                        refreshelements();
                        function refreshelements(){
                                document.getElementById("things").innerHTML="Gems: " + Math.floor(count);
                                //document.getElementById("title").innerHTML=Math.floor(count) + " Gems";
                                document.getElementById("thingsmining").innerHTML=autos;
                                document.getElementById("autoup").innerHTML ="Cost:"+ Math.floor(Math.pow(25,(autos/15)+1));
                                document.getElementById("thingpow").innerHTML = "Improve clicks: " + Math.floor(Math.pow(500,((thingpower-1)/10)+1));
                                document.getElementById("autopow").innerHTML = "Upgrade Rails: " + Math.floor(Math.pow(1000,(autopower/10)+1));
                                document.getElementById("thingssecond").innerHTML=((autos*autopower)/10);
                                document.getElementById("thingstrength").innerHTML=thingpower;
                        }

                        function increment(){
                                count+=thingpower;
                                setCookie("ccount",Math.floor(count));
                                refreshelements();
                        }

                        function automine(){
                                if(autos > 0){
                                        count += autopower*autos;
                                        refreshelements();
                                        setCookie("ccount",Math.floor(count));
                                }
                        }

                        function buything(){
                                if(count >= Math.floor(Math.pow(25,(autos/15)+1))){
                                        count-=Math.floor(Math.pow(25,(autos/15)+1));
                                        ++autos;
                                        refreshelements();
                                        setCookie("autocount",autos);
                                        setCookie("ccount",count);
                                }
                        }

						function powerme(){
                                if(count >= Math.floor(Math.pow(500,((thingpower-1)/10)+1))){
                                        count -= Math.floor(Math.pow(500,((thingpower-1)/10)+1));
                                        ++thingpower;
                                        refreshelements();
                                        setCookie("thingpower",thingpower);
                                        setCookie("ccount",count);
                                }
                        }

                        function powerthem(){
                                if(count >= Math.floor(Math.pow(1000,(autopower/10)+1))){
                                        count -= Math.floor(Math.pow(1000,(autopower/10)+1));
                                        ++autopower;
                                        refreshelements();
                                        setCookie("autopower",autopower);
                                        setCookie("ccount",count);
                                }
                        }

                        function validatesacrifice(){
                                var asked = document.forms['sacrifice'].elements['sacrificecount'].value;
                                var name = document.forms['sacrifice'].elements['sacrificename'].value;

                                if(asked <= count && asked > 0 && name.length >= 0){
                                        count -= asked;
                                        setCookie("ccount",count);
                                        return true;
                                }else{
                                        document.getElementById('inputinvalid').style = "display: inline";
                                        return false;
                                }
                        }

                        //mining
                        setInterval(function(){ automine() }, 10000);
                </script>

        </body>








</html>








