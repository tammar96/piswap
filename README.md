# PIS & WAP project
 - [AIS navrh](AIS_materials/doc.pdf "ais_navrh")
 - [Zadanie](https://www.fit.vutbr.cz/study/courses/PIS/private/cviceni/projekt.html.cs "zadanie") - privatne stranky PIS


Terminy:


| Datum            | Popis |
|:-----------------|-------|
| do 2.3.2020      | Vytvoření týmu v IS FIT, přihlášení členů, přihlášení na termíny (minimálně Návrh IS). |
| do 10.3.2020     | Revize návrhu z AIS. Odevzdání návrhu do IS FIT a přihlášení na termín projektu |
| do 20.4.2020     | Implementace a odevzdání |
| do konce semstru | Obhajoba projektu | 

### Init

```
mysql -u "root" -p
CREATE DATABASE piswap;
CREATE OR REPLACE user 'yoda'@'localhost' identified by '12345';
GRANT ALL PRIVILEGES ON * . * TO 'yoda'@'localhost';
FLUSH PRIVILEGES;
exit
```

### Makefile

Validates a composer.json and composer.lock and diagnoses the system to identify common errors.
```
make validate
```

Identify errors/warnings and many more, whether the database has been initialized, .env is a valid config file...
```
make check
```

Ultra-mega-database-reset ;)
```
make reset
```

Drop all tables including foreign/primary keys and re-upload data into tables
```
make reset-migrations
```

Reinitialize the database. DB_{DATABASE, USERNAME, PASSWORD} have to be valid in .env file.
```
make reset-database
```

Remove unnecessary files, clear cache, reload config, authentication, etc...
```
make clean
```
