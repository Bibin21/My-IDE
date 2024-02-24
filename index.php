<?php
//this is sample comment for new tag
?>
<html>
   
    <head>
        
        <script src="https://kit.fontawesome.com/d22e378a1e.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css"> 
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script> 
        <script src="https://codemirror.net/mode/css/css.js"></script>
        <script src="https://codemirror.net/mode/xml/xml.js"></script>
        <script src="https://codemirror.net/mode/javascript/javascript.js"></script>
        <script src="https://codemirror.net/mode/clike/clike.js"></script>
        <script src="https://codemirror.net/mode/python/python.js"></script>
    </head>
    </head>
    <body>
    
<nav class="navbar">
    <h2>Online Code Editor</h2>
<select name="Language" selected="C" id="dropdown" onchange="changelabel(value)">
<option value="C" >C</option>
<option value="Html">Html,Css,Js</option>
<option value="C++">C++</option>
<option value="Python">Python</option>
<option value="Java">Java</option>
</select>
<div class="darkmode">
<input type="checkbox" id="switch" onclick='dark()'
class="checkbox"/>
<label for="switch" id="toggle" style="margin:10px;" class="toggle">
<p id="font" style="margin-left:4px;">OFF  ON</p>
<label class="dark-write" style="color:black">DarkMode</label>
</label>
</div>
<button id="run" class="run" onclick='coderun()'>
    <i class="fa-solid fa-play"></i> Run
</button>
</nav>
<div class="total-container">
    <div class="inputc">
<div class="Container">
<label id="label1">C</label>
<textarea name="Html"  id="txt1"></textarea>
</div>
<div id="Container-1"class="Container-1" style="display:none;">
    <label id="label2">CSS</label>
    <textarea name="Css"id="txt2" ></textarea>
    </div>
    
    <div id="Container-2"class="Container-2" style="display:none;">
        <label id="label3">JS</label>
        <textarea name="JS"id="txt3"></textarea>
        </div>
        </div>
        <div class="outputc">
          <label>Output</label>
        <iframe  id="output" src="" style="border: 2px solid black;"></iframe>
        </div>
        </div>
</body>
</html>
<style>
    body{

        font-family: Tahoma, sans-serif;
    margin: 0px 0px;
    }

.navbar{
display: flex;
background-color: rgb(65, 196, 219);
width: 100%;
height:80px;

}
.navbar>select{
    margin-left:50%;
    margin-right: 30px;
    height:50%;
    margin-top:15px;
}
.navbar>input{
    margin-left:30px;
    margin-right: 30px;
   height:50%;
   margin-top:15px;
}

.navbar>button{
    margin-left:30px;
    margin-right: 30px;
    height:50%;
   margin-top:15px;
}
.dark-write{
position:absolute;
margin-top: -5px;
margin-left: 3px;
}
.inputc{
margin:10px 40px;
flex-basis: 55%;
max-width: 55%;
resize: none;

}
.total-container{
display:flex;
width: 100%;
height: 100%;
}
textarea{

width:100%;
height:45%;
border:2px solid black;
}
.outputc{
    flex-basis: 40%;
    margin-top: 10px;
}
.outputc>label{
margin-left: 40px;

}
select{
    border-radius:30px;
}
iframe
{
margin:0px 10px;
width:95%;
height:89%;
background-color: white;

}
 .toggle {
        position : relative ;
        display : inline-block;
        width : 70px;
        height : 40px;
        margin-top:-20px;
        background-color: rgb(0, 0, 0);
        border-radius:40px;
        border: 2px solid gray;
color: white;
    }
    .toggle:after {
        content: '';
        position: absolute;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color:rgb(255, 255, 255);
        top: 2px;
        left: 0px;
        color: white;
        transition:  all 0.5s;
    
    }
    
    .checkbox:checked + .toggle::after {
        background-color: rgb(0, 0, 0);
        left : 35px;

    }
    .CodeMirror
    { 
        height: 90%;
        border:2px solid black;
font-size:17;
    }
    .checkbox {
        display : none;
    }
    .dark-mode {
        background-color: black;
        color: white;

      }
      .light-mode {
        background-color: white;
        color: black;
      }

    </style>
    <script>
    var i=0;
    var value="C";
    var minLines = 5;
