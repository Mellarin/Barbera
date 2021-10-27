<?php
function validation_register($value_from_register)
{
    if(!empty($value_from_register))
    {
        $trim_text=trim($value_from_register);
        $injection_string = filter_var($trim_text,FILTER_SANITIZE_STRING);
        return $injection_string;
    }
    return '';
}
function validation_register_email($value_from_register_email)
{
    if(!empty($value_from_register_email))
    {
        $trim_text=trim($value_from_register_email);
        $injection_string = filter_var($trim_text,FILTER_SANITIZE_EMAIL);
        return $injection_string;
    }
    return '';
}