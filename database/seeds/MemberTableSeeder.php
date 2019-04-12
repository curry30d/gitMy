<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $faker=\Faker\Factory::create('zh_CN');
        for($i=0;$i<500;$i++){
        //访问具体的属性来获取数据
        $data[]=[
           'username'    =>$faker->userName,
           'password'    =>bcrypt('123456'),
           'gender'      =>rand(1,3),
           'mobie'      =>$faker->phoneNumber,
           'email'       =>$faker->email,
           'avatar'      =>'/statics/avatar.jpg',
           'created_at'   =>date('yY-m-d H:i:s',time()),
           'type'      =>rand(1,2),
           'status'      =>rand(1,2),
        ];
    }
    DB::table('member')->insert($data);
    }
}
