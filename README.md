# Project Documentation

## Overview
This Laravel project is designed to display a heirarchical tree structure of items. Include search functionality to filter out items and display searched items along with their ancestors in a tree format

## Table of content

- [Installation](#Instsallation)
- [Routes](#Routes)
- [Project structure](#Project-structure)
- [Models](#models)
  - [Atest](#atest)
- [Controllers](#controllers)
  - [AtestController](#atestcontroller)
- [Views](#views)
  - [atest.index](#atestindex)
  - [atest.dropdown-item](#atestdropdown-item)
  - [atest.search-bar](#atestsearch-bar)


## Installation

1. **Clone the repository**
``` bash
    git clone https://github.com/asaMavhungu/TreeBuilder
    cd TreeBuilder/moonstone-tech-assesment
```

2. **Install dependencies**
``` bash 
    composer install
```

3. **Environment setup**
configure database as needed
``` bash
    cp .env.example .env
    php artisan key:generate
```

4. **Database setup**
update database with .env config
```bash
    php artisan migrate
    php artisan db:seed
```

## Routes

1. **/atest**
Basic route for the tree structure

2. **/atest/search**
Route for filtered search using query

## Project Structure
This is the project structure for the Laravel app
* `app/Http/Controllers`: Contains the controllers.
* `app/Models`: Contains the models.
* `resources/views`: Contains the Blade templates for views.
* `routes/web.php`: Contains the route definitions.

## Models

Definition of the database columbs. Allows for the app to more easily interact with the tables in the database in a more object-oriented approach

### Atest
The `Atest` model represents an item in the `Atest` table in the hierarchical tree

## Controllers
Handle requests. Gets requests from the views, processes them and return them to the correct view

### AtestController
Handles requests related to the `Atest` model. Includes displaying the tree and handling search requests

#### Methods
``` php
index(Request $request)
```
Handles the HTTP GET request to display the tree structure. Supports a search feature to filtre items on the tree based on the query

* Parameters:
    * `Request $request`: The HTTP request object, contains the query patameter for filtering items
* Returns: A view with the tree structure and the search query

## Views
### atest.index
This view displays the hierarchical tree and includes a search form

### atest.dropdown-item
This blade recursiveley renders each node in a given tree

### atest.search-bar
This contains the search-bar component

