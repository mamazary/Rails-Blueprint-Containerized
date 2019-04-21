<p align="center">
  <h2 align="center">Containerized Rails Blueprint</h2>
  <p align="center">A boilerplate to create Rails 5 apps in seconds using container.<p>
</p>


## Overview
This blueprint is originally from [ManuelFrigerio/rails-blueprint](https://github.com/ManuelFrigerio/rails-blueprint)
I am just make this app to containerized version, so it's easy to use and easy to deploy.
You can check the detail about this app in original Github repository

## Requirements
*  Docker
*  Docker-compose

## Contains
*  Rails-blueprint
*  Docker with
    *  ruby + nodejs
    *  postgres

## Installation
1. Clone this repo `git@gitlab.com:mamazary/rails-blueprint.git`
2. Go to the folder `cd rails-blueprint` and you are freely to change the environment variable in `docker/*.env`
3. Run `docker-compose up` to create a stack of this dockerized app
3. Execute the migrate process on running container by typing this on another terminal window `docker exec $container-name-or-hash rails db:migrate` 
notes: `$container-name-or-hash` *is depend on your machine, on me is rails-blueprint_rails-blueprint_1 , but please check with* `docker container ls` *to make sure*

## Environment variables
This app use some environment variable, please check it on `docker/*env`


## Contributions

Feel free to implement anything, submit pull requests, create issues, discuss ideas or spread the word.
