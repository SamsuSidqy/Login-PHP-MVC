
## Requirements


`.env`

```env
ADDRESS=http://localhost/Login/
SERVER_DB=localhost
USERNAME_DB=root
PASSWORD_DB=
NAME_DB=login_mvc





```
`.sql`

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

 
