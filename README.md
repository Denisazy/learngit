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

## Data
* Add category column to books table
```
php artisan make:migration add_category_to_books --table="books"
```
[Add a new column to existing table in a migration](https://stackoverflow.com/questions/16791613/add-a-new-column-to-existing-table-in-a-migration)

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

[Laravel Datatables](https://stackoverflow.com/questions/27358665/laravel-datatables)


## Controller
`app/Http/Controllers/BookController`
```php
use Illuminate\Http\Request;

class BookController extends Controller
{
        public function store(Request $request)
        {
          $input = $request->all();
          return $input;
        }
}
```
or
```php
use Request;

class BookController extends Controller
{
        public function store(Request $request)
        {
          $input = $input = Request::all();
          return $input;
        }
}
```

[Save form data in laravel](https://stackoverflow.com/questions/39436164/save-form-data-in-laravel)


[Method orderBy does not exist in Laravel Eloquent?](https://stackoverflow.com/questions/37760963/method-orderby-does-not-exist-in-laravel-eloquent/37761020)


[Search form](https://stackoverflow.com/questions/18283714/laravel-4-5-search-form-like)


[Update](https://stackoverflow.com/questions/30749608/laravel-column-not-found-1054-unknown-column-token-in-field-list-sql-upd)


## Insert new book and then get its book_id
```php
public function store(Request $request)
    {
        // $input = Request::all();
        $input = $request->only('title', 'author','category', 'description','copies'); 
        //Book::create($input);
        $newbookid = DB::table('books')->insertGetId($input);
        $isbn = create_isbn();
        $number_of_issues = $request->copies;
        for($i=1; $i-1<$number_of_issues; $i++){
            Status::create(array(
                'book_id'   => $newbookid,
                'isbn' => $isbn,
                'available' =>'1'
            ));
        }
                
        return redirect('datatables');
        
    }
```

## Laravel + Datatables
```routes\web.php```
```php
Route::get('datatables', 'BookController@getIndex')->name('datatables');
Route::get('datatablesdetail', 'BookController@anyData')->name('datatablesdetail');
```


```BookController.php```
```php
use View;
use App\Book;
use Datatables;
class BookController extends Controller
{
          public function getIndex()
              {
                  return view('panel.datatables');
              }

          public function anyData()
                {
                    $datatables = Book::select(['book_id','title', 'author','category', 'description','copies'])->get();
                    foreach($datatables as $book){
                                            $conditions = array(
                                                'book_id'    => $book->book_id,
                                                'available'  => 1
                                            );
                                            
                        $count = Status::where($conditions)->count();
                        $book->avaliability = $count;
                     }
                    return Datatables::of($datatables)->make(true);        
                }
}
```

```javascript
$(function() {
    $('#book_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatablesdetail') !!}',
        columns: [
            { data: 'book_id', name: 'book_id' },
            { data: null, 
                               name: 'title' ,
                               render: function (data, type, row, meta){
                                                    url = '{!! url('/') !!}';
                                                    return '<p>' + data.title +'</p>'+ 
                                                    '<div class="book_edit"><span><form method="GET" action="' + url + '/book/edit/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="编辑"></form></span><span><form method="GET" action="' + url + '/book/delete/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="删除"></form></span><span><form method="GET" action="' + url + '/book/show/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="查看"></form></span></div>';
                                            }
                                },
            { data: 'author', name: 'author' },
            { data: 'category', name: 'category' },
            { data: null, 
                                name: 'description',
                                render: function (data, type, row, meta){
                                                        return data.description.substr( 0, 38 ) + '...';
                                                 }
                                 },
            { data: null, 
                                name: 'avaliability' ,
                                render: function (data, type, row, meta){
                                                        return '<a class="btn btn-success">' + data.avaliability + '</a>';
                                                }
                             },
            { data: null, 
                                name: 'copies' ,
                                render: function (data, type, row, meta){
                                                        return '<a class="btn btn-primary">' + data.copies + '</a>';
                                                }
                            }
        ]
    });
});
```
[Laravel+Datatables](https://datatables.yajrabox.com/starter)

## Universally Unique Identifier
```php
function create_uuid($prefix = ""){    //可以指定前缀
    $str = md5(uniqid(mt_rand(), true));   
    $uuid  = substr($str,0,8) . '-';   
    $uuid .= substr($str,8,4) . '-';   
    $uuid .= substr($str,12,4) . '-';   
    $uuid .= substr($str,16,4) . '-';   
    $uuid .= substr($str,20,12);   
    return $prefix . $uuid;
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

## Apache in macbook

```
open /etc
```

- find apache2 folder
- `httpd.conf`配置监听端口

```
#端口监听，下面配置的意思是apache启动后会监听80端口
Listen 80
```

- `extra/httpd-vhosts.conf`配置不同端口“虚拟机”

```
<VirtualHost *:8010>
    DocumentRoot "/Users/username/site_two"
    ServerName www.mysite.com
    <Directory "/Users/username/site_two">
    Options Indexes FollowSymLinks ExecCGI
    AllowOverride all
    Order deny,allow
    allow from all
    </Directory>
</VirtualHost>
```

>网站的文件夹需放置在用户文件夹下

