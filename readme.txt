=== Advanced Custom Fields: REST API Filter ===
Contributors: iietmoo (Othmane N.)  
Tags: ACF, REST API, API filter, Advanced Custom Fields, WordPress API  
Requires at least: 5.4  
Tested up to: 6.4  
Requires PHP: 7.2  
Stable tag: 1.2  
License: MIT  
License URI: https://opensource.org/licenses/MIT  

Adds ACF fields to the WordPress REST API and enables dynamic filtering via query parameters.  

== Description ==  
**Advanced Custom Fields: REST API Filter** is a lightweight and powerful plugin that enhances the WordPress REST API by:  

✅ Adding all **ACF fields** to API responses  
✅ Allowing **dynamic filtering** by any ACF field using query parameters  
✅ Supporting multiple filters for flexible API queries  
✅ **Optimized for performance** and **fully compatible** with ACF Pro  

**Example Usage:**  
- **Get posts with ACF fields:**  
  `https://yourwebsite.com/wp-json/wp/v2/work`  
- **Filter by a single ACF field:**  
  `https://yourwebsite.com/wp-json/wp/v2/work?acf_filter[featured]=1`  
- **Filter by multiple ACF fields:**  
  `https://yourwebsite.com/wp-json/wp/v2/work?acf_filter[category]=design&acf_filter[status]=active`  

🔹 **Perfect for developers & API integrations!**  

== Installation ==  

1. Upload the plugin folder to `/wp-content/plugins/acf-rest-api-filter/`  
2. Activate the plugin via the **Plugins** menu in WordPress  
3. Start using ACF fields in the WordPress REST API 🎉  

== Frequently Asked Questions ==  

= Does this work with ACF Pro? =  
Yes, this plugin is fully compatible with both ACF and ACF Pro.  

= How do I filter posts using an ACF field? =  
Use the `acf_filter[fieldname]` query parameter in your API requests. Example:  
`https://yourwebsite.com/wp-json/wp/v2/work?acf_filter[status]=active`  

= Does this slow down API performance? =  
No, the plugin is optimized for efficiency and works seamlessly with WordPress REST API responses.  

== Screenshots ==  
1. Example API response with ACF fields  
2. Filtering API request using ACF fields  

== Changelog ==  

= 1.2 =  
- 🎉 Initial release of ACF REST API Filter  
- Adds ACF fields to REST API responses  
- Enables filtering by ACF fields via query parameters  
- Supports multiple filters at once  
- Fully compatible with ACF Pro  

== Upgrade Notice ==  
= 1.2 =  
Initial release – adds ACF field filtering to WordPress REST API! 🚀  

== License ==  
This plugin is open-source and licensed under the **MIT License**.  

== Author ==  
Developed by [Othmane N.](https://yourwebsite.com)  
