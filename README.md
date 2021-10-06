## About API

This project began development on October 4-5, 2021. Ended 5 October. The project is updated when possible when there is time.
The API will help to sort data (price/date as well as pagination), add new ones, delete. When writing the project, following the rules set out in the worksheet.

## Usage

- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- Run `php artisan migrate --seed --env=testing` (for testing, second db)
- Run 'php artisan test'
- Add Accept application/json and Content-Type application/json in Headers Postman, when you check API.

## Testing/Reviewing

The functionality of the API was conducted in the application Postman. Tests were also performed to verify the data transfer.

![Reviewing1](https://i.imgur.com/G7poXe2.png)
![Reviewing2](https://i.imgur.com/aIfXV0y.png)
![Reviewing3](https://i.imgur.com/wzh9V5H.png)
![Testing](https://i.imgur.com/9VEAFvM.png)


### Thoughts

When I saw the task, I immediately wanted to make a CRUD with authorization. However, after reading it again, I realized that there was no need since the task focuses on API and data storage.
Of course, you could make an interface, and maybe then it would be possible to make an additional task with photos. There was an idea to pass in a picture (src="") and on the output just trim. Each query is labeled with its output code. All input/output queries, work fine. Pagination and sorting are implemented. Maybe tomorrow (today) the front end will be added.
