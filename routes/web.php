<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('code_test','TestController@code_test');                         // 代码测试
Route::get('comment_tag','TestController@comment_tag');                     // 评论观点抽取
Route::get('simnet','TestController@simnet');                               // 短文本相似度

//Route::get('insert','TestController@insert');                               // 数据写入


//Route::get('data_lexer','TestController@data_lexer');

Route::get('create_unit','TestController@create_unit');

Route::get('unit','TestController@unit');                                   // UNIT对话API文档