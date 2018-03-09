<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporting</title>
    <link rel="stylesheet" href="">
    <style>
      
header{
  text-align: center;
  font-weight: bold;
  font-size: 30px;
}
body{
  font-family: sans-serif;
  background-color:#F9F9F9;
  padding: 0px;
  margin: 0px;
}
header{
  padding-top: 10px;
  text-align: center;
  font-weight: bold;
  font-size: 20px;
  padding-bottom: 10px;
  color: white;
}
label{
  color:white;
  font-size:16px;
  font-weight: bold;
}
#form_div form{
  margin-top:10px;
}
#form_div{
  margin: auto;
  width: 80%;
  height: 200px;
  background-color: #3D6AB3;
  padding-left: 10px;
  padding-top: 10px;
  border-radius: 10px;
  font-weight: 16px;
  margin-bottom: 10px;
}
#form_div form input[type="date"]{
  border: none;
  background-color:white;
  height: 30px;
  border-radius:3px;
  width: 500px;
  padding:0 15px;
  margin-bottom: 10px;
}
#form_div form input[type="submit"]{
    margin:0px 3px 0px 100px;
    border:1px solid white;
    border-radius:5px;
    background-color:#191970;
    color:white;
    width:140px;
    height:40px;
    font-family:sans-serif;
    font-weight:bold;
    font-size:15px;
    cursor:pointer;
  }
 
   #form_div form input[type="submit"]:hover{
    color: white;
    background-color: #4caf50;
  }
h2{
  text-align: center;
}

    </style>
    <link rel="stylesheet" type="text/css" href="css/report_style.css">
  </head>
  <body>  
    <header>
      Report about patients
    </header>
    <div id="form_div">
      <header>Patient report generation</header>
      <form action="patient-report.php" method="POST">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="fdate">Starting date </label>
        <input type="date" name="fdate" placeholder="Enter starting date"><br><br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="edate">Ending date  </label>
        <input type="date" name="edate" placeholder="Enter last date"><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: yellow;font-size: 16px;">Count patient between dates click</b><input type="submit" class="count" style="display: inline-block;color: yellow; margin-left: 128px;" name="count" value="Count"><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: yellow;font-size: 16px">To generate report about patient click</b><input type="submit" name="submit" value="Report" style="color: yellow;">  <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: yellow;font-size: 16px">To count whole patient click</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="coun" value="Count" style="color: yellow;">   
      </form>
    </div>
  </body>
</html>
