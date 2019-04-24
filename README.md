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
*  Minikube

## Contains
*  Rails-blueprint
*  Docker with
    *  ruby + nodejs
    *  postgres
*  Kubernetes Support with
    *  Deployments
    *  Configmaps
    *  Jobs
    *  Services
    *  Ingress
    *  Volumes

# Prerequisite
* nginx ingress enabled
    1. enable nginx ingress addon on minikube
        `minikube addons enable ingress`
    2. check if it's running
        `kubectl -n kube-system get po -w`

## Installation
### Docker
  1. Clone this repo `git@gitlab.com:mamazary/rails-blueprint.git`
  2. Go to the folder `cd rails-blueprint` and you are freely to change the environment variable in `docker/*.env`
  3. Run `docker-compose up` to create a stack of this dockerized app
  4. Execute the migrate process on running container by typing this on another terminal window `docker exec $container-name-or-hash rails db:migrate`
  notes: `$container-name-or-hash` *is depend on your machine, on me is rails-blueprint_rails-blueprint_1 , but please check with* `docker container ls` *to make sure*

### Kubernetes / Minikube
  1. Clone this repo `git@gitlab.com:mamazary/rails-blueprint.git`
  2. Create configmaps from file for rails and postgres
```
kubectl create -f kube/configmaps/rails-configmap.yml
kubectl create -f kube/configmaps/postgres-configmap.yml
```
  3. Create volumes from file for postgres presisten volume
```
kubectl create -f kube/volumes/postgres_volume.yml
```
  4. Create services from file for rails and postgres
```
kubectl create -f kube/services/rails_service.yml
kubectl create -f kube/services/postgres_service.yml
```
  5. Create jobs from file for rails migration
```
kubectl create -f kube/jobs/setup.yml
```
  6. Create deployments from file for rails and postgres
```
kubectl create -f kube/deployments/rails_deploy.yml
kubectl create -f kube/deployments/postgres_deploy.yml
```
  7. Create ingress from file
```
kubectl create -f kube/ingress/ingress.yml
```
*Note : for ingress, you can change host in* `kube/ingress/ingress.yml` *and please add the host in your local hosts file* `/etc/hosts/` *with this:*
```
127.0.0.1 rails-blueprint.local
or
127.0.0.1 your-of-host-choice
```

## Docker Deployment
For deploy this app, you need to build a new image ( with copying all artifact files into docker image  ) by using build command
`docker build -t your-image-name:version -f ./docker/dockerfile`
or using stack deploy on swarm
`docker stack deploy -c docker-compose-build.yml`

## Docker Environment variables
This app use some environment variable, please check it on `docker/*env`

## Notes
This repository is far from perfect, so feel free to add or change

## Contributions
Feel free to implement anything, submit pull requests, create issues, discuss ideas or spread the word.
