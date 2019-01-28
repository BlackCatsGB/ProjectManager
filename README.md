<h1>Project manager ++</h1>
<h3>About</h3>
Project manager ++ contains several functions:
<li>project managment</li>
<li>tasks managment</li>
<li>demands managment (on ReactJS)</li>
<li>risks managment</li>
</ul>

<h2>Installation on Linux:</h2>
<h3>Yii2</h3>
```
git clone https://github.com/BlackCatsGB/ProjectManager "application directory"
cd "application directory"
composer install
php init
yii migrate/up
manually confugure database connection in common/config/main-local.php
manually configure common params of users avatars path and url: <i>common/config/params-local.php
```
<h3>Demands module (ReactJS):</h3>
```
cd "application directory"
npm -i
npm run build
```


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
