<?php

function actionLogin()
{
    render('guest/login', [], 'guest');
}

function actionRegistration()
{
    render('guest/registration', [], 'guest');
}
