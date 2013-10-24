Claxsa-Admin
============

I made​based http://vinceg.github.com/Bootstrap-Admin-Theme

For YII Framework v1.1.14


![GitHub Logo](/images/admin.png)


just create .htaccess :

#IndexIgnore */*
RewriteEngine on
# if a directory or a file exists, use it directly
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
# otherwise forward it to index.php
RewriteRule . index.php








