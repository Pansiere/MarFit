# MarFit Store

## Versão

- **Versão:** 1.0.0
- **Data:** 26/08/2024

## Installation

Trabalhando com imagens

```txt
Para as  imagens conseguirem ser upadas, dentro do
container php-fpm execute o comando:
chown www-data:www-data /application/public/img
```

Trabalhando com PDF (DOMPDF)

```txt
Requirements
  PHP version 7.1 or higher
  DOM extension
  MBString extension
  php-font-lib
  php-svg-lib

No container do php-fpm
  add-apt-repository ppa:ondrej/php
  apt-get update &&
  apt-get install php8.3 \
  php-xml \
  php8.3-xml \
  php8.3-mbstring \
  php8.3-gd \
  php8.3-zip \
  php8.3-dev \
  libmagickwand-dev
```

## Usage

I'll add an image here soon

## Credits

Developed by João Pedro V. Pansiere for Victoria Lavagnoli
