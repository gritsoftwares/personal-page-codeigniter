Personal Page and Portfolio Website
=============
Personal Page Frontend and Backend built with Codeigniter 2.2 and Bootstrap 3

####Who Can Use This Application
This application can be used by programmers, designers, web specialists and other professionals to present their skills, services and portfolio on the web. Convinient admin panel gives the ability to share any bit of personal information.

####Screenshots
![Resume page](/_screenshots/image2.png)
![Backend portfolios](/_screenshots/image9.png)
Other screenshot are available at [_screenshots](/_screenshots) folder

####Requirements
* PHP 5.5.0 (password_hash(), arbitrary expressions in empty())
* MySQL 5.6.4 [fulltext-restrictions](http://dev.mysql.com/doc/refman/5.6/en/fulltext-restrictions.html). You may however change mysql tables to MyISAM and use MySQL 5.0
* Apache 2.2 with mod_rewrite module enabled

####Installation
* put the contents of [public](/public) folder into your webserver public folder. Anything else keep outside of your public folder
* use Composer to update [codeigniter-forensics](https://github.com/lonnieezell/codeigniter-forensics). Of course, application will work without if, but I find this lib more convinient than built-in profiler. However, some of Ajax in admin panel won't work if it's turned on. Turn it on/off in [MY_Controller](/application/core/MY_Controller.php)
* install db in [_database](/_database) folder. The only thing you might need to update here to your taste is websites table (list of websites), and skill_levels table (range and rating scale of levels)
* in [index.php](/public/index.php) just change line 24 if you are using application in your development environment
* change configuration in application/config ([config](/application/config/development/config.php), [database](/application/config/development/database.php), [twitter](/application/config/twitter.php) files)
* connect to /panel with
```text
admin@admin.com
password
```
For sure you can change email/pass in admin panel
* configure js ([disqus_shortname](/application/views/front/blog_post.php), [ckeditor config](/public/admin/js/ckeditor/config.js), [kcfinder config](/public/admin/js/kcfinder/conf/config.php) and [kcfinder access](/public/admin/js/kcfinder/browse.php))
* if you are using custom SMTP settings on your host, be sure to provide them to [email method](/application/controllers/welcome.php)

####TODO list
* move jquery, bootstrap, twitter oauth and other packages to third_party folder
* install [HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc) and move blog and portfolio to separate modules
* develop better security mechanism for kcfinder file manager using sessions or something

####License information
You may use my application for whatever purpose you wish. However, if you going to use it in production be sure to buy bootstrap templates I used for building my website:
* [frontend template](https://wrapbootstrap.com/theme/codeon-agency-personal-parallax-WB01589G9)
* [backend template](https://wrapbootstrap.com/theme/detail-admin-responsive-theme-WB07061TJ)






