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
<ul>
<li>git clone https://github.com/BlackCatsGB/ProjectManager <i>"application directory"</i></li>
<li>cd <i>"application directory"</i></li>
<li>composer install</li>
<li>yii migrate/up</li>
<li>php init</li>
<li>manually confugure database connection in common/config/main-local.php</li>
<li>cp common/config/main-local.php <i>archive</i>/main-local.php</li>
<li>yii migrate --migrationPath=@yii/rbac/migrations/</li>
</ul>
<h3>Demands module (ReactJS):</h3>
<ul>
<li>cd "application directory"</li>
<li>npm -i</li>
<li>npm run build</li>
</ul>
<h2>Update application on Linux:</h2>
<ul>
<li>rm -r "application directory"</li>
<li>git clone https://github.com/BlackCatsGB/ProjectManager <i>"application directory"</i></li>
<li>cd <i>"application directory"</i></li>
<li>composer install</li>
<li>yii migrate/add</li>
<li>php init</li>
<li>cp <i>archive</i>/main-local.php common/config/main-local.php</li>
<li>npm -i</li>
<li>npm run build</li>
</ul>


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
