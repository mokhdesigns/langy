Mokhdeigns\Langy 


This is a Laravel package for translatable models. it was made for my personal use and it's not complete yet SO DONT USE IT

### Docs

* [Installation](#installation-in-4-steps)
* [Configuration](#configuration)


## Installation 

### Step 1: Install package

Add the package in your composer.json by executing the command.

```bash
composer require mokhdesigns/langy
```


###  Migrations

In this example, we want to translate the model `Category`. We will need an extra table `category_translations`:

```php
Schema::create('categories', function(Blueprint $table)
{
    $table->increments('id');
    $table->timestamps();
});

Schema::create('category_translations', function(Blueprint $table)
{
    $table->increments('id');
    $table->integer('category_id')->unsigned();
    $table->string('name');
    $table->string('locale')->index();
    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
});
```

###  Models

```php
 
class Category extends Eloquent {
    
    use \Mokhdesigns\Langy\Langy;
    
    public $translatedAttributes = ['name'];
    protected $gaurded = [];
    

}

class CategoryTranslation extends Eloquent {

    public $timestamps = false;
    protected $gaurded = [];

}
```

###  Configuration

```bash
php artisan vendor:publish --tag=langy 
```



###  Add Language dynamically

 **when you run**

```bash
php artisan migrate
```

This will create **langs table** 

```bash

        Schema::create('langs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->uniqid();
            $table->string('code')->uniqid();
            $table->string('flag')->uniqid();
            $table->string('defualt')->default(0);
            $table->timestamps();
        });

```
**name**     => The Name Of The Langauge
**code**     => The Country Code
**flag**     => The Avatar Of The Langauge
**defualt**  => Set The Langauge As Default (note To Make Jsut One Langauge As The Defualt)


 Thank you!
