<?php

function getUpdateTime(){
  date_default_timezone_set("Asia/Kolkata");
  return date("Y-m-d h:i:s");
};

function hashPassword($value){
  return password_hash($value , PASSWORD_BCRYPT , ['cost' => 10,] );
};
