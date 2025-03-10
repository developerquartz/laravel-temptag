require('./bootstrap');

// Text Editer
// import Vue2Editor from "vue2-editor";
// Vue.use(Vue2Editor);

import tinymce from 'vue-tinymce-editor'
Vue.component('tinymce', tinymce)

// import moment from 'moment'

import Vue from  'vue' ;
import VueRouter from  'vue-router'

Vue.use(VueRouter)

import App from './components/App.vue'

import AdminLayout from './Layouts/AdminLayout.vue'
import AuthLayout from './Layouts/AuthLayout.vue'
Vue.component('AdminLayout',AdminLayout);
Vue.component('AuthLayout',AuthLayout);

import Home from './components/frontend/Home.vue'
import About from './components/frontend/Aboutus.vue'
import Faq from './components/frontend/Faq.vue'
import Contact from './components/frontend/Contactus.vue'
import Product from './components/frontend/Product.vue'
import SingleProduct from './components/frontend/SingleProduct.vue'
import Cart from './components/frontend/Cart.vue'
import Checkout from './components/frontend/Checkout.vue'
import PlaceOrder from './components/frontend/PlaceOrder.vue'
import TermsAndCondition from './components/frontend/TermsAndCondition.vue'
import PrivacyPolicy from './components/frontend/PrivacyPolicy.vue'
import ReturnPolicy from './components/frontend/ReturnPolicy.vue'
import Blogs from './components/frontend/Blogs.vue'
import SingleBlog from './components/frontend/SingleBlog.vue'
import Login from './components/frontend/Login.vue'
import Register from './components/frontend/Register.vue'
import User from './components/user/User.vue'
import Usermyorders from './components/user/Myorders.vue'


import Admin from './components/admin/Admin.vue'
// Users
import AdminUser from './components/admin/users/User.vue'
import AdminAddUser from './components/admin/users/AddUser.vue'
import AdminUserEdit from './components/admin/users/EditUser.vue'
import AdminEditProfile from './components/admin/users/AdminEditProfile.vue'

// Categories
import AdminCategories from './components/admin/categories/Categories.vue'
import AdminCategoryAdd from './components/admin/categories/AddCategory.vue'
import AdminCategoryEdit from './components/admin/categories/EditCategory.vue'
// Products
import AdminProducts from './components/admin/products/Products.vue'
import AdminProductAdd from './components/admin/products/AddProduct.vue'
import AdminProductEdit from './components/admin/products/EditProduct.vue'
// Pages
import AdminPages from './components/admin/pages/Pages.vue'
import AdminPageAdd from './components/admin/pages/AddPage.vue'
import AdminPageEdit from './components/admin/pages/EditPage.vue'
// Blog Categories
import AdminBlogCategories from './components/admin/blogcategories/BlogCategories.vue'
import AdminBlogCategoryAdd from './components/admin/blogcategories/AddBlogCategory.vue'
import AdminBlogCategoryEdit from './components/admin/blogcategories/EditBlogCategory.vue'
// Blogs
import AdminBlogs from './components/admin/blogs/Blogs.vue'
import AdminBlogAdd from './components/admin/blogs/AddBlog.vue'
import AdminBlogEdit from './components/admin/blogs/EditBlog.vue'

import AdminHomePageEdit from './components/admin/pages/EditHomePage.vue'
import AdminAboutPageEdit from './components/admin/pages/EditAboutPage.vue'
import AdminConatctPageEdit from './components/admin/pages/EditContactPage.vue'

import AdminContactForms from './components/admin/contactforms/ContactForms.vue'
import AdminSubscriptionForms from './components/admin/subscriptionforms/SubscriptionForms.vue'

// Promocodes
import AdminPromocodes from './components/admin/promocodes/Promocodes.vue'
import AdminPromocodeAdd from './components/admin/promocodes/AddPromocode.vue'
import AdminPromocodeEdit from './components/admin/promocodes/EditPromocode.vue'

import AdminOrders from './components/admin/orders/Orders.vue'
import AdminOrderDetail from './components/admin/orders/OrderDetail.vue'

import AdminSettings from './components/admin/settings/Setting.vue'

import Manager from './components/manager/Manager.vue'

