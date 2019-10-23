# Webbutveckling III

### av Malin Lind, mali1710@student.miun.se

## Moment 5.1 - REST api PHP

Den här wbbtjänsten är skapad med PHP och hanterar information om de kurser jag läser på Mittuniveristet.
Den läser in data från en databas och hämtas ut i JSON-format och är impementerad med CRUD.

1. Sätt upp databasen:
   CREATE TABLE IF NOT EXISTS `kurser` (
   `id` int(11) NOT NULL,
   `code` text NOT NULL,
   `name` text NOT NULL,
   `progression` text NOT NULL,
   `syllabus` text NOT NULL,
   PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

### Länk

https://mallind.se/rest_api/rest.php/kurser

### Klona projekt:

git clone https://github.com/mali1710/moment5.1
