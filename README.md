# Magikart
Converts paper drawn arts to digital arts

## Usage
Below are the prerequisites for running the Magikart project;

### Setup
Clone this repository

Navigate to the root directory and run the composer install command to install dependencies.

```php 
    composer install
```

### Database connection
To use the project, simply create a Database, upload the .sql file therein the root directory of this project named artworks.sql. Once that is done, update your connection in the .env file, as shown in the .env.example file.

### Auth0 configuration
Make sure to setup the Auth0 configurations using the .env.example sample provided in the project such as the CLIENT_ID, DOMAIN, CLIENT_SECRET, CALLBACK_URL etc.

Make sure also, that the settings provided are updated in the Auth0 dashboard. You can check the docs on how to do that;

https://auth0.com/docs/quickstart/webapp/php

#### Pro tip: Most preferrably, setup a virtual host for the project

And viola! The project is setup successfully!

Your contributions are welcome! Send a PR ASAP!
