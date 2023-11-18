# Try Out [Supabase](https://supabase.com/) DataBase using PHP & PDO

## Setup Connection 
   * Create a config file for the connection `filename.php`
     ```
       $host= 'db.aaaaaaaaa.supabase.co';
       $dbname = 'postgres';
       $username = 'postgres';
       $password = 'password';
     ``` 
     - Then create a pgql string for the connection:
        ```
           $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";
        ``` 
     - Try and catch your connection:
        ```
           try {
              $pdo = new PDO($dsn);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
                 echo 'Connection Error: ' . $e->getMessage();
                exit;
            }
        ```
## <span color="red"> One of the common errors you would be facing is popping up ` Client PDO not found ` We solved this issue by installing a database driver and within the PDO.</span>

#### Configure your php.ini
   *  First of all navigate to your php.ini file in `/etc/php/8.version/cli/php.ini` || `/opt/homebrew/etc/php/8.2/php.ini` (if PHP was installed using Homebrew) on MacOS

   * Uncomment out `extension=pdo_pgsql` and `extension=pgsql` inside `/etc/php8.version/cli/php.ini` by removing ; in front of the them:
      ```
      MYSQL
          extension=pdo_mysql
          extension=mysqli

          POSTGRESQL
          extension=pdo_pgsql
          extension=pgsql
       ```
  * If you are using fedora distro as me 
      ```
          sudo dnf install php-pgsql
      ```
  * Other common Linux distro
      ```
          sudo apt-get install php-pgsql
      ```
 


### install mysql 

  - for windows users
     - [Windows Mysql](https://dev.mysql.com/downloads/installer/)
        * installation & setup  guide
     - [Linux Mysql](https://dev.mysql.com/doc/refman/8.0/en/linux-installation.html)
        * installation & setup  guide
     - [Mac Mysql](https://dev.mysql.com/doc/mysql-macos-excerpt/8.0/en/macos-installation.html)
        * installation & setup  guide
  ## tables:
     - 
     ```
        atabase: cakecove
        username: fushia
        password: Password123#@!
     ```

Created By [Yaser](https://github.com/yasermoamd/) & [Vlad](https://github.com/VladZtn)
