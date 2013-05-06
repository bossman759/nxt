NXT
===


NXT Search is a search engine which is based off of your links. You can easily sumit your own content to the database or even your company's content. NXT Search is free and open to everyone. NXT is also open sourced, meaning developers can download the NXT source code from Github.


This repo contains the source code for NXT & examples for using .sql files from NXT.

Installation
===

<a target='_blank' href='http://www.linux.com/learn/tutorials/288158-easy-lamp-server-installation'>Source</a>

<b>Simple Install</b>

<code>sudo tasksel</code>

Advanced Installation
===

<b>Install Apache</b>
    
<code>sudo apt-get install apache2</code>

<b>Install PHP</b>

<code>sudo apt-get install php5 libapache2-mod-php5</code>

When the installation is complete, restart Apache with the command:

sudo /etc/init.d/apache2 restart

Now, let's give PHP a little test to make sure it has installed. In your terminal window, create a new file called test.php.

<b>Save that file and place it in /var/www/. Now, open up your browser to the address http://ADDRESS_OF_SERVER/test.php. Where ADDRESS_OF_SERVER is the actual address of your server. You should see "Test PHP Page" in the browser. You are now ready to move on to MySQL.</b>

<b>Install MYSQL</b>

<code>sudo apt-get install mysql-server</code>

Again, depending upon your OS installation, there might be some dependencies to be installed. After the installation is complete you need to log into the MySQL prompt and give the administrative user a password. Do this by following these steps:

Log into MySQL with the command mysql -u root -p.
As no password has been configured, you will only need to hit enter when prompted for the password.
Enter the command SET PASSWORD FOR 'root'@'localhost' = PASSWORD ('YOURPASSWORD'); Where YOURPASSWORD is the password you want to use for the administrative user.
Now quit the MySQL prompt by issuing the command quit and hitting enter.
Start the MySQL server with the command sudo /etc/init.d/mysql start.

<b>Now fork the code from NXT</b>

<code>$ cd your_repo_root/nxt</code>

<code>$ git fetch origin</code>

<code>$ git checkout gh-pages</code>

and move it /var/www.

Don't Forget
===

<b>Make sure you create a connect.php file</b>

<code><?php</code>

<code>$db_host = "";</code>

<code>$db_username = ""; </code>

<code>$db_pass = "";</code>

<code>$db_name = "";</code>



<code>mysql_connect("$db_host","$db_username","$db_pass") or die(mysql_error());</code>
<code>mysql_select_db("$db_name");</code>
a
<code>?>

<b>Also make sure you download a copy of our NXT Data Dumps and import it into your mysql database.</b>
</code>