var startingValue = " ";
var newval="clike";
var myhtml=CodeMirror.fromTextArea(document.getElementById('txt1'), {
    lineNumbers: true,
    mode:newval
});
var mycss=CodeMirror.fromTextArea(document.getElementById('txt2'), {
    lineNumbers: true,
    mode:"css"
  
});
var myjs=CodeMirror.fromTextArea(document.getElementById('txt3'), {
    lineNumbers: true,
 mode:"javascript"
});
var lang="C";
function changelabel(value)
{
document.getElementById('label1').textContent=value;
if(value=='Html')
{
i=1;
myhtml.setOption("mode","xml");
mycss.setValue(" ");
myjs.setValue(" ");
myhtml.setSize("100%","50%");
mycss.setSize("100%","50%");
   myjs.setSize("100%","50%");
   myhtml.setValue("");
   var output=document.getElementById('output').contentWindow.document;
output.open();
    output.write("");
output.close();
    document.getElementById('txt1').style.height="50%";
    myhtml.setValue("<!-- Code is Executed Automatically for Html Css and Js No need to use RUN button-->");
    document.getElementById('Container-1').style.display="block";
    document.getElementById('Container-2').style.display="block";
    document.getElementById('output').style.height="150%";
}
else
{ 
    i=0;
    lang=value;
    if(value=="C"+"Java"+"C++")
    newval="clike";
    else if(value=="Python")
    newval="python";
myhtml.setOption("mode",newval);
   myhtml.setSize("100%","90%");
document.getElementById('txt1').style.height="90%";
myhtml.setValue("");
mycss.setValue("");
myjs.setValue("");
var output=document.getElementById('output').contentWindow.document;
output.open();
    output.write("");
output.close();
    document.getElementById('Container-1').style.display="none";
    document.getElementById('Container-2').style.display="none";
    document.getElementById('output').style.height="89%";
}
}
myhtml.on('change',function(){
    if(i==1)
    {
    var txt1=myhtml.getValue();
    var txt2=mycss.getValue()
    var txt3=myjs.getValue();
    var output=document.getElementById('output').contentWindow.document;
    output.open();
    output.write(txt1+"<style>"+txt2+"</style>"+"<scri"+"pt>"+txt3+"</scri"+"pt>");
output.close();
    }
});
mycss.on('change',function(){
    var txt1=myhtml.getValue();
    var txt2=mycss.getValue()
    var txt3=myjs.getValue();
    var output=document.getElementById('output').contentWindow.document;
    output.open();
    output.write(txt1+"<style>"+txt2+"</style>"+"<scri"+"pt>"+txt3+"</scri"+"pt>");
output.close();
});
myjs.on('change',function(){
    var txt1=myhtml.getValue();
    var txt2=mycss.getValue()
    var txt3=myjs.getValue();
    var output=document.getElementById('output').contentWindow.document;
    output.open();
    output.write(txt1+"<style>"+txt2+"</style>"+"<scri"+"pt>"+txt3+"</scri"+"pt>");
output.close();
});
function coderun(){
    let txt1=myhtml.getValue();
    let txt2=mycss.getValue()
    let txt3=myjs.getValue();
    let output=document.getElementById('output').contentWindow.document;
if(i==1)
{
    output.open();
    output.write(txt1+"<style>"+txt2+"</style>"+"<scri"+"pt>"+txt3+"</scri"+"pt>");
output.close();

}
else
{  
    $.ajax({

        url:"compile.php",
        method:"POST",
        data:{
language:lang,
code:txt1
        },
        success:function(response){
            output.open();
    output.write(response);
output.close();
        }
    })
}
}
function dark()
{
    var font=document.getElementById('font');
    var toggle=document.getElementById('toggle');
    var element=document.body;
    var input=document.getElementsByClassName("CodeMirror cm-s-default");
    var output=document.getElementById("output");
  var checkbox=document.getElementById('switch');
  if(checkbox.checked==true)
  {
    for(let i=0;i<3;i++)
{
    input[i].style.backgroundColor="grey";
}
output.style.backgroundColor="grey";
    element.className="dark-mode";
    toggle.style.backgroundColor="white";
    font.style.color="black";
  }
  else
  {
    for(let i=0;i<3;i++)
{
    input[i].style.backgroundColor="white";
}
output.style.backgroundColor="white";
    toggle.style.backgroundColor="black";
    font.style.color="white";
   element.className="light-mode";
  }
}
    </script>
