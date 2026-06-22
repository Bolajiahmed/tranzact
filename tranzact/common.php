<?php
function is_email($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
        return false;
     }
     else{
        return true;
        }
    }
?>