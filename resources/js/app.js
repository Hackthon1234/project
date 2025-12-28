/**
 * =====================================================
 * VybeCart - Main Application JavaScript
 * =====================================================
 * Description: Entry point for the application's JavaScript
 *              Initializes Alpine.js for reactive components
 * Author: VybeCart Team
 * Last Modified: 2025-12-28
 * =====================================================
 */

// Import bootstrap configuration (Axios setup)
import './bootstrap';

// Import Alpine.js framework for reactive UI components
import Alpine from 'alpinejs';

// Make Alpine globally available on the window object
// This allows Alpine to be used in blade templates
window.Alpine = Alpine;

// Initialize Alpine.js and start watching for directives
// Alpine will now process x-data, x-show, x-if, etc. in the DOM
Alpine.start();
