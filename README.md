# Webbutveckling III

### av Malin Lind, mali1710@student.miun.se

## Projekt - REST api PHP

Den här wbbtjänsten är skapad med PHP och hanterar information som läser ut information till en hemsida.
Den läser in data från en databas och hämtas ut i JSON-format och är implementerad med CRUD.

1. Sätt upp databasen:

   CREATE TABLE `education` (
   `id` int(11) NOT NULL,
   `dates` text NOT NULL,
   `school` text NOT NULL,
   `program` text NOT NULL,
   `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

   CREATE TABLE `projects` (
   `id` int(11) NOT NULL,
   `image` text NOT NULL,
   `title` text NOT NULL,
   `description` text NOT NULL,
   `url` text NOT NULL,
   `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

   CREATE TABLE `work` (
   `id` int(11) NOT NULL,
   `dates` text NOT NULL,
   `company` text NOT NULL,
   `title` text NOT NULL,
   `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY (id)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

### Länk

https://mallind.se/webapp/

### Klona projekt:

git clone https://github.com/mali1710/moment5.1.git
