Oasis MVC
==========

### Setup

* Download this and unzip into a new directory.
* Drop views into /views
* Add controllers as necessary

### Controllers

Controllers in this system are for handling interaction between the user and the views. Each method in a controller may or may not correspond to a view file.

If a controller contains a method with a view file, the method will be executed AND the view will be rendered.

In order to pass variables into a view, simply assign them using the ```$this``` variable. Example:

controllers/controller.home.php
```
class home_controller extends Controller {

    function index() {
        $this->user = User::find_current_user(); // I just made this up 
    }
    
}
```

views/home.index.php
```
<h1>Hello <?= $user->name ?></h1>
```

### Views

Views are simply PHP files that render HTML. See the example above.

#### Naming Convention
Views are named as follows:  {controller}.{method}.php

If you want a top-level view, replace {controller} with "static", like: static.{view_name}.php

### URL Routing

URLs are routed automatically to controllers and views. The following patterns are used:

* ```/index``` -> renders ```views/static.index.php```
* ```/users``` -> matches a {controller} pattern, so it renders ```views/users.index.php```
* ```/users/add``` -> matches a {controller}/{method} pattern, so it renders ```views/users.add.php``` and executes users_controller::add().

The router currently does not support other URL configurations, though you may certainly customize them in the Router class.




