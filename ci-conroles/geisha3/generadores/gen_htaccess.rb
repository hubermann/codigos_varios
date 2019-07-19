htaccess = "RewriteEngine on
RewriteCond $1 !^(index\.php|public_folder|\#*****\#)
RewriteRule ^(.*)$ /index.php/$1 [L]

#RewriteEngine on
#RewriteCond $1 !^(index\.php|public_folder|images-slider)
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteRule ^(.*)$ index.php/$1 [L,QSA]
"


file_htaccess = File.new("../.htaccess", "w+")
if file_htaccess
   file_htaccess.syswrite(htaccess)
else
   puts "Unable to open file!"
end
