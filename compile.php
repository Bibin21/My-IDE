<?php
    $language = $_GET['language'];
    $code = $_GET['code'];
if ($language == "Python") 
    $lang="py";
else if ($language == "C")
    $lang = "c";
else if ($language == "C++")
    $lang = "cpp";
else if ($language == "Java")
    $lang = "java";
$randomname =substr(md5( mt_rand()),0,7);;
$filename = "temp/" . $randomname . "." . $lang;
$pfile=fopen($filename, "w");
fwrite($pfile,$code);
fclose($pfile);
if ($lang == "py") {
    $output = shell_exec("python $filename 2>&1");
        echo $output;
}
if ($lang == "c") {
    $outputexe = $randomname . ".exe";
$error=shell_exec("gcc $filename -o temp/$outputexe 2>&1");
    if ($error =="") {
        $output = shell_exec(__DIR__ . "/temp/$outputexe &");
        echo $output;
    } else
        echo $error;
}
if ($lang == "cpp") {
    $outputexe = $randomname . ".exe";
   $error=shell_exec("g++ $filename -o temp/$outputexe 2>&1");
   if ($error =="") {
    $output = shell_exec(__DIR__ . "/temp/$outputexe &");
    echo $output;
} else
    echo $error;
}

if ($lang == "java") {
    $output = shell_exec("java $filename 2>&1");
        echo $output;
}


?>