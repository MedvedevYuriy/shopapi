/**
 * @api {put} /user/ Create new user
 * @apiName CreateUser
 * @apiGroup User
 *
 * @apiParam {Number} id Users unique ID.
 *
 * @apiSuccess {String} firstname Firstname of the User.
 * @apiSuccess {String} lastname Lastname of the User.
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *         "firstname": "John",
 *         "lastname": "Doe"
 *       }
 *
 * @apiError UserNotFound The id of user was now found.
 *
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 404 Not Found
 *       {
 *         "error": "UserNorFound"
 *       }
 */

/**
 * @api {put} /user/:id Update user's info
 * @apiPermission none
 * @apiName UpdateUser
 * @apiGroup User
 *
 * @apiParam {String} name User's name
 * @apiParam {String} email User's email
 * @apiParam {String} password User's password
 * @apiHeader {String} access-key Users unique access-key
 *
 * @apiSuccess {Number} id User id
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": "UpdateUser",
 *       "id": "123"
 *       } 
 *
 * @apiError EmailAlreadyTaken User already exists
 *
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 400 Bad Request
 *       {
 *       "error": "User Already Exists"
 *       }
 */

/**
 * @api {post} /user Create a new User
 * @apiName PostUser
 * @apiGroup User
 * @apiPermission none
 *
 * @apiDescription In this case "apiUse" is defined and used.
 * Define blocks with params that will be used in several functions, so you dont have to rewrite them.
 *
 * @apiParam {String} name Name of the User
 * @apiParam {String} password User's password
 *
 * @apiSuccess {String} id         The new Users-ID.
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": "PostUser",
 *       "id": "123"
 *       }
 * @apiError UserNameTooShort User's name must content minimum 5 symbols.
 * 
 * @apiErrorExample Error-response:
 *       HTTP/1.1 400 Bad Request
 *       {
 *         "error": "UserNameTooShort"
 *       }
 */

/**
 * @api {delete} /user Delete existing User
 * @apiName DeleteUser
 * @apiGroup User
 * @apiPermission none
 *
 * @apiDescription Users can delete their own account only if they use access-key token.
 * Admins can't delete their account, but they can delete some user's account using their ID.
 *
 * @apiParam {Number} id User's unique id
 * @apiHeader {String} access-key Users unique access-key
 *
 * @apiSuccess {String} id         The new Users-ID.
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": "DeleteUser",
 *       "id": "123"
 *       }
 * @apiError NoAccessRights Only Authenticated Users can delete their accounts
 * 
 * @apiErrorExample Error-response:
 *       HTTP/1.1 401 Non Authenticated
 *       {
 *       "error": "NoAccessRights"
 *       } 
 */

/**
 * @api {get} /products Get list of products
 * @apiName GetProducts
 * @apiGroup Products
 *
 * @apiDescriprion use optional params to find something you want
 *
 * @apiParam [id] Id of the Product
 *
 * @apiSuccess {object[]} products List of products
 * 
 * @apiSuccessExample {json} Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "products": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 */

/**
 * @api {get} /products/category Get list of products in specific category
 * @apiName GetProductsCategory
 * @apiGroup Products
 *
 * @apiDescriprion use optional params to find something you want
 *
 * @apiParam [id] Id of the Product
 *
 * @apiSuccess {object[]} products List of products
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "products": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 * 
 * @apiError NotFound Wrong category of products
 *
 * @apiErrorExample Success-Response:
 *       HTTP/1.1 404 Not Found
 *       {
 *       "error": "Wrong category"
 *       }
 */

/**
 * @api {get} /products/search/:name Search for a cpecific product
 * @apiName SearchProduct
 * @apiGroup Products
 *
 * @apiSuccess {Object} product Cpecific product
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "products": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 *
 * @apiError NotFound Product not found
 *
 * @apiErrorExample Error-Response:
 *     HTTP/1.1 404 NotFound
 *     {
 *       "error": "Product not found"
 *     }
 */

/**
 * @api {post} /products Create new product
 * @apiName CreateProduct
 * @apiGroup Products
 * @apiPermission admin
 *
 * @apiParam {String} name Product's name
 * @apiParam {String} description Product's description
 * @apiParam {Number} balance Product's balance
 * @apiParam {Number} sale Product's sale
 * @apiParam {string} category Product's category
 * @apiHeader {String} access-key Users unique access-key
 *
 * @apiSuccess {Object} product Created product
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": CreateProduct,
 *       "product": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 *
 * @apiError NoAccessRights Only authenticated admin can add new products
 *
 * @apiErrorExample Error-response:
 *       HTTP/1.1 401 Non Authenticated
 *       {
 *       "error": "NoAccessRights"
 *       }
 */

