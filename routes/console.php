<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
    Log::info(" inspare log info. ");
})->describe('Display an inspiring quote');

Artisan::command('hash:md5 {text} {--U|uppercase}',function ($text,$uppercase){

    $md5text=$uppercase ?strtoupper(md5($text)) : md5($text);

    $this->info("md5('{$text}') = $md5text");

} )->describe('Calculate the md5 hash of a text');

Artisan::command('hash:md5 {text : Calculate text} {--U|uppercase : Output uppercase hash value}', function ($text, $uppercase) {
    $md5text = $uppercase ? strtoupper(md5($text)) : md5($text);

    $this->info("md5('{$text}') = $md5text");
})->describe('Calculate the md5 hash of a text');

Artisan::command('info:args {text : Calculate text} {--U|uppercase : Output uppercase hash value}', function () {
    $text=$this->argument('text');
    $uppercase=$this->option('uppercase');

    $md5text = $uppercase ? strtoupper(md5($text)) : md5($text);

    $arguments=$this->arguments();
    $this->info($arguments['text']);
})->describe('Calculate the md5 hash of a text');

Artisan::command('demo:interactive', function (){

    do{
        $name = $this->ask('What is your name?');

        $password = $this->secret('What is the password?');

        if($password !== '123456'){
            $this->error("$name's password error'");
        }

        $from = $this->anticipate('where are you from?', ['Beijing','Shanghai']);

        $this->comment("You are from $from");

        if(!$this->confirm('Try again?')){
            $this->info('Byebye');
            break;
        }
    }while(true);
})->describe('Demo various interactive method');
/**
 * 定义一个测试的定时任务
 *
 */
Artisan::command('autoImportUsersInfo', function (){
    $arguments=$this->arguments();
    if(null != $arguments){
        $this->info("arguments[0] is: arguments[0] ");
    }
    $this->info('autoImportUsersInfo');
})->describe('Demo autoImportUsersInfo interactive method');
