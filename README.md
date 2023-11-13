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
 


## Connection Using Mysqli for Mysql Database
```
CREATE TABLE cake (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255),  price decimal(4, 2) NOT NULL, description TEXT, image TEXT, created datetime NOT NULL DEFAULT current_timestamp(), updated datetime NOT NULL DEFAULT current_timestamp());

INSERT INTO cake (name, price, description, image) VALUES("Snowballs (pack of 4)" ,  6.95 , "Delicious buns, coated in icing and coconut and filled with raspberry jam", "https://frenchvillage.com/cdn/shop/files/snowballimage_720x.jpg");



ALTER TABLE cake 
RENAME COLUMN id TO product_id;

ALTER TABLE cake 
RENAME COLUMN name TO product_name;

ALTER TABLE cake 
RENAME COLUMN price TO product_price;

ALTER TABLE cake 
RENAME COLUMN description TO product_description;
 

```id,name,email) ://github.com/yasermoamd/) & [Vlad](https://github.com/VladZtn)
