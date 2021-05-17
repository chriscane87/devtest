<!doctype html>

<style>
.dropbtn {
  background-color: #2a6496;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}
a{
color:white;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgba(35, 169, 314, .2);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color:  rgba(35, 169, 314, .2)}

.button {
  background-color: #2a6496;
  border: none;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  
  cursor: pointer;
}

</style>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Dev Test</title>
   
  </head>
  <body style="background-color: rgba(35, 169, 314, .2);">
  
  <div style="height: 51px; background-color: #2a6496;line-height: 35px;color:#FFFFFF;padding-left: 20px;">
  
  <div class="dropdown">
  <button class="dropbtn"><a href="/">Dev Test</a></button>
  <div class="dropdown-content">
    <a href="/task1">Task 1</a>
    <a href="/task2">Task 2</a>
    <a href="/task3">Task 3</a>
  </div>
</div>
  
  </div>