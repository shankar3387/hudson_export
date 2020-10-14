<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* Routes For Backend */
$route['Admin'] = 'Backend/AdminLoginController';
$route['DoAdminlogin'] = 'Backend/AdminLoginController/dologin';
$route['AdminLogout'] = 'Backend/AdminLoginController/AdminLogout';
$route['Dashboard'] = 'Backend/AdminLoginController/dashboard';
$route['ForgotPassword'] = 'Backend/AdminLoginController/ForgotPassword';
$route['resetPassword'] = 'Backend/AdminLoginController/PasswordReset';
$route['AccountSetting'] = 'Backend/AdminLoginController/Accountsetting';
$route['ChangePassword'] = 'Backend/AdminLoginController/EditPassword';
/*CategoryController*/
$route['Category'] = 'Backend/CategoryController/index';
$route['AddCategory'] = 'Backend/CategoryController/SaveCategory';
$route['categorystatus'] = 'Backend/CategoryController/UpdateCategorystatus';
$route['CategoryUpdateData'] = 'Backend/CategoryController/getupdateCategoryData';
$route['UpdateCategory'] = 'Backend/CategoryController/EditCategory';
/*BrandController*/
$route['Brand'] = 'Backend/BrandController/index';
$route['AddBrand'] = 'Backend/BrandController/SaveBrand';
$route['brandstatus'] = 'Backend/BrandController/UpdateBrandstatus';
$route['BrandUpdateData'] = 'Backend/BrandController/getupdateBrandData';
$route['UpdateBrand'] = 'Backend/BrandController/EditBrand';
/*ColorController*/
$route['Colors'] = 'Backend/ColorController/index';
$route['AddColor'] = 'Backend/ColorController/SaveColor';
$route['Colorstatus'] = 'Backend/ColorController/UpdateColorstatus';
$route['ColorUpdateData'] = 'Backend/ColorController/getupdateColorData';
$route['UpdateColor'] = 'Backend/ColorController/EditColor';
/*SubCategoryController*/
$route['SubCategory'] = 'Backend/SubCategoryController/index';
$route['AddSubCategory'] = 'Backend/SubCategoryController/SaveCategory';
$route['Subcategorystatus'] = 'Backend/SubCategoryController/UpdateCategorystatus';
$route['SubCategoryUpdateData'] = 'Backend/SubCategoryController/getupdateCategoryData';
$route['UpdateSubCategory'] = 'Backend/SubCategoryController/EditCategory';
/*ProductController*/
$route['product'] = 'Backend/ProductController/index';
$route['Products'] = 'Backend/ProductController/Addproduct';
$route['AddProduct'] = 'Backend/ProductController/SaveProduct';
$route['UpdatePro/(:any)'] = 'Backend/ProductController/UpdatePro/$1';
$route['UpdateProduct'] = 'Backend/ProductController/EditProduct';
$route['Productystatus'] = 'Backend/ProductController/UpdateProductstatus';
$route['FeatureProduct'] = 'Backend/ProductController/FeatureProduct';
$route['DeleteStock/(:num)/(:num)'] = 'Backend/ProductController/DeleteStock/$1/$2';
$route['DeleteImg/(:num)/(:num)'] = 'Backend/ProductController/DeleteImg/$1/$2';
$route['newArrival'] = 'Backend/ProductController/newArrival';
$route['AddArrival'] = 'Backend/ProductController/newArrival';
$route['AddArrival'] = 'Backend/ProductController/NewArrival_Product';

/*Slider Image*/
$route['Sliderimage'] = 'Backend/SliderController/index';
/*ReviewsController*/
$route['Reviews'] = 'Backend/ReviewsController/index';
$route['Reviewstatus'] = 'Backend/ReviewsController/UpdateReviewstatus';
/*OrdersController*/
$route['Orders'] = 'Backend/OrdersController/index';
/*EnquiryController*/
$route['Enquiry'] = 'Backend/EnquiryController/index';
/*Front End*/
$route['mainSearch'] = 'welcome/mainsearch';
$route['mainSearch/(:any)'] = 'welcome/mainsearch/$1';
$route['ProductGetData'] = 'welcome/ProductGetData';
$route['ProductList/(:num)'] = 'welcome/productList/$1';
$route['Product/(:num)'] = 'welcome/products/$1';
$route['Brands/(:num)'] = 'welcome/BrandsList/$1';
$route['Shop'] = 'welcome/Shop';
$route['Shop/(:num)'] = 'welcome/Shop/$1';
/*LoginController*/
$route['Login'] = 'Frontend/LoginController/index';
$route['logout'] = 'Frontend/LoginController/logout';
$route['Myaccount'] = 'Frontend/LoginController/Myaccount';
$route['dologin'] = 'Frontend/LoginController/dologin';
$route['dosignup'] = 'Frontend/LoginController/dosignup';
$route['LostPassword'] = 'Frontend/LoginController/LostPassword';
$route['Forgotpasswords'] = 'Frontend/LoginController/ForgotPassword';
/*CartController*/
$route['cart'] = 'Frontend/CartController/index';
$route['addcart'] = 'Frontend/CartController/addcart';
$route['WishList'] = 'Frontend/CartController/wishlist';
$route['addToWishList'] = 'Frontend/CartController/addToWishList';
$route['Checkout'] = 'Frontend/CartController/checkout';
$route['PlaceOrder'] = 'Frontend/CartController/SaveOrder';
$route['OrderHistory'] = 'Frontend/CartController/OrderHistory';
$route['Updatecart'] = 'Frontend/CartController/Updatecart';
$route['ViewOrder/(:num)'] = 'Frontend/CartController/orderdetail/$1';
$route['Removecart/(:num)'] = 'Frontend/CartController/Removecart/$1';
$route['RemoveWish/(:num)'] = 'Frontend/CartController/RemoveWish/$1';
/*AccountController*/
$route['AccountDetail'] = 'Frontend/AccountController/index';
$route['SaveDetails'] = 'Frontend/AccountController/UpdateDetail';
$route['submitReview'] = 'Frontend/AccountController/savereview';
$route['submitContact'] = 'Frontend/AccountController/Saveenquiry';

$route['product_details/(:num)'] = 'welcome/productList/$1';
$route['contact.html'] = 'welcome/contactPage/';
$route['about.html'] = 'welcome/aboutPage';
$route['Footer/aboutfooter.html'] = 'footer/aboutPage';
$route['googlepatner.html'] = 'footer/googlepartnerpage';
$route['Footer/help.html'] = 'footer/helppage';
$route['Footer/shipping.html'] = 'footer/shippingpage';
$route['Footer/cancel.html'] = 'footer/cancelpage';
$route['Footer/faq.html'] = 'footer/faqpage';
$route['Footer/privacy.html'] = 'footer/privacypage';
$route['Footer/Termsofuse.html'] = 'footer/Termsofusepage';
$route['Footer/services.html'] = 'footer/servicespage';
$route['Footer/contactus.html'] = 'footer/contactuspage';
$route['product_details.html/(:num)'] = 'welcome/products/$1';
