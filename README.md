# Advanced Custom Fields REST API Filter  

## Description  
Advanced Custom Fields REST API Filter is a WordPress plugin that extends the REST API by:  
✅ Adding all ACF fields to REST API responses.  
✅ Enabling filtering by any ACF field dynamically via query parameters.  

## Features  
- Automatically includes ACF fields in REST API responses.  
- Allows filtering posts by any ACF field using query parameters.  
- Supports multiple filters at once.  
- Open-source and lightweight.  

## Installation  
1. Download the plugin as a `.zip` file or clone the repository.  
2. Upload the folder to `wp-content/plugins/acf-rest-filter/`.  
3. Activate the plugin from the WordPress admin panel.  

## Usage  

### **1. Get Posts with ACF Fields**  
Make a GET request to:  
```
https://example.com/wp-json/wp/v2/work
```
This will return all posts with an `acf` object containing the ACF fields.  

### **2. Filter by a Single ACF Field**  
```
https://example.com/wp-json/wp/v2/work?acf_filter[featured]=1
```
Filters posts where the ACF field `featured` is `true` (`1`).  

### **3. Filter by Multiple ACF Fields**  
```
https://example.com/wp-json/wp/v2/work?acf_filter[category]=design&acf_filter[status]=active
```
Filters posts where `category = design` and `status = active`.  

## License  
This plugin is open-source and licensed under the [MIT License](LICENSE).  

## Author  
Developed with ❤️ by [Othmane N.](https://otha.me)