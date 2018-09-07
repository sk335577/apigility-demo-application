https://inviqa.com/blog/create-restful-api-apigility
https://github.com/zfcampus/zf-apigility-example/blob/master/composer.json

# Entity
 - Entities are simply an object representation of our data. It should not do anything with the data. It should not have any logic within it. It simply represents our data as an object. With that in mind, our Entity will need a property for each field. It will also need one method for converting the object to an array, and one method for populating the entity.
 - Each Entity object represents one row, so we add three properties to the class
 - Entities are simply an object representation of our data. It should not do anything with the data. It should not have any logic within it. It simply represents our data as an object. With that in mind, our Entity will need a property for each field. It will also need one method for converting the object to an array, and one method for populating the entity.
 - We have Apigility, a Rest Service, and an Entity for said Rest Service in place, but how are we supposed to actually manipulate the data? We now need a mapper to map the data to the entity.
  Mappers allow us to connect the entity with data. If the API user is getting data, the mapper will select the data, attach it to an entity, and return the entity to the user. If the API user is manipulating data, the mapper will
  take a manipulated entity, update the data accordingly, and return the result to the user. I emphasize entity here in hopes to emphasize the importance that entity is the object being passed around. The mapper returns an entity or collection with fetch, and it will take an entity for inserting and updating data.
 * 
 * 
 * 
  To load and save to the database, we use a mapper class. Apigility didn't provide any skeleton classes to help us as it does not know which persistent storage system we will use. For this tutorial, we will create a class called AlbumMapper that uses a Zend\Db database adapter:
  The fetchAll() method uses Zend\Db's Select object to get data from the database. This enables the paginator class to alter the generate SQL so that Apigility can automatically paginate our collection. The fetchOne method simply fetches a single row and returns an AlbumEntity.
  The mapper class depends on a database adapter that is passed in via the constructor. Apigility already uses ZF2's dependency injection container, Zend\ServiceManager, so we can add our configuration to it. This is done in the Module class by adding a new method getServiceConfig() to the Album's Module.php file:
 
 
# Mapper
 - We have Apigility, a Rest Service, and an Entity for said Rest Service in place, but how are we supposed to actually manipulate the data? We now need a mapper to map the data to the entity. Mappers allow us to connect the entity with data. If the API user is getting data, the mapper will select the data, attach it to an entity, and return the entity to the user. If the API user is manipulating data, the mapper will take a manipulated entity, update the data accordingly, and return the result to the user. I emphasize entity here in hopes to emphasize the importance that entity is the object being passed around. The mapper returns an entity or collection with fetch, and it will take an entity for inserting and updating data.

# Repositories 
  The repository is a gateway between your domain/business layer and a data mapping layer, which is the layer that accesses the database and does the operations. Basically the repository is an abstraction to you database access.

# Service
  The service should provide an API to your business logic, therefore being an abstraction to your repository, here is where I disagree, just a little, with @Cerad, the services should be the only ones with access to the repositories, otherwise it violates the Dependency Inversion Principle (D in SOLID), because the business layer is an abstraction of your data access layer.

# Actions/Controllers
  The A/C objects works as a gateway between your input and the domain logic, is decides what to do with the input and how to output the response It should provide neither a straight CRUD interface nor do business logic. It mediates between business logic and the database. The interface should be in business logic terms but not perform business logic itself, more like a business logic primitive. As an example say you were going to build an email system, you have users and messages. Your Repository would provide basic CRUD operations for users and messages but it would also provide filtered views of messages like GetUsersNewMessages(user) or GetSearchedMessages(user,searchTerms). The idea is that the Repository hides how storage is implemented and provides a clean interface that allows fast flexible access to the data. Keeping the operations in high level terms of what should happen rather than how means you have more flexibility to implement them in whatever way is best for the underlying backing store.
 
# More
  After having read PoEAA (Martin Fowler), I too was having trouble identifying the difference between a data mapper and a repository.

  This is what I've found that the 2 concepts ultimately boil down to:

  a Repository acts like a collection of domain objects, with powerful querying capabilities (Evans, DDD)
  a DataMapper "moves data between objects and a database while keeping them independent of each other and the mapper itself" (Fowler, PoEAA)
  Repositories are a generic concept and don't necessarily have to store anything to a database, its main function is to provide collection like (query-enabled) access to domain objects (whether they are gotten from a database is besides the point). Repositories may (and often will) contain DataMappers themselves.

  DataMappers serve as the middle layer between domain objects and a database, allowing them to evolve independently without any one depending on the other. Datamappers might have "find" or query functionality, but that is not really their main function. The more you find that you are using elaborate query logic in your DataMappers, the more you want to start thinking about decoupling that query logic into a repository while leaving your DataMappers to serve their main function, mapping domain objects to the database and vice versa.
