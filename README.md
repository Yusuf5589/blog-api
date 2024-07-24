<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proje Kurulumu

Projemizi Klonlıyalım şimdi ilk yapmamız gereken git yüklemek giti kendi sayfasından indirebilirsiniz "https://git-scm.com/downloads" git'i indirdikten sonra projemiz için bir dosya oluşturup üzerine git bash terminalini açıyoruz. sonrasında "git clone 'https://github.com/Yusuf5589/blog-api.git'" komutunu çalıştırıp projemizi oluşturduğunuz dosya içine kopyalıyorsunuz.

Proje kopyalandıktan sonra birkaç işlem daha yapmamız gerekiyor;

Projemizde bulunan .env.example dosyasını .env dosyasına kopyalamamız gerekir bunun için "copy .env.example .env" komutunu çalıştırıyoruz.(.env dosyası kendi oluşuyor.)
Projeyi Docker Üzerinden çalıştırmak için "docker-compose up -d" komutunu çalıştırın.
Projemizin Paket ve Bağımlılıklarını indirmek için "composer install" komutunu yazıyoruz (composer kurulu olmalıdır.)
".env" dosyasında bulunan mail kısmına kendi, çalışan mail adresimizi ve hostumuzu giriyoruz.
Yeni Kullanıcı Oluşturuyoruz, bunun için "php artisan make:filament-user" komutunu kullanıp bilgilerimizi giriyoruz
Kullanıcıya admin rolü verebilmek içinse, "php artisan shield:install" komutunu çalıştırıyoruz
"php artisan queue:listen" komutunu çalıştırarak queue ile mailerin gitmesini sağlayabilirsiniz.
"php artisan schedule:work" komutunu çalıştırarak otomatik aftif ve pasif blog sistemini açabilirsiniz.
Projeyi bu şekilde klonlayabiliriz.


## Project Setup

Let's clone our project, now the first thing we need to do is install git, you can download git from its own page “https://git-scm.com/downloads” After downloading git, we create a file for our project and open the git bash terminal on it. then “'https://github.com/Yusuf5589/blog-api.git'” command and copy our project into the file you created.

After the project is copied, we need to do a few more steps;

Run the “docker-compose up -d” command to run the project via Docker.
We need to copy the .env.example file in our project to the .env file, for this we run the “copy .env.example .env” command.(.env file is created by itself.)
We type the command “composer install” to download the packages and dependencies of our project (composer must be installed.)
We enter our own, working e-mail address and host in the mail section in the “.env” file.
Create a new user, for this we use the command “php artisan make:filament-user” and enter our information
To give the user the admin role, we run the “php artisan shield:install” command
By running the “php artisan queue:listen” command, you can make the mail go with the queue.
By running “php artisan schedule:work” command, you can turn on automatic aftive and passive blog system.
This is how we can clone the project.