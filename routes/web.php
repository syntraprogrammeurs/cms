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

Route::get('/', function () {
    return view('welcome');
});

/**invoegen data in database via DB::insert**/
Route::get('/insert',function(){
   DB::insert('insert into posts(title, content) values 
(?,?)', ['PHP LARAVEL', 'LARAVEL BEST PHP FRAMEWORK']);
});
/**lezen van data in database via DB::select**/
Route::get('/users', function(){
   //$users = DB::select('SELECT * FROM USERS WHERE id = ?',
     //  [1]);
    $users = DB::select('SELECT * FROM USERS');
    //dd($users);
    echo count($users);
   foreach($users as $user){
       //hier kan je de velden vanuit de class/tabel aanspreken/

       echo $user->name . ' ' . $user->email . '<br>';
   }
});

/**data wijzigen**/
Route::get('/users/update', function(){
   $users = DB::update('update users set email = "testerabdcddd@gmail.com"
WHERE id= ?',[1]);

   //return $users;
   return redirect('/users');

});

/**data delete**/
Route::get('/delete', function(){
   $deletedUser = DB::delete('delete from users where id = ?', [1]);
   return $deletedUser;
});
