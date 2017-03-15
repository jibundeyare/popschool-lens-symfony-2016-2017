# Cours de Symfony (2016-2017)

## Description

Ce repo contient le code écrit durant le cours de symfony à Pop School Lens, session 2016-2017.

## installation

Avec un outil comme phpmyadmin ou mysql en ligne de commande créez une nouvelle base de données avec `utf8_general_ci` comme `collation`.

Dans un terminal, tapez les commandes suivantes :

	git clone https://framagit.org/popschool-lens/site-symfony-2016-2017.git
	cd site-symfony-2016-2017
	composer install

À la fin de l'installation, composer va vous poser des questions. Vous devez juste renseigner les éléments suivants :

- le nom de la base de données que vous venez de créer
- le login d'accès à la base de données
- le password d'accès à la base de données

Pour les autres éléments, vous pouvez accepter les valeurs par défaut.

Dans un terminal, tapez les commandes suivantes :

	php bin/console doctrine:migrations:migrate

## Utilisation

Dans un terminal, depuis la racine du projet, tapez les commandes suivantes :

	php bin/console server:start

Puis visitez l'url suivante dans un navigateur :

	http://127.0.0.1:8000/

## Documentation

L'installation de symfony :

- [Installing & Setting up the Symfony Framework (current)](http://symfony.com/doc/current/setup.html)
- [Download Symfony Framework and Components](http://symfony.com/download)

L'installation de doctrine-migrations-bundle : [DoctrineMigrationsBundle (The Symfony Bundles Documentation)](http://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)

La création de la base de données et la génération d'entités en ligne de commande : [Databases and the Doctrine ORM (current)](http://symfony.com/doc/current/doctrine.html)

Les annotations des relations entre entités : [5. Association Mapping — Doctrine 2 ORM 2 documentation](http://doctrine-orm.readthedocs.io/en/latest/reference/association-mapping.html)

Les types de champ de formulaire : [Form Types Reference (The Symfony Reference)](http://symfony.com/doc/current/reference/forms/types.html)

Les types de validation de champ de formulaire : [Validation Constraints Reference (The Symfony Reference)](http://symfony.com/doc/current/reference/constraints.html)
