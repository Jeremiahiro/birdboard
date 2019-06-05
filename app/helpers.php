<?php

function gravatar_url($email)
{
    $email = md5($email);

    return "https://gravatar.com/avatar/{$email}?s=40&d=https://res.cloudinary.com/iro/image/upload/v1552487696/Backtick/noimage.png";
}