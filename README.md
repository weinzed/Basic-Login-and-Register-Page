
# Basic-Login-and-Register-Page

Basic Login and Register Page using PHP and SQL.



## Which resources I used for this Repo

I used [bootsnipp](https://bootsnipp.com/snippets/dldxB) for frontend of pages.




## How to Use?


Firstly you need to create a database and import this code inside database
```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
)
```
and change conn.php's variables to your credentials.

