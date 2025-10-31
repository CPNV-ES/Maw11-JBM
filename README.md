# MAW-1-JBM

## Description

App for creating exercises for students

## Getting Started

### Prerequisites

* PHP 8.4
* Composer 2.8
* Xdebug 3.4
* IDE tested : PhpStorm and Cursor
* OS supported : Windows 11 and Fedora 42

### Configuration

```shell
    composer install
```

### Running the application
```shell
    php -S localhost:8000 -t public/
```

## Deployment

### On dev environment

To check error with phpstan

```shell
    composer phpstan
```

To use the linter php cs fixer

```shell
    composer php-fix
```

### On integration environment

How to deploy the application outside the dev environment.

## Directory structure

* Tip: try the tree bash command

```shell
├── app                                                                                                                                                                               
│ ├── Controllers                                                                                                                                                                   
│ │ ├── ExerciseController.php                                                                                                                                                    
│ │ ├── ExercisesController.php                                                                                                                                                   
│ │ ├── HomeController.php                                                                                                                                                    
│ │ └── UserController.php                                                                                                                                                        
│ ├── Models                                                                                                                                                                        
│ │ └── Exercise.php                                                                                                                                                              
│ ├── routes.php                                                                                                                                                                    
│ └── View
│   └── exercises                                                                                                                                                                          
│   ├── show.php                                                                                                                                                              
│   ├── index.php                                                                                                                                                             
│ ├── home.php                                                                                                                                                             
│ └── user.php
├── composer.json
├── composer.lock
├── core
│ ├── Router.php
│ └── View.php
├── LICENSE
├── phpstan.neon
├── public
│ ├── assets
│ │ └── logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png
│ ├── css
│ │ ├── exercises.css
│ │ ├── home-page.css
│ │ └── index.css
│ └── index.php
└── README.md
```

## Collaborate

* Take time to read some readme and find the way you would like to help other developers collaborate with you.

* They need to know:
    * How to propose a new feature (issue, pull request)
    * [How to commit](https://www.conventionalcommits.org/en/v1.0.0/)
    * [How to use your workflow](https://nvie.com/posts/a-successful-git-branching-model/)

## License

* [MIT](/LICENSE)

## Contact

* [bryan.heutschi@eduvaud.ch](mailto:bryan.heutschi@eduvaud.ch)
* [joris.bailly@eduvaud.ch](mailto:joris.bailly@eduvaud.ch)
* [maximilian.lopizzo@eduvaud.ch](mailto:maximilian.lopizzo@eduvaud.ch)
