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
`php artisan make:controller NameController --resource`

* Database migrations
`php artisan make:migration create_books_table --create=books`


## DatabaseSeeder  &  ModelFactory
`database/ModelFactory.php`
```php
$factory->define(App\Blog::class, function ($faker) {
  return [
    'title' => $faker->sentence(mt_rand(3, 10)),
    'content' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
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

    factory(App\Blog::class, 5)->create();
  }
}
```

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


## NotoSans CJK
NotoSans CJK 
Source Han Sans

## Cyberpunk

## hosts file position

## Modernizr
[Reference](modernizr.com)