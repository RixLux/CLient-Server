## Documentation

<a href="https://rixlux.github.io/CLient-Server/">
    <img
      src="https://img.shields.io/badge/Docs-4051B5?style=for-the-badge&logo=MaterialForMkDocs&logoColor=white"
      alt="Docs"
    />
</a>

# Getting Started

## Prerequisites

- Php
- Composer
- Laravel Framework
- Postman

> if you don't have these installed get them first

In my case since i use Homebrew, the tool is installed via terminal using these command :

### PHP
```
brew install php
```

### Composer
```
brew install composer
```

### Laravel Framework

**For Global Installation**
```
composer global require laravel/installer
```
> then i expose them on my `~/.config/fish/config.fish ` with these command :  
```
fish_add_path $HOME/.config/composer/vendor/bin
```

**For Local Project**
```
composer create-project laravel/laravel Client-Server
```
> Client-Server could be anything you wish

**For Latest Laravel Framework**
```
php artisan install:api
```
> or it won't work like what i did smh.

### Postman
`I got them via flatpak using the GUI interface(Bazaar)`  
**Or** you can install them via terminal too  
```
flatpak install flathub com.getpostman.Postman
```
