<?php

use App\Category;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $role_author = new Role();
        $role_author->name = 'Moderator';
        $role_author->save();

        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->save();

        $user_moderator = new User();
        $user_moderator -> id = 1 ;
        $user_moderator -> name = 'admin';
        $user_moderator -> surname = '1';
        $user_moderator -> email = '1@i.ua';
        $user_moderator -> password = Hash::make('111111');
        $role_user_moderator = Role::where('name', 'Moderator')->first();
        $user_moderator->assignRole($role_user_moderator);
        $user_moderator -> save();

        $user_user = new User();
        $user_user -> id = 2;
        $user_user -> name = 'user';
        $user_user -> surname = '1';
        $user_user -> email = '2@i.ua';
        $user_user -> password = Hash::make('222222');
        $role_user_use = Role::where('name', 'User')->first();
        $user_user->assignRole($role_user_use);
        $user_user -> save();

        $user_moderator = new User();
        $user_moderator -> id = 3 ;
        $user_moderator -> name = 'admin';
        $user_moderator -> surname = '2';
        $user_moderator -> email = '3@i.ua';
        $user_moderator -> password = Hash::make('333333');
        $role_user_moderator = Role::where('name', 'Moderator')->first();
        $user_moderator->assignRole($role_user_moderator);
        $user_moderator -> save();

        $user_user = new User();
        $user_user -> id = 4;
        $user_user -> name = 'user';
        $user_user -> surname = '2';
        $user_user -> email = '4@i.ua';
        $user_user -> password = Hash::make('444444');
        $role_user_use = Role::where('name', 'User')->first();
        $user_user->assignRole($role_user_use);
        $user_user -> save();

        $category1 = new Category();
        $category1 -> id = 1;
        $category1 -> category = 'O(I)';
        $category1->save();

        $category1_plus = new Category();
        $category1_plus -> id = 2;
        $category1_plus -> category = 'Rh+';
        $category1_plus ->parent_id = 1;
        $category1_plus->save();

        $category1_minus = new Category();
        $category1_minus -> id = 3;
        $category1_minus -> category = 'Rh−';
        $category1_minus ->parent_id = 1;
        $category1_minus->save();

        $category2 = new Category();
        $category2 -> id = 4;
        $category2 -> category = 'A(II)';
        $category2->save();

        $category2_plus = new Category();
        $category2_plus -> id = 5;
        $category2_plus -> category = 'Rh+';
        $category2_plus ->parent_id = 4;
        $category2_plus->save();

        $category2_minus = new Category();
        $category2_minus -> id = 6;
        $category2_minus -> category = 'Rh−';
        $category2_minus ->parent_id = 4;
        $category2_minus->save();

        $adv = new \App\Advertisement();
        $adv -> id = 1;
        $adv -> title = 'Допоможіть будь ласка';
        $adv -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv -> category_id = 6;
        $adv -> status = 'active';
        $adv -> user_id = 2;
        $adv -> save();

        $adv2 = new \App\Advertisement();
        $adv2 -> id = 2;
        $adv2 -> status = 'active';
        $adv2 -> title = 'Допоможіть Ігорю';
        $adv2 -> description = 'Потрібна кров для Ігоря! Кров можна прийти і здати у нашому центрі - Удаком. За будь - якою адресою!';
        $adv2 -> category_id = 5;
        $adv2 -> user_id = 4;
        $adv2 -> save();

        $adv3 = new \App\Advertisement();
        $adv3 -> id = 3;
        $adv3 -> status = 'active';
        $adv3 -> title = 'Допоможіть нам будь ласка';
        $adv3 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv3 -> category_id = 2;
        $adv3 -> user_id = 2;
        $adv3 -> save();

        $adv4 = new \App\Advertisement();
        $adv4 -> id = 4;
        $adv4 -> status = 'active';
        $adv4 -> title = 'Допоможіть Катерині';
        $adv4 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv4 -> category_id = 1;
        $adv4 -> user_id = 4;
        $adv4 -> save();

        $adv5 = new \App\Advertisement();
        $adv5 -> id = 5;
        $adv5 -> status = 'active';
        $adv5 -> title = 'Потрібна допомога';
        $adv5 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv5 -> category_id = 6;
        $adv5 -> user_id = 2;
        $adv5 -> save();

        $adv6 = new \App\Advertisement();
        $adv6 -> id = 6;
        $adv6 -> status = 'active';
        $adv6 -> title = 'Потрібна допомога Саші';
        $adv6 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv6 -> category_id = 5;
        $adv6 -> user_id = 4;
        $adv6 -> save();

        $adv7 = new \App\Advertisement();
        $adv7 -> id = 7;
        $adv7 -> status = 'active';
        $adv7 -> title = 'Поможіть будь ласка';
        $adv7 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv7 -> category_id = 4;
        $adv7 -> user_id = 2;
        $adv7 -> save();

        $adv8 = new \App\Advertisement();
        $adv8 -> id = 8;
        $adv8 -> status = 'active';
        $adv8 -> title = 'Увага';
        $adv8 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv8 -> category_id = 3;
        $adv8 -> user_id = 4;
        $adv8 -> save();

        $adv9 = new \App\Advertisement();
        $adv9 -> id = 9;
        $adv9 -> status = 'active';
        $adv9 -> title = 'Хелп';
        $adv9 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv9 -> category_id = 2;
        $adv9 -> user_id = 2;
        $adv9 -> save();

        $adv99 = new \App\Advertisement();
        $adv99 -> id = 10;
        $adv99 -> status = 'active';
        $adv99 -> title = 'Хелп будь ласка';
        $adv99 -> description = 'Потрібна кров! Кров можна прийти і здати у нашому центрі - Медіком. За будь - якою адресою!';
        $adv99 -> category_id = 1;
        $adv99 -> user_id = 4;
        $adv99 -> save();


        $advImg1 = new \App\AdvImage();
        $advImg1 -> id = 1;
        $advImg1 -> image = 'public/images/1.jpg';
        $advImg1 -> advertisement_id = 1;
        $advImg1 -> save();


        $advImg2 = new \App\AdvImage();
        $advImg2 -> id = 2;
        $advImg2 -> image = 'public/images/2.jpg';
        $advImg2 -> advertisement_id = 2;
        $advImg2 -> save();


        $advImg3 = new \App\AdvImage();
        $advImg3 -> id = 3;
        $advImg3 -> image = 'public/images/3.jpg';
        $advImg3 -> advertisement_id = 3;
        $advImg3 -> save();

        $advImg14 = new \App\AdvImage();
        $advImg14 -> id = 4;
        $advImg14 -> image = 'public/images/4.jpg';
        $advImg14 -> advertisement_id = 4;
        $advImg14 -> save();


        $advImg25 = new \App\AdvImage();
        $advImg25 -> id = 5;
        $advImg25 -> image = 'public/images/5.jpg';
        $advImg25 -> advertisement_id = 5;
        $advImg25 -> save();


        $advImg36 = new \App\AdvImage();
        $advImg36 -> id = 6;
        $advImg36 -> image = 'public/images/6.jpg';
        $advImg36 -> advertisement_id = 6;
        $advImg36 -> save();

        $advImg147 = new \App\AdvImage();
        $advImg147 -> id = 7;
        $advImg147 -> image = 'public/images/7.png';
        $advImg147 -> advertisement_id = 7;
        $advImg147 -> save();


        $advImg258 = new \App\AdvImage();
        $advImg258 -> id = 8;
        $advImg258 -> image = 'public/images/8.jpg';
        $advImg258 -> advertisement_id = 8;
        $advImg258 -> save();


        $advImg369 = new \App\AdvImage();
        $advImg369 -> id = 9;
        $advImg369 -> image = 'public/images/9.jpg';
        $advImg369 -> advertisement_id = 9;
        $advImg369 -> save();

        $advImg1471 = new \App\AdvImage();
        $advImg1471 -> id = 11;
        $advImg1471 -> image = 'public/images/22.jpg';
        $advImg1471 -> advertisement_id = 2;
        $advImg1471 -> save();


        $advImg2582 = new \App\AdvImage();
        $advImg2582 -> id = 12;
        $advImg2582 -> image = 'public/images/33.jpg';
        $advImg2582 -> advertisement_id = 3;
        $advImg2582 -> save();


        $advImg3693 = new \App\AdvImage();
        $advImg3693 -> id = 13;
        $advImg3693 -> image = 'public/images/32.jpg';
        $advImg3693 -> advertisement_id = 3;
        $advImg3693 -> save();

        $advImg3693 = new \App\AdvImage();
        $advImg3693 -> id = 14;
        $advImg3693 -> image = 'public/images/102.jpg';
        $advImg3693 -> advertisement_id = 10;
        $advImg3693 -> save();
    }
}
