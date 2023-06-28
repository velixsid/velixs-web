<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'Ilsya sVn',
            'username' => 'ilsya',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'about' => "Let's start living like no one can help us in any event, so that when we are helped in certain times, it becomes a plus in itself. ☃️",
            'title_profile' => 'Founder & CEO Velixs',
            'password' => bcrypt('admin')
        ]);

        \App\Models\Websettings::create([
            'meta_title' => 'VELIXS - Web Development',
            'meta_description' => 'Velixs adalah sebuah perusahaan yang bergerak di bidang pengembangan website dan aplikasi berbasis web.',
            'meta_keywords' => 'velixs, web development, web developer, web developer indonesia, web developer bandung, web developer jakarta, web developer surabaya, web developer semarang, web developer yogyakarta, web developer malang, web developer bali, web developer medan, web developer palembang, web developer makassar, web developer aceh, web developer kalimantan, web developer sumatera, web developer sulawesi, web developer papua, web developer jawa, web developer sumatera, web developer indonesia, web developer terbaik, web developer terpercaya, web developer murah, web developer profesional, web developer berkualitas, web developer handal, web developer terbaik indonesia, web developer terpercaya indonesia, web developer murah indonesia, web developer profesional indonesia, web developer berkualitas indonesia, web developer handal indonesia, web developer terbaik bandung, web developer terpercaya bandung, web developer murah bandung, web developer profesional bandung, web developer berkualitas bandung, web developer handal bandung',
            'meta_thumbnail' => 'http://127.0.0.1:8000/storage/web/thumbnail.jpg',
            'logo' => 'http://127.0.0.1:8000/storage/web/logo.svg',
            'payment_whatsapp' => '6281234567890',
            'bot_whatsapp' => '6281234567890',
            'contact_whatsapp' => json_encode([
                'Admin' => '6281234567890',
                'Nakiri BOT' => '6285745865758',
            ]),
            'contact_email' => 'admin@gmail.com',
            'social_links'=> json_encode(array(
                [
                    'name' => 'Facebook',
                    'svg' => '<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>',
                    'url' => 'https://facebook.com'
                ],
                [
                    'name' => 'Instagram',
                    'svg' => '<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"clip-rule="evenodd" /></svg>',
                    'url' => 'https://instagram.com'
                ],
                [
                    'name' => 'GitHub',
                    'svg' => '<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>',
                    'url' => 'https://github.com'
                ]
            ))
        ]);


        \App\Models\BlogTags::insert([
            [
                'title' => 'HTML',
                'slug' => 'html',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tips & Trick',
                'slug' => 'tips-trick',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tutorial',
                'slug' => 'tutorial',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);


        \App\Models\Blog::insert([
            [
                'title' => 'Lorem ipsum dolor sit amet',
                'slug' => 'lorem-ipsum-dolor-sit-amet',
                'image' => 'storage/blogs/1.png',
                'content' => 'lorem',
                'author' => $admin->id,
                'tags' => json_encode(array(1, 2)),
                'is_published' => true,
                'meta_description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem libero possimus illo sit voluptas ex!',
                'created_at' => '2021-04-16 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Lorem ipsum dolor sit amet 2',
                'slug' => 'lorem-ipsum-dolor-sit-amet-2',
                'image' => 'storage/blogs/2.png',
                'content' => 'lorem',
                'author' => $admin->id,
                'tags' => json_encode(array(3, 2)),
                'is_published' => true,
                'meta_description' => 'Lorem ipsum dolor sit,sd asd asd awd awda wdaw awdawd amet consectetur adipisicing elit. Rem libero possimus illo sit voluptas ex!',
                'created_at' => '2021-04-16 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Autentikasi dengan Laravel Sanctum & Fortify untuk SPA',
                'slug' => 'autentikasi-dengan-laravel-sanctum-fortify-untuk-spa',
                'image' => 'storage/blogs/3.png',
                'content' => 'Nah jetstream sendiri juga menggunakan fortify sebagai api auth nya, namun, jika kita tidak ingin menggunakan jetstream melainkan ingin memakai fortify nya saja juga bisa, terlebih lagi, kita bisa turn off view nya yang by default bisa kita tentukan dalam AppServiceProvider, kali ini saya akan menganggap bahwa Anda ingin memakai fortify sebagai api saja, dan untuk view auth nya menggunakan spa yang telah Anda punya.',
                'author' => $admin->id,
                'tags' => json_encode(array(3, 1)),
                'is_published' => true,
                'meta_description' => 'Kita sama - sama tau, begitu banyak first party package untuk melakukan autentikasi, seperti breeze, ui, jetstream.',
                'created_at' => '2021-04-15 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Membangun Forum Dengan Laravel TDD Sudah Selesai',
                'slug' => 'membangun-forum-dengan-laravel-tdd-sudah-selesai',
                'image' => 'storage/blogs/4.png',
                'content' => 'Nah jetstream sendiri juga menggunakan fortify sebagai api auth nya, namun, jika kita tidak ingin menggunakan jetstream melainkan ingin memakai fortify nya saja juga bisa, terlebih lagi, kita bisa turn off view nya yang by default bisa kita tentukan dalam AppServiceProvider, kali ini saya akan menganggap bahwa Anda ingin memakai fortify sebagai api saja, dan untuk view auth nya menggunakan spa yang telah Anda punya.',
                'author' => $admin->id,
                'tags' => json_encode(array(3, 1, 2)),
                'is_published' => true,
                'meta_description' => 'Seperti yang kita sama-sama ketahui, pada seri ini kita akan membangun forum dengan test driven development, yang mana kita akan mengimplementasikan Pest dari pada PHPUnit, kita juga akan menggunakan Inertiajs disertai dengan Tailwind CSS.',
                'created_at' => '2021-02-15 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Perbedaan ForEach dan Map Dalam Javascript',
                'slug' => 'perbedaan-foreach-dan-map-dalam-javascript',
                'image' => 'storage/blogs/5.png',
                'content' => 'Jika Anda sering bermain dengan JavaScript akhir - akhir ini, Anda mungkin menemukan dua metode Array yang sepertinya fungsi dari kedua itu sama.',
                'author' => $admin->id,
                'tags' => json_encode(array(3, 2)),
                'is_published' => true,
                'meta_description' => 'Jika Anda sering bermain dengan JavaScript akhir - akhir ini, Anda mungkin menemukan dua metode Array yang sepertinya fungsi dari kedua itu sama.',
                'created_at' => '2021-01-21 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Inertia.js Sekarang Sudah Versi 1.0',
                'slug' => 'inertiajs-sekarang-sudah-versi-1-0',
                'image' => 'storage/blogs/8.png',
                'content' => 'Tepat pada tanggal 14 januari, Inertia.js telah resmi rilis versi 1.0, yang mana pada rilis kali ini semua di buat lebih singkat. Lebih singkat dalam arti tidak terpisah-pisah lagi.',
                'author' => $admin->id,
                'tags' => json_encode(array(2)),
                'is_published' => true,
                'meta_description' => 'Tepat pada tanggal 14 januari, Inertia.js telah resmi rilis versi 1.0, yang mana pada rilis kali ini semua di buat lebih singkat. Lebih singkat dalam arti tidak terpisah-pisah lagi.',
                'created_at' => '2021-01-20 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'PHP dan Laravel Fixer Dengan Duster',
                'slug' => 'php-dan-laravel-fixer-dengan-duster',
                'image' => 'storage/blogs/7.png',
                'content' => 'Tepat pada tanggal 14 januari, Inertia.js telah resmi rilis versi 1.0, yang mana pada rilis kali ini semua di buat lebih singkat. Lebih singkat dalam arti tidak terpisah-pisah lagi.',
                'author' => $admin->id,
                'tags' => json_encode(array(1)),
                'is_published' => true,
                'meta_description' => 'Dalam artikel ini kita akan membahas tentang PHP dan Laravel fixer yang baru saja di rilis oleh tim tighten yaitu Duster.',
                'created_at' => '2021-01-15 00:00:00',
                'updated_at' => now()
            ],
            [
                'title' => 'Intro to Hellayan.com',
                'slug' => 'intro-to-hellayan-com',
                'image' => 'storage/blogs/6.png',
                'content' => 'Hellayan adalah platform kursus yang mana setiap hal akan di ajarkan dari tulisan seperti layaknya buku, namun ini hanya online.',
                'author' => $admin->id,
                'tags' => json_encode(array(2,3)),
                'is_published' => true,
                'meta_description' => 'Hellayan adalah platform kursus yang mana setiap hal akan di ajarkan dari tulisan seperti layaknya buku, namun ini hanya online.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        for($i=0; $i <=10; $i++) {
            // random number range
            $rand = rand(1, 8);
            // random slug
            $random = substr(md5(mt_rand()), 0, 7);
            $created_At = now()->subDays($i);
            \App\Models\Blog::insert([
                'title' => 'Lorem ipsum dolor sit amet '.$i,
                'slug' => 'lorem-'.$random,
                'image' => 'storage/blogs/'.$rand.'.png',
                'content' => 'lorem',
                'author' => $admin->id,
                'tags' => json_encode(array(1, 2)),
                'is_published' => true,
                'meta_description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem libero possimus illo sit voluptas ex!',
                'created_at' => $created_At,
                'updated_at' => now()
            ]);
        }


        \App\Models\ProductTags::insert([
            [
                'title' => 'HTML',
                'slug' => 'html',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'PHP',
                'slug' => 'php',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'React',
                'slug' => 'react',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'NodeJs',
                'slug' => 'nodejs',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Landing',
                'slug' => 'landing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'UI Template',
                'slug' => 'ui',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Wordpress',
                'slug' => 'wordpress',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Javascript',
                'slug' => 'js',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        for($i=0; $i <=20; $i++) {
            // random number range
            $rand = rand(1, 8);
            // random slug
            $random = substr(md5(mt_rand()), 0, 7);
            $created_At = now()->subDays($i);
            \App\Models\Product::insert([
                'title' => 'Lorem ipsum dolor sit amet '.$i,
                'slug' => $random,
                'image' => 'storage/item/'.$rand.'.png',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem libero possimus illo sit voluptas ex! asdas daw awaw dgnawydgayw duayw yauwgduy agudawd awd awd awd awdawd',
                'author' => $admin->id,
                'tags' => json_encode(array(rand(1,3), rand(4,8))),
                'is_published' => true,
                'price' => json_encode(array(
                    'usd' => rand(10, 100),
                    'idr' => rand(100000, 1000000)
                )),
                'preview' => 'https://www.youtube.com?id='.$i,
                'meta_description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem libero possimus illo sit voluptas.',
                'release' => json_encode(
                    array(
                        'latest' => '1.0.'.$i,
                        'latest_url'=> 'http://google.com?id='.$i,
                        'archive' => array(
                            array(
                                'version' => '1.0.0',
                                'url' => 'http://google.com',
                            ),
                            array(
                                'version' => '1.0.'.$i,
                                'url' => 'http://google.com?id='.$i,
                            ),
                        )
                    )
                ),
                'created_at' => $created_At,
                'updated_at' => now()
            ]);
        }

        \App\Models\OwnedLicense::create([
            'user_id' => $admin->id,
            'license_key' => 'PRODUCT-XXWW-DSW2-FF42-34DD',
            'item' => 'digital-product',
            'item_id' => \App\Models\Product::first()->id,
            'expires_at' => now()->addDays(30)
        ]);

        \App\Models\OwnedLicense::create([
            'user_id' => $admin->id,
            'license_key' => 'PRODUCT-WSL3-2311-XF42-34SD',
            'item' => 'digital-product',
            'item_id' => \App\Models\Product::find(2)->id,
        ]);

        \App\Models\License::create([
            'license_key' => 'PRODUCT-SW2W-DSW2-T3W2-2G3D',
            'item' => 'digital-product',
            'item_id' => \App\Models\Product::find(3)->id,
        ]);

        \App\Models\License::create([
            'license_key' => 'PRODUCT-2222-FS22-FWWS-3123',
            'item' => 'digital-product',
            'item_id' => \App\Models\Product::find(2)->id,
        ]);
    }
}
