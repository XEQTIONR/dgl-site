Project Name : dgl-site
http://www.dglcore.com
======================


###Installing Backpack for admin backend

The following commands were run in order

`composer require backpack/base`

`composer require backpack/crud`

`php artisan backpack:base:install`

`php artisan backpack:crud:install`


##### WINDOWS GOTCHAS

In the following file  

`\vendor\backpack\crud\src\app\Console\Commands\Install.php`

1. The upload 'Creating Upload Directory' instruction has to be modified
    
    - Remove the -p flag. Windows does not understand this and creates a directory with the name.
    
    - Change __'public/uploads'__ to __'public\uploads'. Windows uses the other slash for paths.

2. 'Adding sidebar menu item for File Manager' - the syntax is incorrect. Single and double quotes get mistaken.
    
    - Uncomment the actual action 
    
    - After running the above four composer/artisan commands run the following (corrected) command
    
        `php artisan backpack:base:add-sidebar-content "<li><a href='{{ backpack_url(\"elfinder\")}}'><i class='fa fa-files-o'></i> <span>File manager</span></a></li>"`


### Ongoing dev notes.

__Match CRUD controller contestants select2 multiple pulls all contestants of all matches. FIX THIS.__

_Did not create a Eloquent model for Checkin. Change this in the future if required._

_Added ability to select match winner from Match Contestants/Scores CRUD -_ __This is currently the sole reason why 'id' field is added as primary key in the 'match_contestants' table.__

###### XEQTIONR
