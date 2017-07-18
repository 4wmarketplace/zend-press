
# ZendPress
This is a simple library to use official WordPress API (http://wp-api.org/) inside ZendFramework 2 (http://framework.zend.com/) projects.

If you need to manage contents inside a Zend framework project and you want to use the Wordpress back-end engine, you could evaluate the use of official WordPress APIs.

With APIs you can manage the entire flow of content inside the MVC structure of ZF2.

## Install

With the current version you can retrieve a specific entity or a collection of entities (RESTful GET operations).
Creation, update and delete operations are not implemented yet (RESTful POST, PUT, DELETE operations).

The package is under development and is not ready for production yet.
If you want to test it (and contribute ^^) you can add to composer.json of your project:

Require section;
```php
"require": {
        "4wmarketplace/zend-press": "dev-master",
    }
```

Add to config/autoload/global.php the WordPress API URI :
```php
return array(
    'zendpress' => array(
        'api' => array(
            'uri' => 'http://example.com/wp-json'
        )
    )
);
```

Add module to config/application.config.php :
```php
'modules' => array(
        'ZendPress',
    ),
```
### Examples 

Example, how to retrieve a single post (ID 100) inside Controller

```php
$sl = $this->getServiceLocator();
$entityManager = $sl->get('ZendPress\Api\EntityManager');
$entityManager->setEntity($sl->get('ZendPress\Entity\Post'));
/** @var \ZendPress\Entity\Post $post */
$post = $entityManager->get(100);
var_dump($post);
```

Example, how to retrieve a collection of posts

```php
$sl = $this->getServiceLocator();
$collectionManager = $sl->get('ZendPress\Api\CollectionManager');
$collectionManager->setEntity($sl->get('ZendPress\Entity\Post'));
/** @var \ZendPress\Entity\Post $post */
foreach($collectionManager as $post){
    var_dump($post);
}
```

Example, how to set a pagination parameters 

```php
$sl = $this->getServiceLocator();
$collectionManager = $sl->get('ZendPress\Api\CollectionManager');
$collectionManager->setEntity($sl->get('ZendPress\Entity\Post'));
$collectionManager->setItemCountPerPage(1); // Set how many items per page
$collectionManager->setCurrentPageNumber(1); // Set current page
/** @var \ZendPress\Entity\Post $post */
foreach($collectionManager as $post){
    var_dump($post);
}
```

Example, how to retrieve a filtered collection of posts 

```php
$sl = $this->getServiceLocator();
$collectionManager = $sl->get('ZendPress\Api\CollectionManager');
$collectionManager->setEntity($sl->get('ZendPress\Entity\Post'));
$filter = $sl->get('ZendPress\Api\Filter');
$filter->addFilter($filter::CATEGORY_NAME,'slug-of-category');
$collectionManager->setApiFilter($filter);
/** @var \ZendPress\Entity\Post $post */
foreach($collectionManager as $post){
    var_dump($post);
}
```