const router = new VueRouter({
  mode: 'history',
  routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/about-us',
			name: 'about-us',
			component: About,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/faq',
			name: 'faq',
			component: Faq,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/contact-us',
			name: 'contact-us',
			component: Contact,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/product',
			name: 'product',
			component: Product,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/singleproduct/:id',
			name: 'singleproduct',
			component: SingleProduct,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/cart',
			name: 'cart',
			component: Cart,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/checkout',
			name: 'checkout',
			component: Checkout,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/placeorder',
			name: 'placeorder',
			component: PlaceOrder,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/termsandcondition',
			name: 'termsandcondition',
			component: TermsAndCondition,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/privacypolicy',
			name: 'privacypolicy',
			component: PrivacyPolicy,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/returnpolicy',
			name: 'returnpolicy',
			component: ReturnPolicy,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/blogs',
			name: 'blogs',
			component: Blogs,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/singleblog/:id',
			name: 'singleblog',
			component: SingleBlog,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/login',
			name: 'login',
			component: Login,
			meta: {
			  layout:"frontend"
			}
		},
		{
			path: '/register',
			name: 'register',
			component: Register,
			meta: {
			  layout:"frontend"
			}
			/*meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}*/
		},   
		{
			path: '/user',
			name: 'user',
			component: User,
			meta: {
			  requiresAuth: true,
			  isUser: true,
			  // layout:"user",
			  layout:"frontend",
			}
		},   
		{
			path: '/myorders',
			name: 'myorders',
			component: Usermyorders,
			meta: {
			  requiresAuth: true,
			  isUser: true,
			  // layout:"user",
			  layout:"frontend",
			}
		},
		{
			path: '/admin',
			name: 'admin',
			component: Admin,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/users',
			name: 'admin_users_list',
			component: AdminUser,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/user/add',
			name: 'admin_user_add',
			component: AdminAddUser,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/user/edit/:id',
			name: 'adminuseredit',
			component: AdminUserEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/editprofile/:id',
			name: 'admineditprofile',
			component: AdminEditProfile,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/categories',
			name: 'admin_categories_list',
			component: AdminCategories,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/category/add',
			name: 'admin_category_add',
			component: AdminCategoryAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/category/edit/:id',
			name: 'admin_category_edit',
			component: AdminCategoryEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/products',
			name: 'admin_products_list',
			component: AdminProducts,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/product/add',
			name: 'admin_product_add',
			component: AdminProductAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/product/edit/:id',
			name: 'admin_product_edit',
			component: AdminProductEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/pages',
			name: 'admin_pages_list',
			component: AdminPages,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/page/add',
			name: 'admin_page_add',
			component: AdminPageAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/page/edit/:id',
			name: 'admin_page_edit',
			component: AdminPageEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/homepage/edit/:id',
			name: 'admin_home_page_edit',
			component: AdminHomePageEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/aboutpage/edit/:id',
			name: 'admin_about_page_edit',
			component: AdminAboutPageEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/conatctpage/edit/:id',
			name: 'admin_conatct_page_edit',
			component: AdminConatctPageEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blog_categories',
			name: 'admin_blog_categories_list',
			component: AdminBlogCategories,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blog_category/add',
			name: 'admin_blog_category_add',
			component: AdminBlogCategoryAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blog_category/edit/:id',
			name: 'admin_blog_category_edit',
			component: AdminBlogCategoryEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blogs',
			name: 'admin_blogs_list',
			component: AdminBlogs,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blog/add',
			name: 'admin_blog_add',
			component: AdminBlogAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/blog/edit/:id',
			name: 'admin_blog_edit',
			component: AdminBlogEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/contact_forms',
			name: 'admin_contact_forms_list',
			component: AdminContactForms,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/subscription_forms',
			name: 'admin_subscription_forms_list',
			component: AdminSubscriptionForms,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/promocodes',
			name: 'admin_promocodes_list',
			component: AdminPromocodes,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/promocodes/add',
			name: 'admin_promocode_add',
			component: AdminPromocodeAdd,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/promocodes/edit/:id',
			name: 'admin_promocode_edit',
			component: AdminPromocodeEdit,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/orders',
			name: 'admin_orders_list',
			component: AdminOrders,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/orders/detail/:id',
			name: 'admin_order_detail',
			component: AdminOrderDetail,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/admin/settings',
			name: 'admin_settings',
			component: AdminSettings,
			meta: {
			  requiresAuth: true,
			  isAdmin: true,
			  layout:"admin"
			}
		},
		{
			path: '/manager',
			name: 'manager',
			component: Manager,
			meta: {
			  requiresAuth: true,
			  isManager: true,
			  layout:"manager"
			}
		}
  ],
  scrollBehavior() {
    window.scrollTo(0,0);
  }
})

router.beforeEach((to, from, next) => {
	// console.log('sss'+from());
	// console.log(to.matched.some(record => record.meta.requiresAuth));
	if (to.matched.some(record => record.meta.requiresAuth)) {
	// if (true) {
		let token = localStorage.getItem('token') != null;
		if (!token) {
			next({
				path: '/login',
				query: {
					redirect: to.fullPath
				}
			})
		} else {
			let user = JSON.parse(localStorage.getItem('user'))
			let roles = user.roles.map(role => role.name)
			// console.log(user);
			// console.log(roles);
			// console.log(roles[0]);
			if (to.matched.some(record => record.meta.isUser)) {
				if (roles.includes('user')) next()
					else if (roles[0] === 'admin') {
					next({
						name: 'admin'
					})
				} else if (roles[0] === 'manager') {
					next({
						name: 'manager'
					})
				} else next({
					name: 'home'
				})
			} else if (to.matched.some(record => record.meta.isAdmin)) {
				if (roles.includes('admin')) next()
				else if (roles[0] === 'manager') {
					next({
						name: 'manager'
					})
				} else if (roles[0] === 'user') {
					next({
						name: 'user'
					})
				} else next({
					name: 'home'
				})

			} else if (to.matched.some(record => record.meta.isManager)) {
				if (roles.includes('manager')) next()
				else if (roles[0] === 'user') {
					next({
						name: 'user'
					})
				} else if (roles[0] === 'admin') {
					next({
						name: 'admin'
					})
				} else next({
					name: 'home'
				})

			} else {
				next({
					name: 'home'
				})
			}
		}
	}
	else {
		next()
	}
})

new Vue({
	el: '#app',
	components: { App },
	router,
});
