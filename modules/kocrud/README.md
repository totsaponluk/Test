The goal of KoCRUD is to provide very easy to use API for all of your ORM models.

## Features

- Reduces the work of creating one yourself.
- Provides an very simple and extendable API.
- Ability to access your models from any programming language that supports HTTP methods.
- Great documentation how to use it and lists all of your models and relationships.

## Installation

### As submodule of your project

	   git submodule add git://github.com/birkir/kocrud.git modules/kocrud
	   git submodule update --init --recursive

### Cloning the repository (for making your own changes to kocrud)

	   git clone git://github.com/birkir/kocrud.git modules/kocrud
	   cd modules/kocrud

## How to use

### Setup

Go to your application directory and edit bootstrap.php, then find modules section and add kocrud to your 
enabled modules

	   'kocrud'  => MODPATH.'kocrud',  // Kohana CRUD module

Then you are good to go, point your browser to /api and start reading the manual to communicate with the CRUD 
interface.

### Extending the API for custom models

To extend models, change what they output or what can be requested - TODO ?

## Credits

No credits yet, other than my self for coming up with this idea. Until I will program it.

