<img src="assets/logo_bocal_academy.svg" alt="Le Bocal Academy" width="100">

# Application Questionnaire TEST

|<img src="assets/laravel.svg" alt="Laravel framework" width="200"> | <img src="assets/livewire.svg" alt="Laravel Livewire" width="200"> | <img src="assets/tailwindcss.svg" alt="Tailwind Css" width="200"> |
| ------------- | :-------------:| -------------:|
| <img src="assets/jetstream.svg" alt="Laravel Jetstream" width="200"> | <img src="assets/php8_1.svg" alt="PHP 8.1" width="200"> | <img src="assets/mysql.svg" alt="MySQL" width="200">|
-------

## Installation

* Nécessite PHP>=8.0.
* Cloner la repository git : `git clone https://github.com/Treedent/Questionnaire.git`.
* Créer une base de donnée MySQL.
* Configurer votre fichier `.env` avec les accès à la base de données.
* Mettre à jour les dépendances NPM : `npm install`
* Générer les assets : `npm run prod`
* Lancer les migrations : `php artisan migrate`
* Lancer les seeds pour l'équipe, le user, le questionnaire et les questions :
    * `php artisan db:seed --class=TeamSeeder`
    * `php artisan db:seed --class=UserSeeder`
    * `php artisan db:seed --class=QuestionnnaireSeeder`
    * `php artisan db:seed --class=QuestionsSeeder`
* Créer le lien symbolique du storage :
    * php artisan storage:link
* Lancer le serveur Web :
    *`php artisan serve`
* Se rendre à l'adresse `http://127.0.0.1:8000` dans votre navigateur.
* Enjoy !


## License

Le framework Laravel est en open-source sous licence [MIT license](https://opensource.org/licenses/MIT).
