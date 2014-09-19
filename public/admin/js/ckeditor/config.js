/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.height = 300;
    config.filebrowserBrowseUrl = 'http://codeigniter.local/admin/js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = 'http://codeigniter.local/admin/js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = 'http://codeigniter.local/admin/js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = 'http://codeigniter.local/admin/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = 'http://codeigniter.local/admin/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = 'http://codeigniter.local/admin/js/kcfinder/upload.php?type=flash';
};