/**
 * @api {delete} /products Delete product
 * @apiName DeleteProduct
 * @apiGroup Products
 * @apiPermission admin
 *
 * @apiParam {Number} id Product's id
 *
 * @apiSuccess {Object} product Created product
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": "DeleteProduct",
 *       "product": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 *
 * @apiError NoAccessRights Only authenticated admin can delete products
 *
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 401 Non Authenticated
 *       {
 *       "error": "NoAccessRights"
 *       }
 */

/**
 * @api {put} /products Change product
 * @apiName ChangeProduct
 * @apiGroup Products
 * @apiPermission admin
 *
 * @apiParam {Number} id Product's id
 * @apiParam {String} [name] Product's name
 * @apiParam {String} [description] Product's description
 * @apiParam {Number} [balance] Product's balance
 * @apiParam {Number} [sale] Product's sale
 * @apiParam {string} [category] Product's category
 * @apiHeader {String} access-key Users unique access-key
 *
 * @apiSuccess {Object} product Product changed
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *       "apiName": "ChangeProduct",
 *       "product": [{
 *         "id": 111,
 *         "name": "ProductName1",
 *         "description": "ProductDescription",
 *         "balance": "ProductBalance",
 *         "sale": "ProductSale",
 *         "category": "ProductCategory"
 *       }]
 *       }
 *
 * @apiError NoAccessRights Only authenticated admin can change product's params
 * @apiError NotFound Wrong or missed product's id
 *
 * @apiErrorExample Error-response:
 *       HTTP/1.1 401 Non Authenticated
 *       {
 *       "error": "NoAccessRights"
 *       }
 */

/**
 * @api {post} /orders/ Create order
 * @apiName CreateOrder
 * @apiGroup Orders
 *
 * @apiParam {String} address Delivery address
 * @apiParam {String} payment Payment method
 * @apiParam {Object[]} order List of products
 *
 * @apiParamExample Request-Example:
 *       {
 *         "address": "Some place in the middle of Nowhere"
 *         "payment": "couriercard"
 *         "order": [{
 *           "id": "1",
 *           "amount": "1"
 *           },{
 *           "id": "2",
 *           "amount": "5"
 *           }]
 *       }
 *
 * @apiSuccess {Number} id Order's ID
 *
 * @apiSuccessExample Success-Response:
 *       HTTP/1.1 200 OK
 *       {
 *         "id": "111"
 *       }
 * 
 * @apiError BadRequest Wrong or missed input data
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 400 Bad Request
 *       {
 *       "error": "Bad request"
 *       }
 */

/**
 * @api {get} /orders/ Get the order info
 * @apiName GetOrder
 * @apiGroup Orders
 *
 * @apiParam {Number} id Order's id
 *
 * @apiSuccess {Number} id Order's ID
 *
 * @apiSuccessExample Success-Response:
 *        HTTP/1.1 200 OK
 *        {
 *        "active": true,
 *        "status": "in transit",
 *        "address": "Some place in the middle of Nowhere"
 *        "payment": "couriercard"
 *        "order": [{
 *          "id": "1",
 *          "amount": "1"
 *          },{
 *          "id": "2",
 *          "amount": "5"
 *          }]
 *        }
 *
 * @apiError NotFound Wrong or miss order's ID 
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 404 Not Found
 *       {
 *       "error": "Not Found"
 *       }
 */

/**
 * @api {put} /orders/ Change order's params
 * @apiName ChangeOrder
 * @apiGroup Orders
 * @apiPermission none
 *
 * @apiParam {Number} id Order's id
 * @apiParam {String} [status] Orded's delivery status (payed/in transit/delivered to customer)
 * @apiParam {String} [active] Order's active status (active/nonactive)
 * @apiParam {String} [adress] Order's delivery adress
 * @apiHeader {String} access-key Users unique access-key
 *
 * @apiDescription Only authenticated users can change some order's info. 
 * Users can make order inactive or change delivery adress only if order's status not "delivered" or "in transit"
 * Only admins can change order delivery status
 *
 * @apiSuccess {Number} id Order's ID
 *
 * @apiSuccessExample Success-Response:
 *        HTTP/1.1 200 OK
 *        {
 *        "active": true,
 *        "status": "in transit"
 *        "address": "Some place in the middle of Nowhere"
 *        "payment": "couriercard"
 *        "order": [{
 *          "id": "1",
 *          "amount": "1"
 *          },{
 *          "id": "2",
 *          "amount": "5"
 *          }]
 *        }
 *
 * @apiError NotFound Wrong or missed order's ID
 * @apiError NoAccessRight Only authenticated Admins can change the delivery status
 * @apiError NotAuthenticated Wong or missed access key
 * @apiError BadRequest Wrong or missed input params
 *
 * @apiErrorExample Error-Response:
 *       HTTP/1.1 404 Not Found
 *       {
 *       "error": "Not Found"
 *       }
 */
