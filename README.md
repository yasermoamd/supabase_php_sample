# Try Out Supbase DataBase using PHP & PDO

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
     - Try and catch your connnection:
        ```
           try {
              $pdo = new PDO($dsn);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
                 echo 'Connection Error: ' . $e->getMessage();
                exit;
            }
        ```
## <span color="red"> One of the common error you would be facing is poping up ` Client PDO not found ` We solved this issue by installing database driver and within the PDO.</span>

#### Configure your php.ini
   *  First of all navigate to your php.ini file in `/etc/php/8.version/cli/php.ini`

   * Uncomment out `extension=pdo_pgsql` and `extension=pgsql` inside `/etc/php8.version/cli/php.ini` by removing ; in front of the them:
      ```
          extension=pdo_pgsql
          extension=pgsql
       ```
  * If you are using fedora as me 
      ```
          sudo dnf install php-pgsql php-pdo_pgsql php-pdo
      ```
  * Other common linux distor
      ```
          sudo apt-get install php-pgsql php-pdo_pgsql php-pdo
      ```
 







---
###  Created by [Yaser](https://github.com/yasermoamd/) & [Vlad](https://github.com/VladZtn)