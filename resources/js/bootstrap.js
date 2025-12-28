/**
 * =====================================================
 * VybeCart - Bootstrap JavaScript Configuration
 * =====================================================
 * Description: Configures Axios HTTP client for API calls
 *              Sets up default headers and interceptors
 * Author: VybeCart Team
 * Last Modified: 2025-12-28
 * =====================================================
 */

// Import Axios library for making HTTP requests
import axios from 'axios';

// Make Axios globally available on the window object
// This allows Axios to be used anywhere in the application
window.axios = axios;

// Set default header for all Axios requests
// 'X-Requested-With: XMLHttpRequest' identifies AJAX requests
// This header helps Laravel recognize and handle AJAX requests properly
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
