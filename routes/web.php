<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\ImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    //fetch all the users
    // $users = DB::select("select * from users");
    // $users = DB::select("select * from users where email = ?",['ssewankamboderick@gmail.com']);
    // $users = DB::table('users')->get();
    //adding the where in the query builder
    // $users = DB::table('users')->where('id',1)->get();
    //power of query builder can use first if u want the first data, can use find(id)
    // $users = DB::table('users')->first();
    // $users = DB::table('users')->find(1);
    //we can reduce the work by using the model eg replace DB::table('users') with user model
    // $user = user::where('id',1);
    // $user = user::find(1);


    //create a new user
    // $user = DB::insert("insert into users (name,email,password) values (?,?,?)", ['Derick','rickrambo30@gmail.com','password',]);
    //insert using using query builder
    // $user = DB::table('users')->insert([
    //     'name'=>'Sarthak',
    //     'email'=>'abc@gmail.com',
    //     'password'=>'password',
    // ]);
    //using Eloquent
    // $user = user::create([
    //     'name'=>'Sarthak',
    //     'email'=>'abc10@gmail.com',
    //     'password'=>'password',
    // ]);
    //how to insert data  wen the password is encrypted we use a function 'bcrypt'
    // $user = user::create([
    //         'name'=>'Sarthak',
    //         'email'=>'info@gmail.com',
    //         'password'=> bcrypt('password'),
    //     ]);

    //here the password is encrypted automatically using eroquent
    // $user = user::create([
    //         'name'=>'Sarthak',
    //         'email'=>'abc@gmail.com',
    //         'password'=>'password',
    //     ]);

    //Update the user
    // $user = DB::update("update users set name = 'John Rick Rambo' where id=4");
    //If u want to use the bindings
    // $user = DB::update("update users set email = ? where id=?",['abc@gmail.com',4]);
    //update using query builder
    // $user = DB::table('users')->where('id',6)->update(['email'=>'rickrambo@gmail.com']);
    //using Eloquent
    // $user = user::where('id',8)->first(); OR we can use
    // $user = user::find(8);
    // $user->update(['name' => 'Dero']);

    //delete a user
    // $user = DB::delete("delete from users where id=4");
    //delete using query builder
    // $user = DB::table('users')->where('id',6)->delete();
    //using eloquent where user is the model
    // $user = user::find(8);
    // $user->delete();


    // dd($user->name);



    //Another topic 
    return view('welcome');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //We are using Patch request to trick the html that patch is the same with post
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/Image', [ImageController::class, 'update'])->name('profile.Image');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
