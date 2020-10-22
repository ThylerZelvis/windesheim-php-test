# Plain PHP Test

Dit is een klein test project ter voorbereiding van de webshop

## Hoe krijg ik het werkend?

Er zijn een aantal dingen die je moet doen.

1. Maak een nieuwe database aan.
2. Zet je database credentials in:
```
environment/connection.php
```

3. Ga naar je database en klik op SQL.
4. Kopieer en plak onderstaande code.

```bash
CREATE TABLE `product` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`description` VARCHAR(1000) NOT NULL,
	`price` INT NOT NULL,
	`created_at` DATETIME NOT NULL DEFAULT NOW(),
	`updated_at` DATETIME DEFAULT NOW(),
	PRIMARY KEY (`id`)
);
```
5. Run je website en kijk of het werkt!
# windesheim-php-test
