## Web Routes

```php
//METHOD 1:
Route::get('blog', 'BlogController@store')->name('blog');

//METHOD 2:
Route::get('blog', array(
	'as' 	=> 'blog',
	'uses' 	=> 'BlogController@store'
));

//METHOD 3:
Route::get('blog', [ 'as' => 'blog', 'uses' => 'BlogController@store']);

```

## Artisan Command

* Create a new resourceful controller
```
php artisan make:controller NameController --resource
```

* Database migrations create
```
php artisan make:migration create_books_table --create=books
```

* Database migrations
```
php artisan migration
```

* creates a model named Category in `/app/Category.php`
```
php artisan make:model Category
```

[php artisan tinker](http://laravelacademy.org/post/4935.html)

## DatabaseSeeder  &  ModelFactory
`database/ModelFactory.php`
```php
$factory->define(App\Book::class, function ($faker) {
  return [
            'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
            'title' => $faker->sentence(mt_rand(3, 10)),
            'author' => $faker->name,
            'description' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
  ];
});
```
`database/DatabaseSeeder.php`
```php
class BlogTableSeeder extends Seeder
{
  public function run()
  {
    App\Blog::truncate();

    factory(App\Book::class, 5)->create();
  }
}
```
[fake data reference](https://github.com/fzaninotto/Faker)

[laravelcollective](https://laravelcollective.com/)


## Closure(javascript)
```javascript
var displayAll = document.querySelectorAll('.displayall');
for (var i = 0; i < displayAll.length; i++) {
  var numall = displayAll[i];
  displayAll[i].addEventListener('click', (function(Copy) {
                return function() {
                    Copy.parentNode.previousElementSibling.style.overflow="visible";
                    Copy.parentNode.previousElementSibling.style.height="auto";
                    Copy.style.display = "none";
                };
            })(numall));
};


var hideAll = document.querySelectorAll('.hideall');
for (var i = 0; i < hideAll.length; i++) {
  var numtall = hideAll[i];
  
  hideAll[i].addEventListener('click', (function(Copyt) {
                return function() {
                    Copyt.parentNode.style.overflow="hidden";
                    Copyt.parentNode.style.height="32px";
                    Copyt.parentNode.nextElementSibling.lastElementChild.style.display = "block";
                    
                };
            })(numtall));
};
```

## Detecting a mobile browser
```javascript
// Detecting a mobile browser
function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
    // true
document.querySelector('.img-responsive-7').style.height="300px";
document.querySelector('.img-responsive-5').style.height="165px";
	paragraphs = document.querySelectorAll('.video_opposite p'); 
	for (var i = 0; i < paragraphs.length; i++) {
		paragraphs[i].style.marginLeft="0px";
	}
document.querySelector('video').style.marginTop="0";
  }
 else {
   // false
  }
}
```
[Reference](https://stackoverflow.com/questions/11381673/detecting-a-mobile-browser)

## basic usage of git command
* status
        
        git status

* Working Directory -> Repository

        git add/rm file_name
![](https://cdn.liaoxuefeng.com/cdn/files/attachments/001384907702917346729e9afbf4127b6dfbae9207af016000/0)

        git commit -m "description"

* to remote Repository

        git push

[Reference](https://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000/0013745374151782eb658c5a5ca454eaa451661275886c6000)

## basic usage of vim

        Vim file_name

* Insert mode:`i`,back to command mode `ESC`
* Save `:w`
* Quit `:q!`

[Reference](https://blog.csdn.net/yu870646595/article/details/52045150)


## NotoSans CJK
NotoSans CJK => Source Han Sans

## Cyberpunk

>Cyberpunk is a subgenre of science fiction in a futuristic setting that tends to focus on a "combination of lowlife and high tech" featuring advanced technological and scientific achievements, such as artificial intelligence and cybernetics, juxtaposed with a degree of breakdown 
>or radical change in the social order.

## hosts file position

## Modernizr
[Reference](modernizr.com)