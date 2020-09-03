# Formation Magento

L'objectif de cette formaton est d'apprendre les bases de M2 via la création d'un Module
Le module permettra de gérer une nouvelle entité Point de vente.
Les données de cette entité seront affichées sur une page du magasin front et seront manipulables
via API et via le Back office. 

Ce module est un exemple de réalisation de cette prouesse, il a été développé sous magento 2.4

***

###Sujets étudiés : 
* Injection de dependance
* Architecture d'un module Magento 
* Controller
* Les entité (Model / Resource Model / Repository)
* Layout 
* User component
* Api 

***


####Etape 0 : Création d'un module Magento 
* Présentation de l'architecture Magento 2
* Présentation des commandes M2 importante : 

1. bin/magento setup:upgrade
2. bin/magento setup:di:compile
3. bin/magento deploy:mode:set developper 

[List of usefull Magento 2 SSH commande](https://meetanshi.com/blog/magento-2-ssh-commands/)

***

####Etape 1 : Création d'un controller front 

1. créer routes.xml
2. Création de fichier Controller
3. Création du Layout
4. Création du Block
5. Création du phtml

* [Tuto Mage plaza](https://www.mageplaza.com/magento-2-module-development/how-to-create-controllers-magento-2.html) <br>
* [Documentation Magento](https://devdocs.magento.com/guides/v2.4/extension-dev-guide/routing.html)

***


####Etape 2 : Création de l\'entité
0. création du script d'initialisation
1. Création du Model
3. Création du ResourceModel
4. Création de la Collection

[Tuto Mage Plaza](https://www.mageplaza.com/magento-2-module-development/how-to-create-crud-model-magento-2.html)

##### Fichier concernés
* [Model](Model)
* [db_schema](etc/db_schema.xml)

***


####Etape 3 : Ajout du repository
Magento utilise les repository pour la majorité de ces entités.
Le repository a pour objectifs de gérer toutes les opérations de stockage de l'entité 
elle est indispensable si notre entité doit être utilisé par une application tierce.
En l'ocurrence ce sera le vu qu'on pourra gérer cette entité via API.


[Magento 2 Repositories, Interfaces and the Web API](http://vinaikopp.com/2017/02/18/magento2_repositories_interfaces_and_webapi/)
<br>

##### Fichier concernés
* [PointOfSalesRepository](Model/PointOfSalesRepository.php)
* [PointOfSalesRepositoryInterface](Api/PointOfSalesRepositoryInterface.php)
* [PointOfSalesInterface](Api/Data/PointOfSalesInterface.php)
* [di.xml](etc/di.xml)

***


####Etape 4 : API
1. Mise en place des API pour supprimer / créer une entité
2. Test des API avec le Swagger

##### Fichier concernés
* [webapi](etc/webapi.xml)
* [PointOfSalesRepositoryInterface](Api/PointOfSalesRepositoryInterface.php)
* [PointOfSalesInterface](Api/Data/PointOfSalesInterface.php)

***

####Etape 5 : Affichage de notre entités sur la page front

##### Fichier concernés
* [Block/PointOfSales](Block/PointOfSales.php)
* [front/view](view/frontend)
* [PointOfSalesInterface](Api/Data/PointOfSalesInterface.php)

***

####Etape 6 : Ajout d'un menu dans le BO pour gérer notre entité 

* [Tuto à suivre](https://inchoo.net/magento-2/admin-menu-item-magento-2/)

#####Fichier concernés 
* [etc/adminhtml](etc/adminhtml)
* [PointOfSalesInterface](Api/Data/PointOfSalesInterface.php)

***

####Etape 7 : Affichage d'une GRID Magento pour afficher les donnée de l'entité
* [Tuto à suivre](https://magently.com/blog/magento-ui-components-custom-grid/)

#####Création du controller : Fichier concernés 

* [Controller](Controller/Adminhtml/PointOfSales/Manage.php)
* [routes](etc/adminhtml/routes.xml)
* [layout](view/adminhtml/layout/pointofsales_pointofsales_manage.xml)
* [di.xml](etc/di.xml)
* [explication type & virtual type](https://magently.com/blog/magento-2-design-patterns-preferences-virtual-types/)

#####Création de la grid : Fichier concernés 

* [ui-component.xml](view/adminhtml/ui_component/pointofsales_listing.xml)
* [Tuto à suivre](https://magently.com/blog/custom-products-grid-base-xml/)


####Etape 8 : Ajout de la fonctionnalité d'ajout / d'edit et de suppression


